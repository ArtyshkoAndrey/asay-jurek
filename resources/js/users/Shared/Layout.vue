<template>
  <Head>
    <title>{{ seo.title }}</title>
    <meta
      type="description"
      content="{{ seo.description}}"
      head-key="description"
    >
  </Head>

  <big-cart
    ref="big-cart"
    @switchedOpened="eventSwitchedOpenedBigCart"
  />

  <div id="page" :class="openedBigCart ? 'opened' : ''">

    <div class="darken-for-opened-cart" />

    <Menu
      @switchBigCart="callSwitchStatusBigCart"
    />

    <SubMenu
      @switchBigCart="callSwitchStatusBigCart"
    />


    <div class="mt-3">
      <slot/>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import SubMenu from "./SubMenu";
import Menu from './Menu';
import BigCart from "./BigCart";
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import NProgress from "nprogress";

export default {
  name: "Layout",
  components: {
    Menu,
    SubMenu,
    BigCart
  },
  data: () => ({
    openedBigCart: false
  }),
  computed: mapState([
    // map this.count to store.state.count
    'currencies'
  ]),
  setup() {
    const seo = computed(() => usePage().props.value.seo)
    return { seo }
  },
  methods: {
    ...mapActions('currencies', {
      initialCurrencies: 'initial'
    }),
    ...mapActions('cart', {
      initialCart: 'initialCart'
    }),

    callSwitchStatusBigCart () {
      this.$refs["big-cart"].switchOpened()
    },
    eventSwitchedOpenedBigCart (value) {
      this.openedBigCart = value
      let page = $('.darken-for-opened-cart')
      if (value) {
        $('body').css('overflow', 'hidden');
        setTimeout(() => {
          page.click(() => {
            if (this.openedBigCart) {
              this.callSwitchStatusBigCart()
            }
          })
        }, 100)
      } else {
        if ($("#left-menu").css('display') !== 'block') {
          $('body').css('overflow', 'auto');
          page.unbind('click')

        }
      }
    }
  },
  created() {
    this.$inertia.reload({
      only: ['tableData']
    } )
    this.$nextTick(() => {
      document.querySelector('.darken-for-opened-cart').addEventListener('animationstart', function (e) {
        if (e.animationName === 'fade-in') {
          e.target.classList.add('did-fade-in');
        }
      });

      document.querySelector('.darken-for-opened-cart').addEventListener('animationend', function (e) {
        if (e.animationName === 'fade-out') {
          e.target.classList.remove('did-fade-in');
        }
      });
    })
  },
  beforeMount () {

    let bool = this.currencies.last_update !== null
    this.initialCart({
      user: this.$page.props.auth.user,
      tooltip: false
    })
    if (!bool) {
      this.initialCurrencies()
    } else {
      let last_update = new Date(this.currencies.last_update)

      let diff = new Date().getTime() - last_update.getTime()
      let hours = diff / 60 / 60 / 1000;
      // Обновляем валюту раз в час
      if (Math.floor(hours) > 1) {
        this.initialCurrencies()
      }
    }
    NProgress.done()
  }
}
</script>

<style scoped>

</style>