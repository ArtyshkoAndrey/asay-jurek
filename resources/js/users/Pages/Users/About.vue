<template>
  <div class="container">
    <div class="row mt-5 pt-5">
      <div class="col-lg-2 d-lg-block d-none">
        <img
          alt="Rectangle 13.png"
          class="w-100 h-auto first-image"
          src="/public/img/Rectangle 13.png"
        >
      </div>
      <div class="col-lg-8">
        <h1>
          <span class="first">Asaý Júrek – подходящее</span>
          <br>
          <span class="second">место для знакомства</span>
          <br>
          <span class="third">c миром винтажа </span>
          <br>
          <span class="fourth">
            и качественного ресейла.
          </span>
        </h1>

        <div class="row mt-5">
          <div class="col-lg-6 offset-lg-1">
            <p>
              В большом и красивом магазине с равным успехом найдутся и романтичные
              безымянные сарафаны, и шерстяные жакеты Givenchy, и тренчи всех
              мастей, и свитеры из мягкой ангоры и кашемира.
            </p>

            <p>
              Но Asaý Júrek это не только винтаж, но и комиссионка: здесь есть вещи
              Saint Laurent или Bottega Veneta из недавних коллекций и иногда прямо
              с этикетками.
            </p>

            <p>
              Кроме одежды, отличной подборки сумок, украшений (особого внимания
              стоят массивные клипсы) и обуви, здесь есть корнер с детской одеждой,
              а также большой отдел с винтажными предметами интерьера.
            </p>
          </div>
          <div class="col-lg-3 d-lg-block d-none">
          </div>

          <div class="col-lg-3 offset-lg-7 d-lg-block d-none">
            <img
              alt="Rectangle 13.png"
              class="w-100 h-auto third-image"
              src="/public/img/Rectangle 13.png"
            >
          </div>
        </div>
      </div>
      <div class="col-lg-2 d-lg-block d-none">
        <img
          alt="Rectangle 13.png"
          class="w-100 h-auto second-image"
          src="/public/img/Rectangle 13.png"
        >
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
  name: "About",
  layout: Layout
}
</script>

<style
  lang="scss"
  scoped
>

h1 {
  font-weight: 400;
  font-size: 48px;
  line-height: 131.5%;
  /* or 63px */

  text-transform: uppercase;

  /* Black */

  color: #232629;

  .second {
    margin-left: 100px;
  }

  .third {
    margin-left: 50px;
  }

  .fourth {
    margin-left: 70px;
  }
}

.first-image {
  margin-top: 150px;
}

.second-image {
  margin-top: -50px;
}

.third-image {
  margin-top: -140px;
}

@media screen and (max-width: 991px) {
  h1 {
    font-size: 32px;

    .second {
      margin-left: 0;
    }

    .third {
      margin-left: 0;
    }

    .fourth {
      margin-left: 0;
    }
  }
}
p {
  font-weight: 400;
  font-size: 18px;
  line-height: 131.5%;
  /* or 24px */


  /* Black */

  color: #232629;

}

</style>