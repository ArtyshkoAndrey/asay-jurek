<template>
  <section id="create-order"
           class="container mb-5"
  >
    <div class="row">
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
                     class="form-check-input"
                     disabled
                     name="delivery"
                     type="radio"
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
                     checked
                     class="form-check-input"
                     name="delivery"
                     type="radio"
              >
              <label class="form-check-label"
                     for="delivery_in_shop"
              >
                Самовывоз из магазина
              </label>
            </div>
          </div>
        </div>

        <!-- ДАННЫЕ ДЛЯ ДОСТАВКИ -->

        <div class="row gx-3 gy-3">
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
      </div>

      <div class="col-lg-5 offset-lg-1">

      </div>
    </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import MaterialField from "../../Shared/material-field";

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
      post_index: null
    })
  }),
  computed: {
    user() {
      return this.$page.props.auth.user ?? false
    },
    phonePlaceholder() {
      if (this.orderForm.phone === null || this.orderForm.phone === '') {
        return '+7 (___) ___-__-__';
      }

      return 'Телефон'
    }
  },
  mounted() {
    if (this.user) {
      this.setDefaultDataUser()
    }
  },
  methods: {
    setDefaultDataUser() {
      this.orderForm.defaults({
        name: this.user.name,
        phone: this.user.phone,
        email: this.user.email,
        country:  this.user.country,
        city:  this.user.city,
        street:  this.user.street,
        post_index:  this.user.post_index
      })
      this.orderForm.reset()
    }
  }
}
</script>

<style scoped>

</style>