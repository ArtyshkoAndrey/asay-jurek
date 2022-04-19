<template>
  <nav class="navbar navbar-expand navbar-light bg-transparent d-none d-md-block">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-uppercase">
          <li class="nav-item">
            <Link class="nav-link" :class="{ 'active': $page.component === 'Users/Index' }" href="/">
              Новые поступления
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" :class="{ 'active': $page.component === 'Users/About' }" href="/about">
              Подборка недели
            </Link>
          </li>
          <li  v-for="category in categories">
            <Link class="nav-link"
                  :class="{ 'active': $page.url === '/catalog/' + category.id }"
                  :href="'/catalog/' + category.id"
            >
              {{ category.translate[locale].name }}
            </Link>
          </li>
          <li class="nav-item">
            <button class="btn border-0 shadow-none rounded-0 bg-transparent text-dark" @click="openCart">
              Корзина
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</template>

<script>
import {mapState} from "vuex";

export default {
  name: "SubMenu",
  emits: ['switchBigCart'],
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    categories () {
      return this.$page.props.menu.categories
    },
  },
  methods: {
    openCart () {
      this.$emit('switchBigCart')
    }
  }
}
</script>

<style scoped>

</style>