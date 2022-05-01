<template>
  <nav id="submenu" class="navbar navbar-expand navbar-light bg-transparent d-none d-md-block">
    <div class="container">
      <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
              data-target="#navbarNav" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav text-uppercase">
          <li class="nav-item">
            <Link :class="{ 'active': $page.url.startsWith('/new-arrivals') }" class="nav-link" href="/new-arrivals">
              {{ $t('components.SubMenu.new_products') }}
            </Link>
          </li>
          <li class="nav-item" :class="{'dropdown dropdown-category': category.childs.length > 0}" v-for="category in categories">
            <Link v-if="category.childs.length <= 0" key="1"
                  :class="{ 'active': $page.url.startsWith('/catalog/' + category.id)}"
                  :href="'/catalog/' + category.id"
                  class="nav-link"
            >
              {{ category.translate[locale].name }}
            </Link>

            <a v-else key="2"
               :id="'dropdownMenuLink' + category.id"
               aria-expanded="false"
               class="nav-link dropdown-toggle"
               data-bs-toggle="dropdown"
               href="!#"
               role="button"
            >
              {{ category.translate[locale].name }}
            </a>
            <div v-if="category.childs.length > 0"
                 :aria-labelledby="'dropdownMenuLink' + category.id"
                 class="dropdown-menu justify-content-center"
            >
              <div class="container">
                <div v-for="child in category.childs">
                  <Link
                        :class="{ 'active': $page.url.startsWith('/catalog/' + child.id)}"
                        :href="'/catalog/' + child.id"
                        class="nav-link"
                  >
                    {{ child.translate[locale].name }}
                  </Link>
                </div>
              </div>
            </div>

          </li>

          <li class="nav-item">
            <Link :class="{ 'active': $page.url.startsWith('/products-weeks') }" class="nav-link" href="/products-weeks">
              {{ $t('components.SubMenu.weeks_products') }}
            </Link>
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
    categories() {
      return this.$page.props.menu.categories
    },
  },
  methods: {
    openCart() {
      this.$emit('switchBigCart')
    }
  }
}
</script>

<style scoped>

</style>