<template>
  <Head>
    <title>Все категории товаров</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Главные категории</h1>
  </div>

  <div class="row gy-3  justify-content-center mt-5">
    <div class="col-12 mt-0 col-md-10">
      <button class="btn d-block btn-dark ms-auto fw-light rounded-0" @click="createCategory">Создать главную категорию</button>
    </div>
    <div class="col-12 col-md-10">
      <div class="card px-3">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">Наименование</th>
            </tr>
            </thead>
            <tbody>

            <tr
              v-for="category in categories"
              style="cursor: pointer"
              @click="open(category)"
            >
              <th scope="row">{{ category.id }}</th>
              <td>
                {{ category.name }}
              </td>
            </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import Layout from "../../../Shared/Layout";
import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Index",
  layout: Layout,
  computed: {
    categories () {
      return this.$page.props.categories
    }
  },
  methods: {
    open (category) {
      return Inertia.get('/admin/categories/' + category.id)
    },
    createCategory () {
      return Inertia.get('/admin/categories/create')
    }
  }
}
</script>

<style scoped>

</style>