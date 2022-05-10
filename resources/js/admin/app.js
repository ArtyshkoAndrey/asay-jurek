import NProgress from 'nprogress'
import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'
import {Inertia} from '@inertiajs/inertia'
import ImageItem from "../components/ImageItem";
import ImageSpinner from "../components/ImageSpinner";

import LazyLoadDirective from "../Directives/LazyLoadDirective";

require('../bootstrap');

const Layout = import("./Shared/Layout");

createInertiaApp({
  resolve: name => {
    let page = import(`./Pages/${name}`)
    page.layout = page.layout || Layout

    return page;
  },
  setup({el, App, props, plugin}) {
    NProgress.start()
    createApp({render: () => h(App, props)})
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .directive("lazyload", LazyLoadDirective)
      .component('ImageItem', ImageItem)
      .component('ImageSpinner', ImageSpinner)
      .mount(el)

  },

}).then(r => {

})

InertiaProgress.init({
  delay: 100,
  color: '#1942ff',
  includeCSS: true,
  showSpinner: true,
});

Inertia.on('start', () => NProgress.start())
Inertia.on('finish', () => NProgress.done())

