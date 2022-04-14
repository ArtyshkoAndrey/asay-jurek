<template>
  <Head>
    <meta
      type="description"
      content="Information about my app"
      head-key="description"
    >
  </Head>

  <big-cart
    ref="big-cart"
    @switchedOpened="eventSwitchedOpenedBigCart"
  />

  <div id="page" :class="openedBigCart ? 'opened' : ''">
    <Menu
      @switchBigCart="callSwitchStatusBigCart"
    />


    <div class="mt-3">
      <slot/>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Menu from "./Menu";
import BigCart from "./BigCart";
export default {
  name: "Layout",
  components: {
    Menu,
    BigCart
  },
  data: () => ({
    openedBigCart: false
  }),
  computed: mapState([
    // map this.count to store.state.count
    'currencies'
  ]),
  methods: {
    ...mapActions({
      initialCurrencies: 'currencies/initial'
    }),

    callSwitchStatusBigCart () {
      this.$refs["big-cart"].switchOpened()
    },
    eventSwitchedOpenedBigCart (value) {
      this.openedBigCart = value
      let page = $('#page')
      if (value) {
        setTimeout(() => {
          console.log(page)
          $('#page').click(() => {
            if (this.openedBigCart) {
              this.callSwitchStatusBigCart()
            }
          })
        }, 100)
      } else {
        page.unbind('click')
      }
    }
  },
  created() {
  },
  beforeMount () {
    let bool = this.currencies.last_update !== null

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
  }
}
</script>

<style scoped>

</style>