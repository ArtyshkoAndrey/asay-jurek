<template>
  <ProfilerCard>
    <div class="row">
      <div class="col-12">
        <h3 class="font-weight-bold">{{ $t('Profile_Orders.title') }}</h3>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12 table-responsive">
        <table class="table align-middle table-hover">
          <thead>
          <tr>
            <th
              class="fw-normal"
              scope="col"
            >
              #
            </th>
            <th
              class="fw-normal"
              scope="col"
            >
              {{ $t('Profile_Orders.table.titles.cost') }}
            </th>
            <th
              class="fw-normal text-center"
              scope="col"
            >
              {{ $t('Profile_Orders.table.titles.count') }}
            </th>
            <th
              class="fw-normal"
              scope="col"
            >
              {{ $t('Profile_Orders.table.titles.status') }}
            </th>
            <th
              class="fw-normal"
              scope="col"
            >
              {{ $t('Profile_Orders.table.titles.payment_at') }}
            </th>
            <th
              class="fw-normal"
              scope="col"
            >
              {{ $t('Profile_Orders.table.titles.created_at') }}
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
            v-for="order in orders"
            :class="colorColumn(order.status)"
            style="cursor: pointer"
            @click="redirectToOrder(order)"
          >
            <th scope="row">{{ order.id }}</th>
            <td>{{ cost(order.cost) }}</td>
            <td class="text-center">{{ order.count_products }}</td>
            <td>{{ order.status_translation }}</td>
            <td>{{ order.payment_at }}</td>
            <td>{{ order.created_at }}</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </ProfilerCard>
</template>

<script>
import Layout from "../../../Shared/Layout";
import ProfilerCard from "../../../Shared/ProfilerCard";
import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Orders",
  layout: Layout,
  components: {
    ProfilerCard
  },
  data: () => ({}),
  computed: {
    user() {
      return this.$page.props.user
    },
    orders() {
      return this.$page.props.orders
    }
  },
  mounted() {
    console.log(this.orders)
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
    cost(cost) {
      return new Intl.NumberFormat('ru-RU').format(cost) + ' ₸'
    },
    redirectToOrder(order) {
      Inertia.get('/profile/order/' + order.id)
    }
  }
}
</script>

<style scoped>

</style>