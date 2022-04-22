<template>
  <section class="container" id="product-page">
    <div class="row gy-4 gy-md-0 position-relative">
      <div class="col-lg-6 col-md-4 col-12">
        <div class="row mb-3 position-relative" v-for="image in product.images">
          <div class="col-12 position-relative">
<!--            <img :src="image.url" class="img-fluid" :alt="product.name">-->
            <ImageItem
              :source="image.url"
            />
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-8 col-12 product-info-sticky position-sticky">
        <div class="row">
          <div class="col-12">
            <h1 class="name">{{ product.translate[locale].name }}</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <span class="cost">
              {{ costWithPerfics }}
            </span>
          </div>
        </div>

        <div class="row gx-1">
          <div class="col-auto">
            <span class="product-card-info">
              {{ $t('ProductPage.status') }} {{ product.status.translate[locale].name }}
            </span>
          </div>

          <div class="col-auto">
            <span class="product-card-info">
              {{ $t('ProductPage.count') }} {{ product.count }}
            </span>
          </div>
        </div>

        <div class="row row-tabs">
          <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link ps-0 active"
                        id="description-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#description"
                        type="button"
                        role="tab"
                        aria-controls="description"
                        aria-selected="true"
                >
                  Описание
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="history-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#history"
                        type="button"
                        role="tab"
                        aria-controls="history"
                        aria-selected="false"
                >
                  История
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="status-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#status"
                        type="button"
                        role="tab"
                        aria-controls="status"
                        aria-selected="false"
                >
                  Оценка состояния
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="delivery-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#delivery"
                        type="button"
                        role="tab"
                        aria-controls="delivery"
                        aria-selected="false"
                >
                  Доставка
                </button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"
               v-html="product.translate[locale].description">
              </div>
              <div class="tab-pane fade"
                   id="history"
                   role="tabpanel"
                   aria-labelledby="history-tab"
                   v-html="product.translate[locale].history">

              </div>
              <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                <div v-if="statusProduct" v-html="statusProduct.translate[locale].value">
                </div>
              </div>
              <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                <div v-if="delivery" v-html="delivery.translate[locale].value"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-auto">

            <div class="number-input">
              <button @change="validateCount" @click="minusCount" class="minus" :disabled="count <= 1">
                <i class="fa-solid fa-minus"></i>
              </button>
              <input class="quantity input-count" min="1" v-model.number="count" @change="validateCount" type="number">
              <button @click="plusCount" class="plus" :disabled="count >= product.count">
                <i class="fa-solid fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import { mapState } from "vuex";
import ImageSpinner from "../../../components/ImageSpinner";
import productCard from "../../Shared/ProductCard";

export default {
  name: "Product",
  components: {ImageSpinner},
  layout: Layout,
  data: () => ({
    count: 1
  }),
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    ...mapState('currencies', {
      currency: 'currency'
    }),
    product () {
      return this.$page.props.product
    },
    delivery () {
      return this.$page.props.delivery
    },
    statusProduct () {
      return this.$page.props.statusProduct
    },
    cost () {
      let cost = this.product.cost
      cost = cost * this.currency.value
      cost = Number(cost)
      console.log(this.currency.value)
      return new Intl.NumberFormat('ru-RU').format(cost)
    },
    costWithPerfics () {
      return this.cost + ' ' + this.currency.symbol
    },
  },
  methods: {
    minusCount () {
      if (this.count !== 1) {
        this.count--
      }
    },
    plusCount () {
      if (this.count < this.product.count) {
        this.count++
      }
    },
    validateCount () {
      if (this.count > this.product.count) {
        this.count = this.product.count
      } else if (this.count <= 0) {
        this.count = 1
      }
    }
  }
}
</script>

<style scoped>

</style>