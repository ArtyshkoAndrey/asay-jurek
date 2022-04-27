<template>
  <section id="product-page" class="container">
    <div class="row gy-4 gy-md-0 position-relative">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="row gy-md-3 gx-3 gx-md-0 position-relative  flex-nowrap overflow-auto flex-md-wrap">
          <div v-for="image in product.images" class="col-12 position-relative">
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
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button id="description-tab"
                        aria-controls="description"
                        aria-selected="true"
                        class="nav-link ps-0 active"
                        data-bs-target="#description"
                        data-bs-toggle="tab"
                        role="tab"
                        type="button"
                >
                  {{ $t('ProductPage.tabs.description') }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button id="history-tab"
                        aria-controls="history"
                        aria-selected="false"
                        class="nav-link"
                        data-bs-target="#history"
                        data-bs-toggle="tab"
                        role="tab"
                        type="button"
                >
                  {{ $t('ProductPage.tabs.history') }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button id="status-tab"
                        aria-controls="status"
                        aria-selected="false"
                        class="nav-link"
                        data-bs-target="#status"
                        data-bs-toggle="tab"
                        role="tab"
                        type="button"
                >
                  {{ $t('ProductPage.tabs.status') }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button id="delivery-tab"
                        aria-controls="delivery"
                        aria-selected="false"
                        class="nav-link"
                        data-bs-target="#delivery"
                        data-bs-toggle="tab"
                        role="tab"
                        type="button"
                >
                  {{ $t('ProductPage.tabs.delivery') }}
                </button>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div id="description" aria-labelledby="description-tab" class="tab-pane fade show active" role="tabpanel"
                   v-html="product.translate[locale].description">
              </div>
              <div id="history"
                   aria-labelledby="history-tab"
                   class="tab-pane fade"
                   role="tabpanel"
                   v-html="product.translate[locale].history">

              </div>
              <div id="status" aria-labelledby="status-tab" class="tab-pane fade" role="tabpanel">
                <div v-if="statusProduct" v-html="statusProduct.translate[locale].value">
                </div>
              </div>
              <div id="delivery" aria-labelledby="delivery-tab" class="tab-pane fade" role="tabpanel">
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
                  <button :disabled="count <= 1" class="minus" @change="validateCount" @click="minusCount">
                    <i class="fa-light fa-minus"></i>
                  </button>
                  <input v-model.number="count" class="quantity input-count" min="1" type="number"
                         @change="validateCount">
                  <button :disabled="count >= product.count" class="plus" @click="plusCount">
                    <i class="fa-light fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="col col-md col-lg-8">
                <button :disabled="product.count <= 0" class="btn btn-dark w-100 btn-add-cart" @click="addProduct">
                  <transition appear mode="out-in" name="fade">

                    <div v-if="addLoading" key="loading" class="d-flex justify-content-center align-items-center">
                      <span aria-hidden="true" class="spinner-border spinner-border-sm me-3" role="status"></span>
                      {{ $t('ProductPage.addButton.labels.loading') }}
                    </div>



                    <span v-else-if="addAnimate" key="2">
                      {{ $t('ProductPage.addButton.labels.success') }}
                      <i class="fa-light fa-check"></i>
                    </span>

                    <span v-else-if="addError" key="3">
                      {{ $t('ProductPage.addButton.labels.error') }}
                      <i class="fa-light fa-circle-exclamation"></i>
                    </span>

                    <span v-else key="4">
                      {{ $t('ProductPage.addButton.labels.add') }}
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
import {mapActions, mapState} from "vuex";
import ImageSpinner from "../../../components/ImageSpinner";
import bs5 from '../../plugins/bs5'

export default {
  name: "Product",
  components: {ImageSpinner},
  layout: Layout,
  data: () => ({
    count: 1,
    addAnimate: false,
    addLoading: false,
    addError: false
  }),
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    ...mapState('currencies', {
      currency: 'currency'
    }),
    user () {
      return this.$page.props.auth.user
    },
    product() {
      return this.$page.props.product
    },
    delivery() {
      return this.$page.props.delivery
    },
    statusProduct() {
      return this.$page.props.statusProduct
    },
    cost() {
      let cost = this.product.cost
      cost = cost * this.currency.value
      cost = cost.toFixed(0)
      return new Intl.NumberFormat('ru-RU').format(cost)
    },
    costWithPerfics() {
      return this.cost + ' ' + this.currency.symbol
    },
  },
  methods: {
    ...mapActions('cart', {
      add: 'add'
    }),
    minusCount() {
      if (this.count !== 1) {
        this.count--
      }
    },
    plusCount() {
      if (this.count < this.product.count) {
        this.count++
      }
    },
    validateCount() {
      if (this.count > this.product.count) {
        this.count = this.product.count
      } else if (this.count <= 0) {
        this.count = 1
      }
    },
    addProduct() {
      if (this.addLoading === false && this.addAnimate === false) {
        this.addLoading = true
        this.addAnimate = false

        this.add({
          id: this.product.id,
          count: this.count,
          user: this.user
        })
          .then(r => {
            if (r) {
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
                }, 1500)
              }, 1000)
            } else {
              this.addLoading = false
              this.addAnimate = false
              this.addError = true
              setTimeout(() => {
                this.addLoading = false
                this.addAnimate = false
                this.addError = false
              }, 1500)

            }
          })

      }
      // if (this.addLoading === false && this.addAnimate === false) {
      //   this.addLoading = true
      //   setTimeout(() => {
      //     this.addLoading = false
      //     this.addAnimate = true
      //     new bs5.Toast({
      //       body: this.$t('tooltips.addProduct'),
      //       className: 'border-0 bg-dark text-white',
      //       btnCloseWhite: true,
      //       autohide: true,
      //       delay: 5000
      //     }).show()
      //
      //     setTimeout(() => {
      //
      //       this.addLoading = false
      //       this.addAnimate = false
      //     }, 2000)
      //   }, 1500)
      //
      // }
    }
  }
}
</script>

<style scoped>

</style>