<template>
  <Head>
    <title></title>
    <meta
      content=""
      head-key="description"
      type="description"
    >
  </Head>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow">
    <button
      aria-controls="sidebarMenu"
      aria-expanded="false"
      aria-label="Toggle navigation"
      class="navbar-toggler d-md-none collapsed"
      data-bs-target="#sidebarMenu"
      data-bs-toggle="collapse"
      type="button"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <a
      class="navbar-brand col-md-3 col-lg-2 me-0 px-3"
      href="/"
    >
      Asay Jurek
    </a>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <Link
          as="button"
          class="nav-link bg-transparent border-0 px-3"
          href="/logout?is_admin=1"
          method="post"
        >
          Выйти
        </link>
      </div>
    </div>
  </header>

  <div id="page">
    <div class="container-fluid">
      <div class="row">
        <nav
          id="sidebarMenu"
          class="col-md-3 col-lg-2 ps-2 d-md-block bg-light sidebar collapse"
        >
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <Link
                  :class="{'active': $page.url === '/admin'}"
                  aria-current="page"
                  class="nav-link"
                  href="/admin"
                >
                  <i class="fa-regular fa-chart-line pe-3"></i>
                  Главная
                </Link>
              </li>
              <li class="nav-item">
                <Link
                  :class="{'active': $page.url.startsWith('/admin/orders')}"
                  aria-current="page"
                  class="nav-link"
                  href="/admin/orders"
                >
                  <i class="fa-regular fa-money-check-pen pe-3"></i>
                  Заказы
                </Link>
              </li>
              <li class="nav-item">
                <Link
                  :class="{'active': $page.url === '/admin/products'}"
                  aria-current="page"
                  class="nav-link"
                  href="/admin"
                >
                  <i class="fa-regular fa-bags-shopping pe-3"></i>
                  Товары
                </Link>
              </li>
              <li class="nav-item">
                <Link
                  :class="{'active': $page.url === '/admin/users'}"
                  aria-current="page"
                  class="nav-link"
                  href="/admin"
                >
                  <i class="fa-regular fa-users pe-3"></i>
                  Пользователи
                </Link>
              </li>

            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Быстрый достеп</span>
              <a
                aria-label="Add a new report"
                class="link-secondary"
                href="#"
              >
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <Link
                  class="nav-link"
                  href="/admin/product/create"
                >
                  <i class="fa-regular fa-cart-plus pe-3"></i>
                  Создать товар
                </Link>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import NProgress from "nprogress";
import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Layout",
  components: {},
  data: () => ({}),
  methods: {},
  created() {

  },
  beforeMount() {
    NProgress.done()
  }
}
</script>

<style scoped>

</style>