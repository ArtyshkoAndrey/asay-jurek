<template>
  <Head>
    <title>Все Магазины для самовывоза</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Магазины</h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 col-md-10">
      <div class="card">
        <div class="card-body">
          <form @submit.prevent="submit">
            <div class="row align-items-center gy-3">
              <div class="col-12 col-md-6 col-lg-3">
                <input
                  id="q"
                  v-model="form.q"
                  aria-describedby="q"
                  class="form-control rounded-0"
                  name="q"
                  placeholder="Найти..."
                  type="text"
                >
              </div>
              <div class="col-12 col-md-auto">
                <button
                  class="h-100 btn btn-dark rounded-0"
                  type="submit"
                >
                  Фильтровать
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row gy-3  justify-content-center mt-5">
    <div class="col-12 mt-0 col-md-10">
      <button class="btn d-block btn-dark ms-auto fw-light rounded-0" @click="openCreateShopModal">Создать Магазин</button>
    </div>
    <div class="col-12 col-md-10">
      <div class="card px-3">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">Страна</th>
              <th scope="col">Город</th>
              <th scope="col">Улица</th>
              <th scope="col">Телефон</th>
            </tr>
            </thead>
            <tbody>

            <tr
              v-for="shop in shops"
              style="cursor: pointer"
              @click="open(shop)"
            >
              <th scope="row">{{ shop.id }}</th>
              <td>
                {{ shop.country }}
              </td>
              <td>{{ shop.city }}</td>
              <td>{{ shop.street }}</td>
              <td>{{ shop.phone }}</td>

            </tr>

            </tbody>
          </table>
          <InfiniteLoading
            :first-load="false"
            :shops="shops"
            @infinite="loadDataFromServer"
          >
            <template #complete>
              <span></span>
            </template>
          </InfiniteLoading>
        </div>
      </div>
    </div>
  </div>

<!--  Model Update User-->
  <div
    id="updateShopModal"
    aria-hidden="true"
    aria-labelledby="exampleModalLabel"
    class="modal fade"
    tabindex="-1"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5
            id="exampleModalLabel"
            class="modal-title"
          >
            {{ selectShop.street }}
          </h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <form>

                <div class="mb-3">
                  <label for="country">Страна</label>
                  <input
                    id="country"
                    v-model="selectShop.country"
                    :class="{'is-invalid': selectShop.errors.country}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors.country"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors.country }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="city">Город</label>
                  <input
                    id="city"
                    v-model="selectShop.city"
                    :class="{'is-invalid': selectShop.errors.city}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors.city"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors.city }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="street_ru">Улица RU</label>
                  <input
                    id="street_ru"
                    v-model="selectShop.ru.street"
                    :class="{'is-invalid': selectShop.errors['ru.street']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors['ru.street']"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors['ru.street'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="street_en">Улица EN</label>
                  <input
                    id="street_en"
                    v-model="selectShop.en.street"
                    :class="{'is-invalid': selectShop.errors['en.street']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors['en.street']"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors['en.street'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone">Телефон</label>
                  <input
                    id="phone"
                    v-model="selectShop.phone"
                    :class="{'is-invalid': selectShop.errors.phone}"
                    class="form-control rounded-0"
                    type="phone"
                  >
                  <div
                    v-if="selectShop.errors.phone"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors.phone }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="time_ru">Время работы RU</label>
                  <input
                    id="time_ru"
                    v-model="selectShop.ru.time"
                    :class="{'is-invalid': selectShop.errors['ru.time']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors['ru.time']"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors['ru.time'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="time_en">Время работы EN</label>
                  <input
                    id="time_en"
                    v-model="selectShop.en.time"
                    :class="{'is-invalid': selectShop.errors['en.time']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectShop.errors['en.time']"
                    class="invalid-feedback"
                  >
                    {{ selectShop.errors['en.time'] }}
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-danger me-auto rounded-0 fw-light"
            type="button"
            @click="destroyShop"
          >
            Удалить
          </button>
          <button
            class="btn btn-secondary rounded-0 fw-light"
            data-bs-dismiss="modal"
            type="button"
          >
            Закрыть
          </button>
          <button
            :disabled="selectShop.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveUpdateShop"
          >
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </div>

<!--  Model Create User-->
  <div
    id="createShopModal"
    aria-hidden="true"
    aria-labelledby="exampleModalLabel"
    class="modal fade"
    tabindex="-1"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5
            id="exampleModalLabel"
            class="modal-title"
          >
            Создание нового магазина
          </h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <form>

                <div class="mb-3">
                  <label for="country">Страна</label>
                  <input
                    id="country"
                    v-model="createShop.country"
                    :class="{'is-invalid': createShop.errors.country}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors.country"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors.country }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="city">Город</label>
                  <input
                    id="city"
                    v-model="createShop.city"
                    :class="{'is-invalid': createShop.errors.city}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors.city"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors.city }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="street_ru">Улица RU</label>
                  <input
                    id="street_ru"
                    v-model="createShop.ru.street"
                    :class="{'is-invalid': createShop.errors['ru.street']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors['ru.street']"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors['ru.street'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="street_en">Улица EN</label>
                  <input
                    id="street_en"
                    v-model="createShop.en.street"
                    :class="{'is-invalid': createShop.errors['en.street']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors['en.street']"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors['en.street'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone">Телефон</label>
                  <input
                    id="phone"
                    v-model="createShop.phone"
                    :class="{'is-invalid': createShop.errors.phone}"
                    class="form-control rounded-0"
                    type="phone"
                  >
                  <div
                    v-if="createShop.errors.phone"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors.phone }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="time_ru">Время работы RU</label>
                  <input
                    id="time_ru"
                    v-model="createShop.ru.time"
                    :class="{'is-invalid': createShop.errors['ru.time']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors['ru.time']"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors['ru.time'] }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="time_en">Время работы EN</label>
                  <input
                    id="time_en"
                    v-model="createShop.en.time"
                    :class="{'is-invalid': createShop.errors['en.time']}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createShop.errors['en.time']"
                    class="invalid-feedback"
                  >
                    {{ createShop.errors['en.time'] }}
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-secondary rounded-0 fw-light"
            data-bs-dismiss="modal"
            type="button"
          >
            Закрыть
          </button>
          <button
            :disabled="createShop.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveCreateShop"
          >
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import bs5 from "../../../../users/plugins/bs5";
import InfiniteLoading from "v3-infinite-loading";
import {useForm} from "@inertiajs/inertia-vue3";
import {Modal} from 'bootstrap';

