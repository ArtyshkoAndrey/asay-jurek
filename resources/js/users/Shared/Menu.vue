<template>
  <nav class="navbar navbar-expand navbar-light bg-transparent">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavPrimary">
        <ul class="navbar-nav text-uppercase w-100">
          <li class="nav-item ps-3 d-flex d-md-none">
            <button class="nav-link btn bg-transparent p-0" @click="openLeftMenu">
              <i class="fa-regular fa-bars"></i>
            </button>
          </li>

          <li class="nav-item dropdown d-none d-md-flex">
            <a class="nav-link dropdown-toggle dropdown-toggle-has-arrow left-border py-0" href="#" id="currencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ currency.short_name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
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

          <li class="nav-item dropdown me-auto d-none d-md-flex">
            <a class="nav-link dropdown-toggle dropdown-toggle-has-arrow py-0" href="#" id="localeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $i18n.locale === "ru" ? "РУС" : "ENG" }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="localeDropdown">
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
            <Link class="d-block" href="/">
              <img src="/public/img/menu-logo.png" class="img-fluid logo" alt="Asay Jurek Logo">
            </Link>
          </li>

          <li class="nav-item dropdown ms-auto pe-3 left-border d-none d-md-flex" @click="logUser">
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

              <li class="" v-if="user !== null" >
                <Link href="/profile"
                      :class="{ 'active': $page.url.startsWith('/profile')}"
                      class="dropdown-item">
                  {{ $t('dropdown-user.profile') }}
                </Link>
              </li>
              <li class="" v-if="user !== null" >
                <Link href="/" class="dropdown-item">{{ $t('dropdown-user.order') }}</Link>
              </li>
              <li class="" v-if="user !== null" >
                <Link href="/logout" method="post" @click="tooltipLogout" as="button" class="dropdown-item">{{ $t('dropdown-user.logout') }}</Link>
              </li>

              <li class="" v-if="user === null">
                <Link href="/login"
                      :class="{ 'active': $page.url.startsWith('/login')}"
                      class="dropdown-item">
                  {{ $t('dropdown-user.login') }}
                </Link>
              </li>
              <li class="" v-if="user === null">
                <Link href="/register"
                      :class="{ 'active': $page.url.startsWith('/register')}"
                      class="dropdown-item">
                  {{ $t('dropdown-user.register') }}
                </Link>
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

    <LeftMenu ref="LeftMenu" />
  </nav>
</template>

<script>
import {mapState, mapActions} from "vuex";
import LeftMenu from "./LeftMenu";
import bs5 from "../plugins/bs5";
export default {
  name: "Menu",
  components: {LeftMenu},
  emits: ['switchBigCart'],
  computed: {
    ...mapState('currencies', {
      currency: state => state.currency,
      currencies: state => state.all_currencies
    }),
    user () {
      return this.$page.props.auth.user
    },
  },
  methods: {
    logUser () {
    },
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
    },
    openLeftMenu () {
      this.$refs['LeftMenu'].switchStatusOpened()
    },
    tooltipLogout () {
      setTimeout(() => {
        new bs5.Toast({
          body: this.$t('tooltips.logout'),
          className: 'border-0 bg-dark text-white',
          btnCloseWhite: true,
          autohide: true,
          delay: 5000
        }).show()
      })
    }
  }
}

</script>

<style scoped>

</style>