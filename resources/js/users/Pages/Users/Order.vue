<template>
  <section id="create-order"
           class="container mb-5"
  >
    <div v-if="orderForm.items.length > 0" class="row">
      <div class="col-lg-6">

        <!-- ДАННЫЕ ПОЛЬЗОВАТЕЛЯ -->

        <div class="row gx-3 gy-3">
          <div class="col-12">
            <h2>Контактные данные</h2>
          </div>

          <div class="col-12">
            <material-field id="name"
                            v-model="orderForm.name"
                            :error="orderForm.errors.name"
                            :required="true"
                            name="name"
                            placeholder="Как вас зовут?"
                            type="text"
            />
          </div>

          <div class="col-12 col-md-6">
            <material-field id="phone"
                            v-model="orderForm.phone"
                            :error="orderForm.errors.phone"
                            :placeholder="phonePlaceholder"
                            :required="true"
                            name="phone"
                            type="phone"
            />
          </div>
          <div class="col-12 col-md-6">
            <material-field id="email"
                            v-model="orderForm.email"
                            :error="orderForm.errors.email"
                            :required="true"
                            name="email"
                            placeholder="Email"
                            type="email"
            />
          </div>
        </div>

        <!-- ДОСТАВКА - ВЫБОР ТИП ДОСТАВКИ-->

        <div class="row">
          <div class="col-12">
            <h2>доставка</h2>
          </div>

          <div class="col-12">
            <div class="form-check">
              <input id="delivery_to_home"
                     v-model="orderForm.type_delivery"
                     class="form-check-input"
                     disabled
                     name="delivery"
                     type="radio"
                     value="delivery"
              >
              <label class="form-check-label"
                     for="delivery_to_home"
              >
                Доставка до дома
              </label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input id="delivery_in_shop"
                     v-model="orderForm.type_delivery"
                     class="form-check-input"
                     name="delivery"
                     type="radio"
                     value="in_shop"
              >
              <label class="form-check-label"
                     for="delivery_in_shop"
              >
                Самовывоз из магазина
              </label>
            </div>
          </div>
        </div>

        <!-- ТИП ОПЛАТЫ - Выбрать в магазине оптала или онлайн эквайринг-->

        <div v-if="orderForm.type_delivery" class="row">
          <div class="col-12">
            <h2>Тип Оплаты</h2>
          </div>

          <div class="col-12">
            <div class="form-check">
              <input id="payment_method_online"
                     v-model="orderForm.payment_method"
                     class="form-check-input"
                     disabled
                     name="payment_method"
                     type="radio"
                     value="online"
              >
              <label class="form-check-label"
                     for="payment_method_online"
              >
                Оплатить онлайн
              </label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input id="payment_method_shop"
                     v-model="orderForm.payment_method"
                     class="form-check-input"
                     name="payment_method"
                     type="radio"
                     value="shop"
              >
              <label class="form-check-label"
                     for="payment_method_shop"
              >
                Оплата в магазине
              </label>
            </div>
          </div>
        </div>

        <!-- ДАННЫЕ ДЛЯ ДОСТАВКИ -->

        <div v-if="orderForm.type_delivery === 'delivery' && orderForm.payment_method"
             class="row gx-3 gy-3"
        >
          <div class="col-12">
            <h2>адрес доставки</h2>
          </div>

          <div class="col-12 col-md-6">
            <material-field id="city"
                            v-model="orderForm.country"
                            :error="orderForm.errors.country"
                            :required="true"
                            name="country"
                            placeholder="Страна"
                            type="text"
            />
          </div>

          <div class="col-12 col-md-6">
            <material-field id="city"
                            v-model="orderForm.city"
                            :error="orderForm.errors.city"
                            :required="true"
                            name="city"
                            placeholder="Город"
                            type="text"
            />
          </div>
          <div class="col-12">
            <material-field id="street"
                            v-model="orderForm.street"
                            :error="orderForm.errors.street"
                            :required="true"
                            name="street"
                            placeholder="Адрес"
                            type="text"
            />
          </div>
          <div class="col-12 col-md-6">
            <material-field id="post_index"
                            v-model="orderForm.post_index"
                            :error="orderForm.errors.post_index"
                            :required="true"
                            name="post_index"
                            placeholder="Индекс"
                            type="text"
            />
          </div>
        </div>

        <div v-if="orderForm.type_delivery === 'in_shop' && orderForm.payment_method"
             class="row gx-3 gy-3"
        >
          <div class="col-12">
            <h2>
              где забрать заказ
            </h2>
          </div>

          <div v-for="shop in shops"
               class="col-12"
          >
            <div :class="{'active': orderForm.shops_id === shop.id}"
                 class="shop"
                 @click="setShop(shop)"
            >
              <p class="fw-bold street"> {{ shop.translate[locale].street }}</p>
              <p> {{ shop.phone }}</p>
              <p class="time">
                {{ shop.translate[locale].time }}
              </p>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <button :disabled="disabledCreateOrderButton || orderForm.processing"
                    class="btn w-100 btn-dark py-3 fw-light rounded-0 text-uppercase"
                    @click="createOrder"
            >
              <span v-if="orderForm.processing"
                    aria-hidden="true"
                    class="spinner-grow spinner-grow-sm"
                    role="status"
              ></span>
              <span v-else-if="orderForm.payment_method === 'online'">Подтвердить и оплатить заказ</span>
              <span v-else>Подтвердить</span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-5 offset-lg-1">

      </div>
    </div>
    <div v-else class="row">
      <div class="col-12 text-center text-uppercase">
        <h2>
          Корзина пуста
        </h2>
      </div>
    </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import MaterialField from "../../Shared/material-field";
