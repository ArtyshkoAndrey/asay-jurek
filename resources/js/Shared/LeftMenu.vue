<template>
  <transition :duration="500" name="nested">
    <div v-show="opened" id="left-menu">
      <nav class="navbar navbar-expand navbar-light bg-transparent">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarNavPrimary">
            <ul class="navbar-nav text-uppercase justify-content-between w-100">
              <li class="nav-item ps-3">
                <button class="nav-link btn bg-transparent p-0" @click="opened = !opened">
                  <i class="fa-regular fa-xmark"></i>
                </button>
              </li>
              <li class="nav-item dropdown ms-3">
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
              <li class="nav-item dropdown me-auto ms-1">
                <a class="nav-link dropdown-toggle dropdown-toggle-has-arrow py-0" href="#" id="localeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ $i18n.locale === "ru" ? "РУС" : "ENG" }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="localeDropdown">
                  <li>
                    <a class="dropdown-item"
                       :class="$i18n.locale === 'ru' ? 'active' : ''"
                       href="#"
                       @click="setComponentLocale('ru')"
                    >
                      {{ $t('locales.ru.title') }}
                      <span class="name-currency">{{ $t('locales.ru.description') }}</span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item"
                       :class="$i18n.locale === 'en' ? 'active' : ''"
                       href="#"
                       @click="setComponentLocale('en')"
                    >
                      {{ $t('locales.en.title') }}
                      <span class="name-currency">{{ $t('locales.en.description') }}</span>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown ms-auto pe-3">
                <a href="#"
                   class="nav-link btn bg-transparent dropdown-toggle p-0"
                   id="userDropdown"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false"
                >
                  <i class="far fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" @click="opened = !opened" aria-labelledby="userDropdown">

                  <li class="" v-if="user !== null" >
                    <Link href="/" class="dropdown-item">{{ $t('dropdown-user.profile') }}</Link>
                  </li>
                  <li class="" v-if="user !== null" >
                    <Link href="/" class="dropdown-item">{{ $t('dropdown-user.order') }}</Link>
                  </li>
                  <li class="" v-if="user !== null" >
                    <Link href="/logout" method="post" as="button" class="dropdown-item">{{ $t('dropdown-user.logout') }}</Link>
                  </li>

                  <li class="" v-if="user === null">
                    <Link href="/login" class="dropdown-item">{{ $t('dropdown-user.login') }}</Link>
                  </li>
                  <li class="" v-if="user === null">
                    <Link href="/register" class="dropdown-item">{{ $t('dropdown-user.register') }}</Link>
                  </li>
                </ul>
              </li>
              <li class="nav-item pe-3">
                <button class="nav-link btn bg-transparent p-0" @click="openCart">
                  <i class="far fa-shopping-bag"></i>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container left-links-wrapper">
        <div class="row">
         <div class="col-12">
           <ul class="navbar-nav navbar-expand-xxl nav" id="left-links">
             <li class="nav-item dropdown"
                 v-for="category in categories"
                 :key="category.id"
             >
<!--               Если есть дочерние то выпадающие -->
               <Link :href="/catalog/ + category.id"
                  class="nav-link dropdown-toggle"
                  :id="'category' + category.id + 'Dropdown'"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  v-if="category.childs.length > 0"
               >
                 {{ category.translate[locale].name }}
               </Link>
<!--               ЕСли нет дочерних то ссылка -->
               <Link :href="/catalog/ + category.id"
                     class="nav-link"
                     v-if="category.childs.length === 0"
                     @click="opened = !opened"
               >
                 {{ category.translate[locale].name }}
               </Link>
               <ul class="dropdown-menu"
                   :aria-labelledby="'category' + category.id + 'Dropdown'"
                   v-if="category.childs.length > 0"
               >
                 <li class="dropdown-item" v-for="child in category.childs">
                   <Link :href="/catalog/ + child.id" @click="opened = !opened">{{ child.translate[locale].name }}</Link>
                 </li>
               </ul>
             </li>
           </ul>
         </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
  name: "LeftMenu",
  data: () => ({
    opened: false,
    smallWidth: false,
  }),
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    ...mapState('currencies', {
      currency: state => state.currency,
      currencies: state => state.all_currencies
    }),
    user () {
      return this.$page.props.auth.user
    },
    categories () {
      return this.$page.props.menu.categories
    }
  },
  mounted() {
    if ($(document).width() <= 768) {
      this.smallWidth = true
    }
  },
  methods: {
    ...mapActions('i18n', [
      'setLocale'
    ]),
    ...mapActions('currencies', [
      'setCurrency'
    ]),
    switchStatusOpened () {
      if ($(document).width() <= 768) {
        this.smallWidth = true
        this.opened = !this.opened
      }
    },
    setComponentLocale (locale) {
      this.setLocale({
        locale: locale,
        i18n: this.$i18n
      })
    },
    openCart () {
      this.$parent.openCart()
    }
  },
  watch: {
    opened: (newVal) => {
      if (newVal) {
        $('body').css('overflow', 'hidden')
      } else {
        $('body').css('overflow', 'auto')
      }
    }
  }
}
</script>

<style scoped>

.nested-enter-active, .nested-leave-active {
  transition: all 0.5s ease-in-out;
}

/* delay leave of parent element */
.nested-leave-active {
  transition-delay: .1s;
}

.nested-enter-from,
.nested-leave-to {
  transform: translateX(-500px);
  opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
  transition: all 1s ease-in-out;
}

/* delay enter of nested element */
.nested-enter-active .inner {
  transition-delay: 10s;
}

.nested-enter-from .inner,
.nested-leave-to .inner {
  transform: translateX(100px);
  /*
  	Hack around a Chrome 96 bug in handling nested opacity transitions.
    This is not needed in other browsers or Chrome 99+ where the bug
    has been fixed.
  */
  opacity: 0.001;
}

</style>