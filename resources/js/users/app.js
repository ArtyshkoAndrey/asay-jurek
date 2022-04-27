
import NProgress from 'nprogress'

require('../bootstrap');
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { Inertia } from '@inertiajs/inertia'

import {setupI18n} from "../i18n";
import store from '../Store/store';
const Layout = import("./Shared/Layout");
import ImageItem from "../components/ImageItem";
import LazyLoadDirective from "../Directives/LazyLoadDirective";


createInertiaApp({
  resolve: name => {
    let page = import(`./Pages/${name}`)
    page.layout = page.layout || Layout

    return page;
  },
  setup({el, App, props, plugin}) {
    NProgress.start()
    const i18n = setupI18n();
    createApp({render: () => h(App, props)})
      .use(plugin)
      .use(store)
      .use(i18n)
      .component("Link", Link)
      .component("Head", Head)
      .component('ImageItem', ImageItem)
      .directive("lazyload", LazyLoadDirective)
      .mount(el)
  },

}).then(r => {

})

InertiaProgress.init({
  delay: 10,
  color: '#89171A',
  includeCSS: true,
  showSpinner: true,
});

Inertia.on('start', () => NProgress.start())
Inertia.on('finish', () => NProgress.done())
