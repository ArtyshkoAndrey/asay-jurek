<template>
  <transition :duration="500" name="nested">
    <div v-show="opened" id="big-cart" class="py-3">
      <div class="row mx-0">
        <div class="col-12 bg-white">
          <button class="btn bg-transparent fw-normal text-uppercase ms-auto w-auto d-flex px-3 py-3"
                  @click="switchOpened"
          >
            {{ $t('components.BigCart.close') }}
          </button>
        </div>
      </div>

      <div class="row big-cart-items-list mx-0 gy-md-3 gy-4 mt-0">
        <div v-if="response_products.length > 0" v-for="product in response_products" class="col-12 item">
          <div class="row">
            <div class="col-4 col-md-4">
              <img :src="product.image.url" alt="Item Name" class="img-fluid border-0">
            </div>
            <div class="col">
              <div class="row">
                <div class="col-12">
                  <h5 class="item-name">{{ product.translate[locale].name }}</h5>
                </div>
                <div class="col-12">
                  <span class="item-price">{{ costWithPerfics(product.cost) }}</span>
                </div>

                <div class="col-12 mt-3 fw-light">
                  <span class="">{{ $t('components.BigCart.count') }} {{ find(product.id).count }}</span>
                </div>

                <div class="col-12">
                  <button class="btn bg-transparent px-0 py-3 mt-2 remove-item" @click="remove(product.id)">
                    {{ $t('components.BigCart.remove') }}
                  </button>
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-0">
        </div>

        <div v-if="response_products.length > 0" class="col-12">
          <div class="row justify-content-between">
            <div class="col-auto">
              <span class="total-cost">{{ $t('components.BigCart.total') }}</span>
            </div>

            <div class="col-auto">
              <span class="total-cost-price">{{ totalCostWithPrefics }}</span>
            </div>
            <div class="col-12">
              <button id="by-order" class="btn btn-dark">
                {{ $t('components.BigCart.by-order') }}
              </button>
            </div>
          </div>
        </div>

        <div v-if="response_products.length === 0" class="col-12">
          <span class="empty-cart">
            {{ $t('components.BigCart.empty-cart') }}
          </span>
        </div>
      </div>


    </div>
  </transition>
</template>

<script>
import {mapActions, mapGetters, mapState} from "vuex";

export default {
  name: "BigCart",
  emits: ['switchedOpened'],
  data: () => ({
    opened: false
  }),
  computed: {
    ...mapGetters('cart', {
      response_products: "response_products",
      total_cost: 'cost'
    }),
    ...mapState('i18n', {
      locale: 'locale'
    }),
    ...mapState('currencies', {
      currency: 'currency'
    }),
    ...mapGetters('cart', {
      find: 'find'
    }),
    totalCostWithPrefics() {
      let cost = this.total_cost * this.currency.value
      cost = cost.toFixed(0)
      cost = Number(cost)
      return new Intl.NumberFormat('ru-RU').format(cost) + ' ' + this.currency.symbol
    }
  },
  methods: {
    switchOpened() {
      this.opened = !this.opened
      this.$emit('switchedOpened', this.opened)
    },
    cost(cost) {
      cost = cost * this.currency.value
      cost = cost.toFixed(0)
      return new Intl.NumberFormat('ru-RU').format(cost)
    },
    costWithPerfics(cost) {
      return this.cost(cost) + ' ' + this.currency.symbol
    },
    ...mapActions('cart', {
      remove: 'removeProduct'
    })
  }
}
</script>

<style scoped>
.nested-enter-active, .nested-leave-active {
  transition: all 0.3s ease-in-out;
}

/* delay leave of parent element */
.nested-leave-active {
  transition-delay: .1s;
}

.nested-enter-from,
.nested-leave-to {
  transform: translateX(200px);
  opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
  transition: all 1s ease-in-out;
}

/* delay enter of nested element */
.nested-enter-active .inner {
  transition-delay: 10s;
}

.nested-enter-from .inner,
.nested-leave-to .inner {
  transform: translateX(30px);
  /*
  	Hack around a Chrome 96 bug in handling nested opacity transitions.
    This is not needed in other browsers or Chrome 99+ where the bug
    has been fixed.
  */
  opacity: 0.001;
}
</style>