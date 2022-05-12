<template>
  <footer class="footer mt-auto py-5 bg-light">
    <div class="container">
      <div class="row gy-2 justify-content-center">
        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/receiving"
          >
            ПРИЕМ ВЕЩЕЙ
          </Link>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/about"
          >
            О НАС
          </Link>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <a
            href="https://www.instagram.com/asayjurek/"
            target="_blank"
          >
            INSTAGRAM
          </a>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/"
          >
            КОНТАКТЫ
          </Link>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/"
          >
            ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ
          </Link>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/"
          >
            ДОСТАВКА И ОПЛАТА
          </Link>
        </div>

        <div class="col-12 col-md-auto text-center text-md-start">
          <Link
            href="/"
          >
            ДОГОВОР ОФЕРТЫ
          </Link>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-6 d-none d-md-block col-md-3 col-lg-2">
          <Link
            class="d-block"
            href="/"
          >
            <img
              alt="Asay Jurek Logo"
              class="img-fluid logo"
              src="/public/img/menu-logo.png"
            >
          </Link>
        </div>

        <div class="col-12 d-block d-md-none">
          <p class="text-center">
            <strong>
              ул. Уалиханова, 43. 2 этаж
            </strong>
            <br>
            +7 (771) 466-14-65
            <br>
            <span style="color: #6F797C;">
              пн-пт 12:00 - 20:30
              сб-вс 10:00 - 18:30
            </span>
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer"
}
</script>

<style
  lang="scss"
  scoped
>
.footer {
  background: #fff !important;

  a {
    text-transform: uppercase;
    font-style: normal;
    font-weight: 300;
    font-size: 16px;
    line-height: 20px;
    text-decoration: none;
    /* identical to box height */


    /* Black */

    color: #232629;
  }
}
</style>