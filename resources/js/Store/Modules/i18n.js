import { setI18nLanguage } from "../../i18n";

const currencies = {
  namespaced: true,
  state: () => ({
    locale: 'ru',
    locales: ['ru', 'en']
  }),

  mutations: {
    setLocale (state, payload) {
      setI18nLanguage(payload.i18n, payload.locale)
      state.locale = payload.locale
      localStorage.setItem('locale', payload.locale)
    },
    startSite (state, payload) {
      setI18nLanguage(payload.i18n, localStorage.getItem('locale') ? localStorage.getItem('locale') : state.locale )
    }
  },

  actions: {

    // Запрос на выбор другой валюты
    setLocale ({commit}, payload) {
      commit('setLocale', payload);
    }
  }
}

export default currencies