<template>
  <Link :href="/product/ + product.id" class="card product-card" :class="product.count === 0 ? 'disabled' : ''">
    <div class="card-body">
      <ImageItem
        :source="product.image.url"
      />
      <div class="cart-product-info row justify-content-between">
        <div class="col-sm-auto pe-0" :class="{'col-12': isOrder, 'col-7': !isOrder}">
          <span class="cart-product-info-name">{{ product.translate[locale].name }}</span>
        </div>

        <div class="col-sm-auto" :class="{'col-12 text-end': isOrder, 'col-auto ps-0': !isOrder}">
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
    },
    withoutCurrency: {
      type: Boolean,
      required: false,
      default: false
    },
    showCount: {
      type: Boolean,
      required: false,
      default: false
    },
    isOrder: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  computed: {
    ...mapState('currencies', {
      currency: "currency"
    }),
    ...mapState('i18n', {
      locale: "locale"
    }),
    cost () {
      if (this.withoutCurrency) {
        return new Intl.NumberFormat('ru-RU').format(this.product.cost)
      }
      let cost = this.product.cost
      cost = cost * this.currency.value
      cost = cost.toFixed(0)
      return new Intl.NumberFormat('ru-RU').format(cost)
    },
    costWithPerfics () {
      if (this.withoutCurrency) {
        return this.cost + ' ₸'
      }
      return this.cost + ' ' + this.currency.symbol
    }
  }
}
</script>

<style scoped>

</style>