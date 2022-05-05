<template>
  <Head>
    <title>Административная панель сайта</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Главная</h1>
  </div>

  <div class="row gy-3 gy-lg-0 mb-5">
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <div class="toast text-white bg-primary w-100 show">
        <div class="toast-header">
          <strong class="me-auto">Новые заказы</strong>
          <Link href="/admin"><small>Продробнее</small></Link>
        </div>
        <div class="toast-body">
          <span class="fs-6">{{
              countOrdersPrepare
                             }} {{
              num_word(countOrdersPrepare, ['заказ', 'заказа', 'заказов'])
                             }} на <span class="fw-bold">Подверждении</span></span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <div class="toast text-white bg-primary w-100 show">
        <div class="toast-header">
          <strong class="me-auto">На сегодня</strong>
          <Link href="/admin"><small>Продробнее</small></Link>
        </div>
        <div class="toast-body">
          <span class="fs-6">Пользователи сайта создали
            <span class="fw-bold">
            {{ countOrdersToDay }}
          </span>
            {{ num_word(countOrdersToDay, ['заказ', 'заказа', 'заказов']) }}
          </span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <div class="toast  bg-warning w-100 show">
        <div class="toast-header">
          <strong class="me-auto">Товары</strong>
          <Link href="/admin"><small>Продробнее</small></Link>
        </div>
        <div class="toast-body">
          <span class="fs-6">
            У вас закончились
            <span class="fw-bold">
              {{ countZeroCountProducts }}
            </span>
            {{ num_word(countOrdersToDay, ['товар', 'товара', 'товаров']) }}
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <h5>Продажи в течении года</h5>
    </div>
    <div class="col-12">
      <Line
        :chart-data="dataCheckouts"
        :chart-options="orderCheckoutChartOptions"
        :css-classes="['orderCheckout']"
        chart-id="orderCheckout"
      />
    </div>
  </div>

</template>

<script>
import Layout from "../../Shared/Layout";
import {Line} from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  PointElement,
  CategoryScale,
  Plugin
} from 'chart.js'

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  PointElement,
  CategoryScale
)
export default {
  name: "Index",
  layout: Layout,
  components: {
    Line
  },
  data: () => ({}),
  computed: {
    orderCheckouts() {
      return this.$page.props.orderCheckouts
    },
    dataCheckouts() {
      return {
        labels: this.orderCheckouts.month,
        datasets: [
          {
            label: 'Кол-во заказов за год',
            backgroundColor: '#007bff',
            data: this.orderCheckouts.count,
            fill: false,
            borderColor: '#007bff',
            tension: 0.2,
            pointRadius: 1.5,
            borderWidth: 2,
          }
        ]
      }
    },
    orderCheckoutChartOptions() {
      return {
        responsive: true,
        maintainAspectRatio: false
      }
    },

    countOrdersPrepare() {
      return this.$page.props.countOrdersPrepare
    },
    countOrdersToDay() {
      return this.$page.props.countOrdersToDay
    },
    countZeroCountProducts() {
      return this.$page.props.countZeroCountProducts
    }

  },
  methods: {
    num_word(value, words) {
      value = Math.abs(value) % 100;
      let num = value % 10;
      if (value > 10 && value < 20) return words[2];
      if (num > 1 && num < 5) return words[1];
      if (num === 1) return words[0];
      return words[2];
    }
  }
}
</script>

<style scoped>

</style>