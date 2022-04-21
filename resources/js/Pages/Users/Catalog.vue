<template>
  <section class="container" id="catalog">
    <div class="row justify-content-between align-items-center">
      <div class="col-auto col-sm-auto">
        <h2 class="category-name">{{ category.translate[locale].name }}</h2>
      </div>
      <div class="col-auto col-sm-auto">
        <div class="dropdown">
          <button class="btn bg-transparent dropdown-toggle"
                  type="button" id="dropdownSort"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
            {{ sort.name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownSort">

            <li v-for="{ name, sort, check } in sorts">
              <button class="dropdown-item bg-transparent"
                      :class="check ? 'active' : ''"
                      @click="setSort(sort)"
              >
                {{ name }}
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row gy-md-5  gy-3 mt-5 mb-5 ">
      <div class="col-lg-4 col-6" v-for="product in products">
        <ProductCard :product="product" />
      </div>
      <div class="col-lg-4 col-6" v-for="product in products">
        <ProductCard :product="product" />
      </div>
      <div class="col-lg-4 col-6" v-for="product in products">
        <ProductCard :product="product" />
      </div>
      <div class="col-lg-4 col-6" v-for="product in products">
        <ProductCard :product="product" />
      </div>
      <div class="col-lg-4 col-6" v-for="product in products">
        <ProductCard :product="product" />
      </div>
    </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import { mapState } from "vuex";
import Swal from "sweetalert2";
import {Inertia} from "@inertiajs/inertia";
import ProductCard from "../../Shared/ProductCard";

export default {
  name: "Catalog",
  layout: Layout,
  components: {
    ProductCard
  },
  data: () => ({
    sorts: [
      {
        name: 'Сначало новые',
        sort: 'new',
        check: true
      },
      {
        name: 'Сначало дешовые',
        sort: 'lowcost',
        check: false
      },
      {
        name: 'Сначало дорогие',
        sort: 'hightcost',
        check: false
      }
    ]
  }),
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    category () {
      return this.$page.props.category
    },
    products () {
      return this.$page.props.products
    },
    sort () {
      console.log(this.sorts.find(e => e.check))
      return this.sorts.find(e => e.check)
    }
  },
  mounted() {
    // setTimeout(() => {
    //   Swal.fire({
    //     title: 'Ошибка прогрузки товара'
    //   })
    //     .then(() => {
    //       Inertia.visit('/')
    //     })
    // }, 5000)
  },
  methods: {
    setSort(sort) {
      console.log(sort)
      this.sorts.forEach(e => {
        e.check = e.sort === sort;
      })
    }
  }
}
</script>

<style scoped>

</style>