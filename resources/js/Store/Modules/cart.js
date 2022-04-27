import bs5 from "../../users/plugins/bs5";
import { setupI18n } from "../../i18n";
import * as _ from 'lodash'

export default {
  namespaced: true,
  state: () => ({
    products: [],
    response_products: [],
  }),

  getters: {
    products: state => state.products,
    response_products: state => state.response_products,
    include: state => id => {
      return state.products.includes(el => el.id === id)
    },
    find: state => id => {
      return state.products.find(el => Number(el.id) === Number(id))
    },

    products_count: state => state.products.length,
    cost: state => state.response_products.length > 0 ? state.response_products.map(i => i.cost * state.products.find(e => e.id === i.id).count).reduce((a, b)=> a + b) : 0
  },

  mutations: {
    add(state, {id, count, rewrite = false}) {
      let product = state.products.find(e => e.id === Number(id))
      if (product) {
        if (rewrite) {
          product.count = count
        } else {
          product.count += count
        }
      } else {
        state.products.push({
          id: id,
          count: count
        })
      }
    },
    clear (state) {
      state.products = []
      state.response_products = []

      const i18n = setupI18n()
      const t = i18n.global.t

      new bs5.Toast({
        body: t('User.Tooltips.cart-clear'),
        className: 'border-0 bg-danger text-white',
        btnCloseWhite: true,
        autohide: true,
        delay: 5000
      }).show()

      return true
    },

    addFetchProducts (state, payload) {
      state.response_products = payload
    },

    remove (state, id) {
      state.products = state.products.filter(e => Number(e.id) !== Number(id))
      state.response_products = state.response_products.filter(e => Number(e.id) !== Number(id))
    },

    checkCountProducts (state) {
      const i18n = setupI18n()
      const t = i18n.global.t

      state.products.forEach(e => {
        let response = state.response_products.filter(el => el.id === e.id).pop()
        if (response.count < e.count) {
          if (response.count > 0) {
            this.commit('cart/add', {
              id: e.id,
              count: response.count,
              rewrite: true
            })
          } else {
            this.commit('cart/remove', e.id)
            new bs5.Toast({
              body: t('User.Tooltips.cart-remove-deleted-product'),
              className: 'border-0 bg-danger text-white',
              btnCloseWhite: true,
              autohide: true,
              delay: 5000
            }).show()
          }

        }
      })
    },

    removeDeletedProducts(state) {
      const i18n = setupI18n()
      const t = i18n.global.t

      state.products.forEach(e => {
        let product = state.response_products.find(el => el.id === e.id)
        if (product === undefined) {
          this.commit('cart/remove', e.id)

          new bs5.Toast({
            body: t('User.Tooltips.cart-remove-deleted-product'),
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 5000
          }).show()
        }
      })
    }
  },

  actions: {
    // Добавляем товар в корзину - Global Primary
    async add ({ commit, state }, { id, count, user }) {
      // commit('clear')
      const i18n = setupI18n()
      const t = i18n.global.t

      let r_product = state.response_products.find(el => el.id === Number(id))
      let product = state.products.find(el => el.id === Number(id))

      if (r_product && product) {
        // Если есть товар и есть данные с апи
        console.log(r_product.count - (product.count + count))
        if (r_product.count - (product.count + count) < 0) {
          new bs5.Toast({
            body: t('User.Tooltips.product-add-error-count'),
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 5000
          }).show()
          if (user) {
            axios.post('/user/cart/add', {
              id: id,
              count: product.count
            })
              .then(r => {
                if (r.data.success) {
                  commit('add', {id: id, count: product.count, rewrite: true})
                }
              })
          } else {
            commit('add', {id: id, count: product.count, rewrite: true})
          }
          return false
        }
        if (user) {
          axios.post('/user/cart/add', {
            id: id,
            count: count
          })
            .then(r => {
              if (r.data.success) {
                commit('add', {id: id, count: count})
              }
            })
        } else {
          commit('add', {id: id, count: count})
        }

        return true

      } else if (product === undefined) {
        // Если нету товара такого

        if (user) {
          return axios.post('/user/cart/add', {
            id: id,
            count: 1
          })
            .then(r => {
              if (r.data.success) {
                return this.dispatch('cart/createProduct', {
                  id: id,
                  count: count
                })
              } else {
                return false
              }
            })
            .catch(e => {
              return false
            })
        } else {
          return this.dispatch('cart/createProduct', {
            id: id,
            count: count
          })
        }

      } else {
        // Если нашёл товар и не нашёл с апи
        return false

      }
    },

    // Итогово добавить товар и взять данные нового товара в корзине
    async createProduct ({commit, state}, {id, count, user}) {
      await commit('add', {
        id: id,
        count: count,
      })
      return await this.dispatch('cart/fetch')
    },

    // Поулчить данные из апи по товарам
    fetch ({commit, state}) {
      return axios.post('/api/cart/fetch', {
        ids: state.products.map(el => el.id)
      })
        .then(r => {
          if (r.data.success) {
            commit('addFetchProducts', r.data.payload.products)

            let ids = _.sortBy(r.data.payload.products.map(e => e.id))
            let idsState  = _.sortBy(state.products.map(e => e.id))

            if(!_.isEqual(ids, idsState)) {
              commit('removeDeletedProducts')
            }
            commit('checkCountProducts')

            return true
          }

          commit('clear')
          return false
        })
        .catch(e => {
          commit('clear')
          return false
        })
    },

    removeProduct({commit, state}, { id, user }) {
      let product = state.products.find(e => Number(e.id) === Number(id))
      if (product) {
        if (user) {
          axios.post('/user/cart/remove', {
            id: id
          })
            .then(r => {
              if (r.data.success) {
                commit('remove', id)
              }
            })
            .catch(e => {
              // TODO: i18n
              new bs5.Toast({
                body: 'Ошибка при удалении товара из корзины, обратитесь к администратору',
                className: 'border-0 bg-warning text-dark',
                btnCloseWhite: false,
                autohide: true,
              }).show()
            })
        } else {
          commit('remove', id)
        }
      }


    },

    initialCart ({commit, state}, payload) {
      if (payload.user) {
        axios.post('/user/cart', {
          products: state.products
        })
          .then(r => {
            if (r.data.success) {
              let products = r.data.payload.cart

              products.forEach(e => {
                let p = e.product
                commit('add', {
                  id: p.id,
                  count: e.count,
                  rewrite: true
                })
              })

              state.products.forEach(e => {
                if (products.find(el => el.product.id === e.id) === undefined) {
                  commit('remove', e.id)
                }
              })

              commit('addFetchProducts', products.map(e => e.product))

              commit('checkCountProducts')

              if (payload.tooltip) {
                // TODO: i18n
                new bs5.Toast({
                  body: 'Ваша корзина обновилась из аккаунта',
                  className: 'border-0 bg-warning text-dark',
                  btnCloseWhite: false,
                  autohide: true,
                }).show()
              }
            }
          })
          .catch(e => {
            commit('clear')
          })
      } else {
        this.dispatch('cart/fetch')
      }
    }

  },

}