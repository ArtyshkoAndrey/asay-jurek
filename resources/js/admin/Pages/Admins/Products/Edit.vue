<template>
  <Head>
    <title>Товар - {{ serverProduct.name }}</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Товар - {{ serverProduct.name }}</h1>
  </div>

  <div class="row gy-3 gy-md-0">
    <div class="col-12 col-md-6 col-lg-4 order-1 order-md-0">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="ru_name">Наименование *</label>
                <input
                  v-model="product.ru.name"
                  name="ru_name"
                  id="ru_name"
                  type="text"
                  class="form-control rounded-0"
                  :class="{'is-invalid': product.errors['ru.name']}"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
  name: "Edit",
  layout: Layout,
  data: () => ({
    product: useForm({
      ru: {
        name: null,
        description: null,
        history: null
      },
      en: {
        name: null,
        description: null,
        history: null
      },
      category_id: null,
      count: null,
      cost: null,
      new: false,
      week: false,
      status_id: null,
      images: []
    }),
  }),
  computed: {
    serverProduct() {
      return this.$page.props.product
    }
  },
  mounted() {
    this.product.defaults({
      ...this.serverProduct,
      ru: {
        name: this.serverProduct.translate['ru'].name,
        description: this.serverProduct.translate['ru'].description,
        history: this.serverProduct.translate['ru'].history
      },
      en: {
        name: this.serverProduct.translate['en'].name,
        description: this.serverProduct.translate['en'].description,
        history: this.serverProduct.translate['en'].history
      },
    }).reset()
  },
  methods: {}
}
</script>

<style scoped>

</style>