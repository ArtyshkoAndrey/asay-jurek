<template>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-3 col-12">
        <h1 class="title">Как сдать вещи <br> нам в магазин</h1>
      </div>
      <div class="col-lg-5">
        <p class="description">
          Мы принимаем новую и бывшую в употреблении качественную одежду и
          аксессуары в хорошем состоянии,
          <br> не требующую ремонта и отвечающую санитарным нормам.
        </p>
      </div>
    </div>

    <div class="row gy-5 mt-5">
      <div class="col-12">
        <div class="row align-items-end">
          <div class="col-auto">
            <span class="number">01</span>
          </div>
          <div class="col">
            <h2 class="title-card">вышлите нам фотографии</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 info-wrapper">
            <div class="row  gx-3">
              <div class="col-lg-5 col-md-8">
                <p class="info">Сфотографируйте ваши вещи и отправьте нам на
                                Whats app или в Instagram</p>
              </div>
              <div class="col-12">
                <div class="row gy-2">
                  <div class="col-12 col-md-auto">
                    <a
                      class="btn btn-dark rounded-0 fw-light d-block w-100"
                      href="https://api.whatsapp.com/send?phone=77714661465&text=%D0%97%D0%B4%D1%80%D0%B0%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D0%BF%D0%BE%20%D0%BF%D0%BE%D0%B2%D1%80%D0%BE%D0%B4%D1%83%20%D0%BF%D1%80%D0%B8%D1%91%D0%BC%D0%B0%20%D0%B2%D0%B5%D1%89%D0%B5%D0%B9"
                      target="_blank"
                    >
                      Написать Whatsapp
                    </a>
                  </div>

                  <div class="col-12 col-md-auto">
                    <a
                      class="btn btn-dark rounded-0 fw-light d-block w-100"
                      href="https://www.instagram.com/asayjurek/"
                      target="_blank"
                    >
                      Написать в Instagram
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row align-items-end">
          <div class="col-auto">
            <span class="number">02</span>
          </div>
          <div class="col">
            <h2 class="title-card">Приём вещей</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 info-wrapper">
            <div class="row  gx-3">
              <div class="col-lg-5 col-md-8">
                <p class="info">После отбора фотографий, вам нужно приехать в
                                наш магазин, подписать договор и сдать вещи. При
                                себе обязательно иметь удостоверение личности
                                или паспорт.</p>
              </div>
              <div class="col-12">
                <div class="row gy-2">
                  <div class="col-12 col-md-auto">
                    <button class="btn btn-dark rounded-0 fw-light d-block w-100">
                      Скачать договор
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row align-items-end">
          <div class="col-auto">
            <span class="number">03</span>
          </div>
          <div class="col">
            <h2 class="title-card">Оценка стоимости</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 info-wrapper">
            <div class="row  gx-3">
              <div class="col-lg-5 col-md-8">
                <p class="info">
                  Наши специалисты-товароведы помогут назначить наиболее
                  подходящую стоимость вещи, учитывя все факторы. Цена
                  реализации товара включает стоимость товара с учётом
                  комиссионного вознаграждения(от 30% - 50%)
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row align-items-end">
          <div class="col-auto">
            <span class="number">04</span>
          </div>
          <div class="col">
            <h2 class="title-card">Реализация и оплата</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 info-wrapper">
            <div class="row  gx-3">
              <div class="col-lg-5 col-md-8">
                <p class="info">
                  Мы выплачиваем вам деньги после реализации товара. Для
                  получения своих денег, вам также необходимо иметь при себе
                  удостоверение личности или пасспорт
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
  name: "Receiving",
  layout: Layout
}
</script>

<style
  lang="scss"
  scoped
>
.title {
  font-weight: 400;
  font-size: 24px;
  line-height: 131.5%;
  /* or 32px */

  text-transform: uppercase;

  /* Black */

  color: #232629;
}

.description {
  font-weight: 400;
  font-size: 18px;
  line-height: 131.5%;
  /* or 24px */


  /* secondary text */

  color: #6F797C;
}

.number {
  font-size: 24px;
  line-height: 131.5%;
  margin-bottom: 5px;
  /* identical to box height, or 32px */

  text-transform: uppercase;

  /* Black */

  color: #232629;
}

.title-card {
  text-align: right;
  border-bottom: 1px solid #232629;
  font-weight: 400;
  font-size: 24px;
  line-height: 131.5%;
  /* identical to box height, or 32px */

  text-transform: uppercase;

  /* Black */

  color: #232629;
}

.info {
  font-weight: 400;
  font-size: 18px;
  line-height: 131.5%;
  /* or 24px */


  /* secondary text */

  color: #6F797C;
}

.info-wrapper {
  padding-left: 60px;
}
</style>