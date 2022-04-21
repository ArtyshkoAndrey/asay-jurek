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
        <div class="col-lg-4 col-6" v-for="product in productsList" :key="product.id">
          <ProductCard :product="product" />
        </div>
      </div>
    <InfiniteLoading :productsList="productsList" :first-load="false" @infinite="loadDataFromServer">
      <template #complete>
        <span></span>
      </template>
    </InfiniteLoading>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import { mapState } from "vuex";
import ProductCard from "../../Shared/ProductCard";
import InfiniteLoading from "v3-infinite-loading";

export default {
  name: "Catalog",
  layout: Layout,
  components: {
    ProductCard,
    InfiniteLoading
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
    ],
    page: 2,
    noResult: false,
    message: "",
    productsList: []
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
  mounted () {
    console.log(this.$page.props.products)
    this.productsList.push(...this.$page.props.products.data)
  },
  methods: {
    setSort(sort) {
      console.log(sort)
      this.sorts.forEach(e => {
        e.check = e.sort === sort;
      })
    },
    async loadDataFromServer($state){
      console.log("loading...");
      try {
        const result = await axios.get('/api/catalog/' + this.category.id + '?page=' + this.page)
        if(result.data.payload.products.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.productsList.push(...result.data.payload.products.data);
            $state.loaded()
            if (this.page > result.data.payload.products.last_page) {
              $state.complete()
            }
          }, 1000)
        } else {
          $state.complete()
        }
      } catch(err) {
        $state.error()
      }
    }
  }
}
</script>

<style lang="scss">
  @import "v3-infinite-loading/lib/style.css";

  .spinner {
    margin-left: auto !important;
    margin-right: auto !important;
    margin-bottom: 30px !important;
  }
</style>