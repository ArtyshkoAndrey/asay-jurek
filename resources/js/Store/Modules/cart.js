import bs5 from "../../users/plugins/bs5";
import { setupI18n } from "../../i18n";
import product from "../../users/Pages/Users/Product";

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
    cost: state => state.response_products.length > 0 ? state.response_products.map(i=>i.cost).reduce((a, b)=> a + b) : 0
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
        body: t('Users.Tooltips.cart-clear'),
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
    }
  },

  actions: {
    // Добавляем товар в корзину - Global Primary
    async add ({ commit, state }, { id, count }) {
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
          commit('add', {id: id, count: product.count, rewrite: true})
          return false
        }
        console.log(123123)
        commit('add', {id: id, count: count})
        return true

      } else if (product === undefined) {
        // Если нету товара такого
        return this.dispatch('cart/createProduct', {
          id: id,
          count: count
        })

      } else {
        // Если нашёл товар и не нашёл с апи
        return false

      }
    },

    // Итогово добавить товар и взять данные нового товара в корзине
    async createProduct ({commit, state}, {id, count}) {
      await commit('add', {
        id: id,
        count: count
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

    removeProduct({commit, state}, id) {
      let product = state.products.find(e => Number(e.id) === Number(id))
      if (product) {
        commit('remove', id)
      }
    }

  }

}