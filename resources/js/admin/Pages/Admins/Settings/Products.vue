<template>
  <Head>
    <title>Настройки данных для товаро</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Настройки данных для товаров</h1>
  </div>


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
<!--            <h5 class="card-title mb-3">Код интеграции метрики</h5>-->
            <form @submit.prevent="submit">

              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="delivery_ru">Доставка RU</label>
                    <textarea
                      id="delivery_ru"
                      class="form-control mb-3"
                      v-model="form.ru.delivery"
                      rows="4"
                      placeholder="Код интеграции метрики"
                    ></textarea>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="delivery_en">Доставка EN</label>
                    <textarea
                      id="delivery_en"
                      class="form-control mb-3"
                      v-model="form.en.delivery"
                      rows="4"
                      placeholder="Код интеграции метрики"
                    ></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <hr>
                </div>
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="status_product_ru">
                      Оценка состояния RU</label>
                    <textarea
                      id="status_product_ru"
                      class="form-control mb-3"
                      v-model="form.ru.status_product"
                      rows="4"
                      placeholder="Оценка состояния RU"
                    ></textarea>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="status_product_en">
                      Оценка состояния EN</label>
                    <textarea
                      id="status_product_en"
                      class="form-control mb-3"
                      v-model="form.en.status_product"
                      rows="4"
                      placeholder="Оценка состояния EN"
                    ></textarea>
                  </div>
                </div>
              </div>

              <button
                class="h-100 d-block btn btn-dark rounded-0 ms-auto"
                type="submit"
              >
                Сохранить
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import bs5 from "../../../../users/plugins/bs5";

export default {
  name: "Yandex",
  layout: Layout,
  components: {
  },
  data: () => ({
    form: useForm({
      ru: {
        status_product: null,
        delivery: null
      },
      en: {
        status_product: null,
        delivery: null
      }
    })
  }),
  computed: {
    delivery () {
      return this.$page.props.delivery ?? null
    },
    status_product () {
      return this.$page.props.status_product ?? null
    },
  },
  mounted() {
    this.form.defaults({
      ru: {
        status_product: this.status_product.translate['ru'].value,
        delivery: this.delivery.translate['ru'].value
      },
      en: {
        status_product: this.status_product.translate['ru'].value,
        delivery: this.delivery.translate['ru'].value
      }
    })
    this.form.reset()

  },
  methods: {
    submit () {
      this.form.post('/admin/settings/products', {
        onSuccess: () => {
          new bs5.Toast({
            body: "Данные сохранены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>