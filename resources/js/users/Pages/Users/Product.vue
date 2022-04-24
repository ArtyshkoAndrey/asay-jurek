<template>
  <section class="container" id="product-page">
    <div class="row gy-4 gy-md-0 position-relative">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="row gy-md-3 gx-3 gx-md-0 position-relative  flex-nowrap overflow-auto flex-md-wrap">
          <div class="col-12 position-relative" v-for="image in product.images">
            <ImageItem
              :source="image.url"
            />
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12 product-info-sticky position-sticky">
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

        <div class="row gx-2">
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

        <div class="row">
          <div class="col-12 row-tabs order-last order-md-first">
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

          <div class="col-12">
            <div class="row align-items-end">
              <div class="col-auto">
            <span class="w-100 span-count d-block">
              {{ $t('ProductPage.count_label') }}
            </span>
                <div class="number-input">
                  <button @change="validateCount" @click="minusCount" class="minus" :disabled="count <= 1">
                    <i class="fa-light fa-minus"></i>
                  </button>
                  <input class="quantity input-count" min="1" v-model.number="count" @change="validateCount" type="number">
                  <button @click="plusCount" class="plus" :disabled="count >= product.count">
                    <i class="fa-light fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="col col-md col-lg-8">
                <button class="btn btn-dark w-100 btn-add-cart" @click="addProduct" :disabled="product.count <= 0">
                  <transition appear name="fade" mode="out-in">

                    <div  v-if="addLoading" key="loading" class="d-flex justify-content-center align-items-center">
                      <span class="spinner-border spinner-border-sm me-3" role="status" aria-hidden="true"></span>
                      {{ $t('ProductPage.addButton.labels.loading') }}
                    </div>


                    <span v-else-if="!addAnimate" key="1">
                  {{ $t('ProductPage.addButton.labels.add') }}
                </span>

                    <span v-else key="2">
                  {{ $t('ProductPage.addButton.labels.success') }}
                  <i class="fa-light fa-check"></i>
                </span>
                  </transition>
                </button>
              </div>
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
import bs5 from '../../plugins/bs5'

export default {
  name: "Product",
  components: {ImageSpinner},
  layout: Layout,
  data: () => ({
    count: 1,
    addAnimate: false,
    addLoading: false
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
      cost = cost.toFixed(0)
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
    },
    addProduct () {
      if (this.addLoading === false && this.addAnimate === false) {
        this.addLoading = true
        setTimeout(() => {
          this.addLoading = false
          this.addAnimate = true
          new bs5.Toast({
            body: this.$t('tooltips.addProduct'),
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 5000
          }).show()

          setTimeout(() => {

            this.addLoading = false
            this.addAnimate = false
          }, 2000)
        }, 1500)

      }
    }
  }
}
</script>

<style scoped>

</style>