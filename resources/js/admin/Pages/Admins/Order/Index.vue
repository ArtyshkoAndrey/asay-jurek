<template>
  <Head>
    <title>Заказы на сайте</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Заказы</h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 col-md-10">
      <form @submit.prevent="submit">
        <div class="row gy-3">
          <div class="col-12 col-md-6 col-lg-3">
            <input
              id="q"
              aria-describedby="q"
              class="form-control rounded-0"
              name="q"
              v-model="form.q"
              placeholder="Найти..."
              type="text"
            >
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <select
              name="status"
              aria-label=""
              v-model="form.status"
              class="form-select rounded-0"
            >
              <option :value="null">Все заказы</option>
              <option :value="status.value" v-for="status in orderStatuses">{{ status.name }}</option>
            </select>
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

  <div class="row justify-content-center mt-5">
    <div class="col-12 col-md-10">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">Покупатель</th>
          <th scope="col">Статус</th>
          <th scope="col">Стоимость</th>
        </tr>
        </thead>
        <tbody>

        <tr
          v-for="order in orders"
          :class="colorColumn(order.status)"
        >
          <th scope="row">{{ order.id }}</th>
          <td>
            {{ order.user_name }}
            <br>
            <span class="small">{{ order.created_at }}</span>
            <span v-if="order.payment_at">
              | <span class="small">{{ order.payment_at }}</span>
            </span>
          </td>
          <td>{{ order.status_translation }}</td>
          <td>{{ new Intl.NumberFormat('ru-Ru').format(order.cost) }} ₸</td>

        </tr>

        </tbody>
      </table>
      <InfiniteLoading
        :first-load="false"
        :orders="orders"
        @infinite="loadDataFromServer"
      >
        <template #complete>
          <span></span>
        </template>
      </InfiniteLoading>
    </div>
  </div>

</template>

<script>
import Layout from "../../../Shared/Layout";
import bs5 from "../../../../users/plugins/bs5";
import InfiniteLoading from "v3-infinite-loading";
import { Inertia } from '@inertiajs/inertia'
import {useForm} from "@inertiajs/inertia-vue3";

export default {
  name: "Index",
  layout: Layout,
  components: {
    InfiniteLoading
  },
  data: () => ({
    orders: [],
    page: 2,
    noResult: false,
    message: "",
    form: useForm({
      q: null,
      status: null
    })
  }),
  computed: {
    serverOrder() {
      return this.$page.props.orders ?? null
    },
    orderStatuses () {
      return this.$page.props.orderStatuses ?? []
    },
    formData () {
      return this.$page.props.formData
    }
  },
  mounted() {
    this.form.defaults({
      q: this.formData.q,
      status: this.formData.status
    })
    this.form.reset()
    if (this.serverOrder)
      this.orders.push(...this.serverOrder.data)
    else {
      new bs5({
        body: "Ошибка в принятии данный от сервера",
        className: 'border-0 bg-warning text-dark',
        btnCloseWhite: false,
        autohide: true,
        delay: 3000
      }).show()
    }
  },
  methods: {
    colorColumn(status) {
      if (status === 'cancel') {
        return 'table-danger'
      } else if (status === 'delivered') {
        return 'table-primary'
      } else if (status === 'not_paid') {
        return 'table-warning'
      } else if (status === 'paid') {
        return 'table-primary'
      } else if (status === 'success') {
        return 'table-success'
      }
    },
    async loadDataFromServer($state) {
      try {
        const result = await axios.get('/admin/orders', {
          params: {
            page: this.page,
            is_json: true,
            q: this.form.q,
            status: this.form.status
          }
        })
        if (result.data.payload.orders.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.orders.push(...result.data.payload.orders.data);
            $state.loaded()
            if (this.page > result.data.payload.orders.last_page) {
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
    submit () {
      this.form.get('/admin/orders')
    }
  }
}
</script>

<style lang="scss">
@import "v3-infinite-loading/lib/style.css";

.spinner {
  margin-left: auto !important;
  margin-right: auto !important;
  margin-bottom: 30px !important;
}
</style>