import { createStore } from 'vuex'
import VuexPersistence from 'vuex-persist'
import currencies from "./Modules/currencies";

const vuexLocal = new VuexPersistence({
  storage: window.localStorage
})

const store = createStore({
  modules: {
    currencies
  },
  plugins: [vuexLocal.plugin]
})

export default store