require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import store from './Store/store';

const Layout = import("./Shared/Layout");

createInertiaApp({
  resolve: name => {
    let page = import(`./Pages/${name}`)
    page.layout = page.layout || Layout

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .use(store)
      .mount(el)
  },

})
InertiaProgress.init({
  delay: 10,
  color: "red",
  showSpinner: true,
});