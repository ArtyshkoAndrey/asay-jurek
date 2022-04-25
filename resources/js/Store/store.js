import { createStore } from 'vuex'
import VuexPersistence from 'vuex-persist'
import currencies from "./Modules/currencies";
import i18n from "./Modules/i18n";
import cart from './Modules/cart'

const vuexLocal = new VuexPersistence({
  storage: window.localStorage
})

const store = createStore({
  modules: {
    currencies,
    i18n,
    cart
  },
  plugins: [vuexLocal.plugin]
})

export default store