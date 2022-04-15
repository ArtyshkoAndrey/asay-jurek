<template>
  <nav class="navbar navbar-expand navbar-light bg-transparent">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavPrimary">
        <ul class="navbar-nav text-uppercase w-100">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ currency.short_name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li v-for="c in currencies">
                <a class="dropdown-item"
                   :class="c.id === currency.id ? 'active' : ''"
                   href="#"
                   @click="setCurrency(c)"
                >
                  {{ c.short_name }}
                  <span class="name-currency">{{ c.name }}</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown me-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              KZT
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">KZT</a></li>
              <li><a class="dropdown-item" href="#">RUB</a></li>
              <li><a class="dropdown-item" href="#">USD</a></li>
            </ul>
          </li>
          
          <li class="nav-item mx-auto">
            <img src="public/img/menu-logo.png" class="img-fluid" alt="Asay Jurek Logo">
          </li>

          <li class="nav-item dropdown ms-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              KZT
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">KZT</a></li>
              <li><a class="dropdown-item" href="#">RUB</a></li>
              <li><a class="dropdown-item" href="#">USD</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import {mapState, mapActions} from "vuex";

export default {
  name: "Menu",
  computed: mapState('currencies', {
    currency: state => state.currency,
    currencies: state => state.all_currencies
  }),
  methods: {
    ...mapActions('currencies', [
      'setCurrency'
    ])
  }
}

</script>

<style scoped>

</style>