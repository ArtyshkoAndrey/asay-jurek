<template>
  <section class="container mt-5">
   <div class="row justify-content-center">
     <div class="col-12 col-sm-10 col-md-6 col-lg-4">
       <form @submit.prevent="submit">

         <div class="mb-3">
           <label for="name" class="form-label">{{ $t('login.inputs.name') }}</label>
           <input v-model="form.name"
                  type="text"
                  class="form-control"
                  id="name"
                  :class="form.errors.name ? 'is-invalid' : ''"
           >
           <div v-if="form.errors.name" class="invalid-feedback">
             {{ form.errors.name }}
           </div>
         </div>

         <div class="mb-3">
           <label for="email" class="form-label">Email</label>
           <input v-model="form.email"
                  type="email"
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                  :class="form.errors.email ? 'is-invalid' : ''"
           >
           <div v-if="form.errors.email" class="invalid-feedback">
             {{ form.errors.email }}
           </div>
         </div>

         <div class="mb-3">
           <label for="password" class="form-label">{{ $t('login.inputs.password') }}</label>
           <input v-model="form.password"
                  type="password"
                  class="form-control"
                  id="password"
                  :class="form.errors.password ? 'is-invalid' : ''"
           >
           <div v-if="form.errors.password" class="invalid-feedback">
             {{ form.errors.password }}
           </div>
         </div>

         <div class="mb-3">
           <label for="password" class="form-label">{{ $t('login.inputs.password_confirmation') }}</label>
           <input v-model="form.password_confirmation"
                  type="password"
                  class="form-control"
                  id="password"
                  :class="form.errors.password_confirmation ? 'is-invalid' : ''"
           >
           <div v-if="form.errors.password_confirmation" class="invalid-feedback">
             {{ form.errors.password_confirmation }}
           </div>
         </div>

         <button type="submit" class="btn btn-dark">{{ $t('login.buttons.register') }}</button>
       </form>
     </div>
   </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
import { useForm } from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";
import bs5 from "../../plugins/bs5";
import {mapActions} from "vuex";

export default {
  name: "Login",
  layout: Layout,
  data: () => ({
    form: useForm({
      name: null,
      email: null,
      password: null,
      password_confirmation: null
    })
  }),
  mounted() {
    if (this.$page.props.auth.user) {
      Inertia.visit('/')
    }
  },
  methods: {
    ...mapActions('cart', {
      initialCart: 'initialCart'
    }),
    submit () {
      let words = this.$t('tooltips.register')
      this.form.submit('post', '/register', {
        preserveScroll: true,
        onSuccess: () =>  {
          this.initialCart({
            user: this.$page.props.auth.user,
            tooltip: true
          })
          new bs5.Toast({
            body: words,
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 5000
          }).show()
        }
      })
    }
  }
}
</script>

<style scoped>

</style>