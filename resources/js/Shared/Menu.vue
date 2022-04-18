<template>
  <nav class="navbar navbar-expand navbar-light bg-transparent">
    <div class="container">
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
                  <span class="name-currency">{{ c.translate[$i18n.locale].name }}</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown me-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $i18n.locale === "ru" ? "RUS" : "ENG" }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item"
                   :class="$i18n.locale === 'ru' ? 'active' : ''"
                   href="#"
                   @click="locale('ru')"
                >
                  {{ $t('locales.ru.title') }}
                  <span class="name-currency">{{ $t('locales.ru.description') }}</span>
                </a>
              </li>

              <li>
                <a class="dropdown-item"
                   :class="$i18n.locale === 'en' ? 'active' : ''"
                   href="#"
                   @click="locale('en')"
                >
                  {{ $t('locales.en.title') }}
                  <span class="name-currency">{{ $t('locales.en.description') }}</span>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item mx-auto">
            <img src="public/img/menu-logo.png" class="img-fluid" alt="Asay Jurek Logo">
          </li>

          <li class="nav-item dropdown ms-auto pe-3 left-border">
            <a href="#"
               class="nav-link btn bg-transparent dropdown-toggle p-0"
               id="userDropdown"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false"
            >
              <i class="far fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li class="">
                <Link href="/" class="dropdown-item">Вход</Link>
              </li>
              <li class="">
                <Link href="/" class="dropdown-item">Регистрация</Link>
              </li>
            </ul>
          </li>

          <li class="nav-item ps-3">
            <button class="nav-link btn bg-transparent p-0" @click="openCart">
              <i class="far fa-shopping-bag"></i>
            </button>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import {mapState, mapActions} from "vuex";
import { useI18n } from "vue-i18n";
export default {
  name: "Menu",
  emits: ['switchBigCart'],
  computed: {
    ...mapState('currencies', {
      currency: state => state.currency,
      currencies: state => state.all_currencies
    }),
  },
  methods: {
    ...mapActions('currencies', [
      'setCurrency'
    ]),
    ...mapActions('i18n', [
      'setLocale'
    ]),
    openCart () {
      this.$emit('switchBigCart')
    },
    locale (locale) {
      this.setLocale({
        locale: locale,
        i18n: this.$i18n
      })
    }
  }
}

</script>

<style scoped>

</style>