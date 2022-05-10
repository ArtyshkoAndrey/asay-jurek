<template>
  <Head>
    <title>Товары на сайта</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Товары</h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 col-md-10">
      <div class="card">
        <div class="card-body">
          <form @submit.prevent="submit">
            <div class="row align-items-center gy-3">
              <div class="col-12 col-md-6 col-lg-3">
                <input
                  id="q"
                  v-model="form.q"
                  aria-describedby="q"
                  class="form-control rounded-0"
                  name="q"
                  placeholder="Найти..."
                  type="text"
                >
              </div>
              <div class="col-12 col-md-auto">
                <button
                  class="h-100 btn btn-dark rounded-0"
                  type="submit"
                >
                  Фильтровать
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row gy-3  justify-content-center mt-5">
    <div class="col-12 d-flex justify-content-end mt-0 col-md-10">
      <Link
        class="btn btn-dark fw-light rounded-0"
        href="/admin/products/create"
      >
        Создать Товар
      </Link>
    </div>
    <div class="col-12 col-md-10">
      <div class="card px-3">
        <div class="card-body">
          <table class="table table-hover align-middle">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th>Фотография</th>
              <th scope="col">Название</th>
              <th scope="col">Кол-во</th>
              <th scope="col">Стоимость</th>
            </tr>
            </thead>
            <tbody>

              <tr
                v-for="product in products"
                style="cursor: pointer"
                @click="open(product)"
              >
                <th scope="row">{{ product.id }}</th>
                <td>
                  <ImageItem class="img-thumbnail m-0" :source="product.image.url"/>
                </td>
                <td>
                  {{ product.name }}
                </td>
                <td>{{ product.count }}</td>
                <td>{{ new Intl.NumberFormat('ru-Ru').format(product.cost) }} ₸</td>
              </tr>

            </tbody>
          </table>
          <InfiniteLoading
            :first-load="false"
            :products="products"
            @infinite="loadDataFromServer"
          >
            <template #complete>
              <span></span>
            </template>
          </InfiniteLoading>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import bs5 from "../../../../users/plugins/bs5";
import {useForm} from "@inertiajs/inertia-vue3";
import InfiniteLoading from "v3-infinite-loading";

export default {
  name: "Index",
  layout: Layout,
  components: {
    InfiniteLoading
  },
  data: () => ({
    products: [],
    form: useForm({
      q: null
    }),
    page: 2
  }),
  computed: {
    serveProducts() {
      return this.$page.props.products ?? null
    },
    formData() {
      return this.$page.props.formData
    }
  },
  mounted() {
    this.form.defaults({
      q: this.formData.q
    }).reset()

    if (this.serveProducts) {
      this.products.push(...this.serveProducts.data)
    } else {
      new bs5.Toast({
        body: "Ошибка в принятии данный от сервера",
        className: 'border-0 bg-warning text-dark',
        btnCloseWhite: false,
        autohide: true,
        delay: 3000
      }).show()
    }
  },
  methods: {
    submit() {
      this.form.get('/admin/products')
    },
    async loadDataFromServer ($state) {
      try {
        const result = await axios.get('/admin/products', {
          params: {
            page: this.page,
            is_json: true,
            q: this.form.q,
          }
        })
        if (result.data.payload.products.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.products.push(...result.data.products.data);
            $state.loaded()
            if (this.page > result.data.products.last_page) {
              $state.complete()
            }
          }, 1000)
        } else {
          $state.complete()
        }
      } catch (err) {
        $state.error()
      }
    }
  }
}
</script>

<style lang="scss" scoped>
 .img-thumbnail {
   height: 100px;
   width: 100px;
   object-fit: cover;
 }

 img {
   height: 100px !important;
   width: 100px !important;
 }
</style>