<template>
  <Head>
    <title>Заказ № {{ form.id }}</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Заказ № {{ form.id }}</h1>
  </div>

  <div class="row gy-3 gy-md-0">
    <div class="col-12 col-md-6 col-lg-4 order-1 order-md-0">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p><b>Номер заказа:</b> {{ form.id }}</p>
              <p><b>Покупатель:</b> {{ form.user_name }}</p>
              <p><b>Дата покупки:</b> {{ form.created_at }}</p>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p><b>Адрес доставки:</b> {{ form.user_address }}</p>
              <p><b>Имя получателя:</b> {{ form.user_name }}</p>
              <p><b>Телефон:</b> {{ form.user_phone }}</p>
              <p><b>Email:</b> {{ form.user_email }}</p>
            </div>
          </div>
        </div>

        <div
          v-if="order.type_delivery === 'in_shop'"
          class="col-12"
        >
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Самовывоз из магазина</h5>
              <p><b>Адрес магазина:</b> {{
                  form.shop ? form.shop.country + ', ' + form.shop.city + ', ' + form.shop.street : 'Магазин удалён'
                                        }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col order-0 order-md-1">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form @submit.prevent="submit">
                <div class="mb-3">
                  <label
                    class="form-label"
                    for="status"
                  >
                    Статус заказа
                  </label>
                  <select
                    id="status"
                    :class="{'is-invalid': form.errors.status}"
                    class="form-select rounded-0"
                    v-model="form.status"
                    :disabled="order.status === cancelStatus"
                  >
                    <option v-for="status in orderStatuses" :value="status.value">{{ status.name }}</option>
                  </select>
                  <div
                    v-if="form.errors.status"
                    class="invalid-feedback"
                  >
                    {{ form.errors.status }}
                  </div>
                </div>

                <div class="mb-3">
                  <label
                    class="form-label"
                    for="track"
                  >
                    Трек номер
                  </label>
                  <input
                    id="track"
                    type="text"
                    disabled
                    placeholder="Трек номер"
                    class="form-control rounded-0"
                   />
                  <div
                    v-if="form.errors.status"
                    class="invalid-feedback"
                  >
                    {{ form.errors.status }}
                  </div>
                </div>

                <button type="submit" class="btn btn-dark rounded-0 fw-light" :disabled="form.processing || order.status === cancelStatus">Сохранить</button>
              </form>
            </div>
          </div>
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
  name: "Show",
  layout: Layout,
  components: {},
  data: () => ({
    form: useForm({
      id: null,
      status: null
    })
  }),
  computed: {
    orderStatuses() {
      return this.$page.props.orderStatuses ?? []
    },
    order() {
      return this.$page.props.order
    },
    cancelStatus () {
      return this.$page.props.cancelStatus
    }
  },
  mounted() {
    this.form.defaults({
      ...this.order
    })
    this.form.reset()

    console.log(this.cancelStatus)
  },
  methods: {
    submit() {
      this.form.put('/admin/orders/' + this.order.id, {
        onSuccess: () => {
          new bs5.Toast({
            body: "Данные сохранены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          for (let key in this.form.errors) {
            if (this.form.errors[key]) {
              new bs5.Toast({
                body: this.form.errors[key],
                className: 'border-0 bg-warning text-dark',
                btnCloseWhite: false,
                autohide: true,
                delay: 3000
              }).show()
            }
          }
          new bs5.Toast({
            body: "Возникла ошибка сохранение данных",
            className: 'border-0 bg-warning text-dark',
            btnCloseWhite: false,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    },
  }
}
</script>

<style
  lang="scss"
  scoped
>
.card {
  p {
    margin-bottom: 0;
    font-size: 14px;
  }
}
</style>