export default {
  name: "Index",
  layout: Layout,
  components: {
    InfiniteLoading
  },
  data: () => ({
    shops: [],
    page: 2,
    noResult: false,
    message: "",
    createShop: useForm({
      country: null,
      city: null,
      phone: null,
      ru: {
        street: null,
        time: null
      },
      en: {
        street: null,
        time: null
      }
    }),
    selectShop: useForm({
      id: null,
      country: null,
      city: null,
      phone: null,
      ru: {
        street: null,
        time: null
      },
      en: {
        street: null,
        time: null
      }
    }),
    form: useForm({
      q: null,
    }),
    destroyShopForm: useForm({}),
    modal: null,
    createShopModal: null
  }),
  computed: {
    formData() {
      return this.$page.props.formData
    },
    serverShops() {
      return this.$page.props.shops ?? null
    },
  },
  mounted() {
    this.form.defaults({
      q: this.formData.q
    })
    this.form.reset()
    if (this.serverShops) {
      this.shops.push(...this.serverShops.data)
    } else {
      new bs5.Toast({
        body: "Ошибка в принятии данный от сервера",
        className: 'border-0 bg-warning text-dark',
        btnCloseWhite: false,
        autohide: true,
        delay: 3000
      }).show()
    }

    this.modal = new Modal(
      $('#updateShopModal')
    )

    this.createShopModal = new Modal($('#createShopModal'))
  },
  methods: {
    async loadDataFromServer($state) {
      try {
        const result = await axios.get('/admin/shops', {
          params: {
            page: this.page,
            is_json: true,
            q: this.form.q,
          }
        })
        if (result.data.payload.shops.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.shops.push(...result.data.payload.shops.data);
            $state.loaded()
            if (this.page > result.data.payload.shops.last_page) {
              $state.complete()
            }
          }, 1000)
        } else {
          $state.complete()
        }
      } catch (err) {
        $state.error()
      }
    },
    submit() {
      this.form.get('/admin/shops')
    },

    open(shop) {
      console.log(shop)
      this.selectShop.defaults({
        ...shop,
        ru: {
          street: shop.translate['ru'].street,
          time: shop.translate['ru'].time
        },
        en: {
          street: shop.translate['en'].street,
          time: shop.translate['en'].time
        }
      }).reset()
      this.modal.show()
    },
    submitSaveUpdateShop () {
      this.selectShop.put('/admin/shops/' + this.selectShop.id, {
        onSuccess: () => {
          this.modal.hide()
          new bs5.Toast({
            body: "Данные магазина изменены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
    openCreateShopModal () {
      this.createShop.defaults({
        country: null,
        city: null,
        phone: null,
        ru: {
          street: null,
          time: null
        },
        en: {
          street: null,
          time: null
        }
      }).reset()
      this.createShopModal.show()
    },
    submitSaveCreateShop () {
      this.createShop.post('/admin/shops', {
        onSuccess: () => {
          this.createShopModal.hide()
          new bs5.Toast({
            body: "Новый Магазин успешно создался",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
    destroyShop () {
      this.destroyShopForm.delete('/admin/shops/' + this.selectShop.id, {
        onSuccess: () => {
          this.modal.hide()
          new bs5.Toast({
            body: "Выбранный магазин удалён",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    }
  }
}
</script>

<style scoped>

</style>