import bs5 from "../../plugins/bs5";
import {mapActions, mapMutations, mapState} from "vuex";
import product from "./Product";

export default {
  name: "Order",
  components: {MaterialField},
  layout: Layout,
  data: () => ({
    orderForm: useForm({
      name: null,
      phone: null,
      email: null,
      country: null,
      city: null,
      street: null,
      post_index: null,
      shops_id: null,
      type_delivery: null,
      payment_method: null,

      items: []
    })
  }),
  computed: {
    ...mapState('i18n', {
      locale: 'locale'
    }),
    ...mapState('cart', {
      products: 'products'
    }),
    user() {
      return this.$page.props.auth.user ?? false
    },
    shops() {
      return this.$page.props.shops ?? []
    },
    phonePlaceholder() {
      if (this.orderForm.phone === null || this.orderForm.phone === '') {
        return '+7 (___) ___-__-__';
      }

      return 'Телефон'
    },
    disabledCreateOrderButton() {
      let order = this.orderForm
      if (order.type_delivery === 'in_shop') {
        return !!(this.isEmpty(order.name) ||
          this.isEmpty(order.email) ||
          this.isEmpty(order.phone) ||
          this.isEmpty(order.payment_method) ||
          this.isEmpty(order.shops_id))
      } else if (order.type_delivery === 'delivery') {
        return true
      }
      return true
    },
  },
  mounted() {
    if (this.user) {
      this.setDefaultDataUser()
    }
  },
  watch: {
    'orderForm.type_delivery': function (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.orderForm.shops_id = null
      }
    },
    products: function (newVal) {
      this.orderForm.items = newVal
    }
  },
  methods: {
    ...mapMutations('cart', {
      clearCart: 'clear'
    }),
    setDefaultDataUser() {
      this.orderForm.defaults({
        name: this.user.name,
        phone: this.user.phone,
        email: this.user.email,
        country: this.user.country,
        city: this.user.city,
        street: this.user.street,
        post_index: this.user.post_index,

        items: this.products
      })
      this.orderForm.reset()
    },
    setShop(shop) {
      this.orderForm.shops_id = shop.id
    },
    isEmpty(str) {
      return (!str || str.length === 0);
    },
    createOrder() {
      this.orderForm.post('/order/create', {
        preserveState: true,
        preserveScroll: true,
        onStart: () => {
          new bs5.Toast({
            body: 'Ваш заказ создаётся, пожалуйста ожидайте',
            className: 'border-0 bg-warning text-dark',
            btnCloseWhite: false,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          if (this.orderForm.errors.items) {
            if (this.orderForm.errors.items === 'max-value') {
              new bs5.Toast({
                body: 'В корзине имеется товар превышаюший кол-во в наличие',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
                autohide: true,
                delay: 3000
              }).show()
            } else {
              new bs5.Toast({
                body: 'В Вашем заказе нет товаров, или их колличество миньше нуля ',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
                autohide: true,
                delay: 3000
              }).show()
            }
          }
        },
        onSuccess: () => {
          this.clearCart();
        }
      })
    }
  }
}
</script>

<style scoped>

</style>