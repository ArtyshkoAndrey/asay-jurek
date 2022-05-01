<template>
  <ProfilerCard>
    <div class="row">
      <div class="col-12">
        <h3 class="font-weight-bold">Заказ № {{ order.id }}</h3>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12 order-info">
        <p><b>Дата создания заказа: </b> {{ order.created_at }}</p>
        <p><b>Статус заказа: </b> {{ order.status_translation }}</p>
        <p><b>Детали доставки: </b> {{ order.delivery_translation }}</p>
        <p><b>Итоговая сумма заказа: </b> {{ cost(order.cost) }}</p>
        <p><b>Промокод: </b> {{ order.promo_code ?? 'Не применялся' }}</p>
        <p><b>Итоговая скидка: </b> {{ cost(order.sale) }}</p>
        <p><b>Дата оплаты: </b> {{ order.payment_at ?? 'Не оплачен' }}</p>
      </div>
    </div>

    <div class="row justify-content-md-center justify-content-lg-start justify-content-lg-start gy-4 mt-3">
      <div v-for="item in order.items" class="col-6 col-sm-6 col-md-10 col-lg-6">
        <ProductCard :product='getProduct(item)'
                     :without-currency="true"
                     :show-count="true"
                     :is-order="true"
        />
      </div>
    </div>
  </ProfilerCard>
</template>

<script>
import Layout from "../../../Shared/Layout";
import ProfilerCard from "../../../Shared/ProfilerCard";
import ProductCard from "../../../Shared/ProductCard";

export default {
  name: "Orders",
  layout: Layout,
  components: {
    ProfilerCard,
    ProductCard
  },
  data: () => ({

  }),
  computed: {
    user () {
      return this.$page.props.user
    },
    order () {
      return this.$page.props.order
    }
  },
  mounted() {
  },
  methods: {
    cost (cost) {
      return new Intl.NumberFormat('ru-RU').format(cost) + ' ₸'
    },
    getProduct (item) {
      let product = item.product
      product.cost = item.cost
      return product
    }
  }
}
</script>

<style lang="scss" scoped>
p {
  margin-bottom: 5px;
  font-weight: 300;

  b {
    font-weight: bold !important;
  }

  @media screen and (max-width: 768px) {
    font-size: 14px;
  }

}
</style>