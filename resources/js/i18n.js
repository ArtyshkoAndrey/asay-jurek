import { createI18n } from 'vue-i18n'

import ru from './locales/ru.json';
import en from './locales/en.json';

export const SUPPORT_LOCALES = ['ru', 'en']

export function setupI18n() {

  let messages = {
    ru: ru,
    en: en
  }
  messages = Object.assign(messages)

  let locale = localStorage.getItem('locale') ? localStorage.getItem('locale'): 'ru'
  let options = {
    locale: locale,
    fallbackLocale: 'en',
    globalInjection: true,
    messages
  }
  localStorage.setItem('locale', locale)
  const i18n = createI18n(options)
  setI18nLanguage(i18n, options.locale)
  return i18n
}

export function setI18nLanguage(i18n, locale) {
  i18n.locale = locale
  /**
   * NOTE:
   * If you need to specify the language setting for headers, such as the `fetch` API, set it here.
   * The following is an example for axios.
   *
   * axios.defaults.headers.common['Accept-Language'] = locale
   */
  axios.defaults.headers.common['Accept-Language'] = locale
  document.querySelector('html').setAttribute('lang', locale)
}