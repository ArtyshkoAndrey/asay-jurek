<template>
  <Head>
    <title>Категория - {{ category.name }}</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
      Категория - {{ category.name }}
    </h1>
  </div>

  <div class="row gy-3">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ category.name }}</h5>

              <p>
                Наименования на русском: <b>{{ category.translate['ru'].name }}</b>
              </p>
              <p>
                Наименования на английском: <b>{{ category.translate['en'].name }}</b>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Дочерние категории</h5>

              <p v-for="(cat, i) in category.childs">
                {{ i + 1 }}.
                <Link :href="'/admin/categories/' + cat.id">
                  <b>{{ cat.name }}</b>
                </Link>
              </p>


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Главная категори</h5>

              <p v-if="category.parent">
                <Link :href="'/admin/categories/' + category.parent.id">
                  <b>{{ category.parent.name }}</b>
                </Link>
              </p>


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="row">

        <div class="col-12 col-md-auto">
          <button class="btn btn-dark rounded-0" @click="edit">Редактировать</button>
        </div>

        <div class="col-12 col-md-auto">
          <button class="btn btn-dark rounded-0" :disabled="category.parent !== null" @click="createChild">Создать дочернию категорию</button>
        </div>

        <div class="col-12 col-md-auto">
          <button class="btn btn-danger rounded-0" @click="remove" :disabled="category.childs.length > 0">Удалить</button>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Show",
  layout: Layout,
  data: () => ({
  }),
  computed: {
    category () {
      return this.$page.props.category
    },
  },
  mounted() {
  },
  methods: {
    edit () {
      return Inertia.get('/admin/categories/' + this.category.id + '/edit')
    },
    remove () {
      return Inertia.delete('/admin/categories/' + this.category.id)
    },
    createChild () {
      return Inertia.get('/admin/categories/create?parent_id=' + this.category.id)
    }
  }
}
</script>

<style scoped>

</style>