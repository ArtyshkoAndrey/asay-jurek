<template>
  <ProfilerCard>
    <div class="row">
      <div class="col-12">
        <h3 class="font-weight-bold">{{ $t('Profile_Order.title') }} №
                                     {{ order.id }}</h3>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12 order-info">
        <p><b>{{ $t('Profile_Order.created_at') }}: </b>
          {{ order.created_at }}
        </p>
        <p><b>{{ $t('Profile_Order.status') }}: </b>
          {{ order.status_translation }}
        </p>
        <p><b>{{ $t('Profile_Order.delivery') }}: </b>
          {{ order.delivery_translation }}
        </p>
        <p><b>{{ $t('Profile_Order.cost') }}: </b> {{ cost(order.cost) }}</p>
        <p><b>{{ $t('Profile_Order.promo-code') }}: </b>
          {{ order.promo_code ?? $t('Profile_Order.null-promo-code') }}
        </p>
        <p><b>{{ $t('Profile_Order.sale') }}: </b> {{ cost(order.sale) }}</p>
        <p><b>{{ $t('Profile_Order.payment_at') }}: </b>
          {{ order.payment_at ?? $t('Profile_Order.null-payment_at') }}
        </p>
      </div>
    </div>

    <div class="row justify-content-md-center justify-content-lg-start justify-content-lg-start gy-4 mt-3">
      <div
        v-for="item in order.items"
        class="col-6 col-sm-6 col-md-10 col-lg-6"
      >
        <ProductCard
          :is-order="true"
          :product='getProduct(item)'
          :show-count="true"
          :without-currency="true"
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
  data: () => ({}),
  computed: {
    user() {
      return this.$page.props.user
    },
    order() {
      return this.$page.props.order
    }
  },
  mounted() {
  },
  methods: {
    cost(cost) {
      return new Intl.NumberFormat('ru-RU').format(cost) + ' ₸'
    },
    getProduct(item) {
      let product = item.product
      product.cost = item.cost
      return product
    }
  }
}
</script>

<style
  lang="scss"
  scoped
>
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