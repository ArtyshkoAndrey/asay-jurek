<template>
  <section class="container">
    <div class="row">
      <div class="col-lg-6">

        <!-- ДАННЫЕ ПОЛЬЗОВАТЕЛЯ -->

        <div class="row gx-2 gy-3">
          <div class="col-12">
            <h2>Контактные данные</h2>
          </div>

          <div class="col-12">
            <input v-model="orderForm.name"
                   class="form-control"
                   name="name"
                   placeholder="Как вас зовут"
                   type="text"
            >
          </div>

          <div class="col-12 col-md-6">
            <input v-model="orderForm.phone"
                   class="form-control"
                   name="name"
                   placeholder="+7 (___) ___-__-__"
                   type="text"
            >
          </div>
          <div class="col-12 col-md-6">
            <input v-model="orderForm.email"
                   class="form-control"
                   name="name"
                   placeholder="E-mail"
                   type="text"
            >
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

        <div class="row gx-2 gy-3">
          <div class="col-12">
            <h2>адрес доставки</h2>
          </div>

          <div class="col-12">
            <input v-model="orderForm.name"
                   class="form-control"
                   name="name"
                   placeholder="Как вас зовут"
                   type="text"
            >
          </div>

          <div class="col-12 col-md-6">
            <input v-model="orderForm.phone"
                   class="form-control"
                   name="name"
                   placeholder="+7 (___) ___-__-__"
                   type="text"
            >
          </div>
          <div class="col-12 col-md-6">
            <input v-model="orderForm.email"
                   class="form-control"
                   name="name"
                   placeholder="E-mail"
                   type="text"
            >
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

export default {
  name: "Order",
  layout: Layout,
  data: () => ({
    orderForm: useForm({
      name: null,
      phone: null,
      email: null,
    })
  }),
  computed: {
    user () {
      return this.$page.props.auth.user ?? false
    }
  },
  mounted() {
    if (this.user) {
      this.setDefaultDataUser()
    }
  },
  methods: {
    setDefaultDataUser () {
      this.orderForm.defaults({
        name: this.user.name,
        phone: this.user.phone,
        email: this.user.email,
      })
      console.log(this.user)
      this.orderForm.reset()
    }
  }
}
</script>

<style scoped>

</style>