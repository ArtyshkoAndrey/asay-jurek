<template>
  <Link :href="/product/ + product.id" class="card product-card" :class="product.count === 0 ? 'disabled' : ''">
    <div class="card-body">
      <ImageItem
        :source="product.image.url"
      />
      <div class="cart-product-info row justify-content-between">
        <div class="col-7 col-sm-auto pe-0">
          <span class="cart-product-info-name">{{ product.name }}</span>
        </div>

        <div class="col-auto col-sm-auto ps-0">
          <span class="cart-product-info-cost">{{ costWithPerfics }}</span>
        </div>

      </div>
    </div>
  </Link>
</template>

<script>
import {mapState} from "vuex";

export default {
  name: "ProductCard",
  props: {
    product: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapState('currencies', {
      currency: "currency"
    }),
    cost () {
      let cost = this.product.cost
      cost = cost * this.currency.value
      cost = Number(cost)
      console.log(this.currency.value)
      return new Intl.NumberFormat('ru-RU').format(cost)
    },
    costWithPerfics () {
      return this.cost + ' ' + this.currency.symbol
    }
  }
}
</script>

<style scoped>

</style>