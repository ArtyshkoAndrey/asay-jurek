<template>
  <section class="container mt-5">
   <div class="row justify-content-center">
     <div class="col-12 col-sm-10 col-md-6 col-lg-4">
       <form @submit.prevent="submit">

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

         <div class="mb-3 form-check">
           <input v-model="form.remember" type="checkbox" class="form-check-input" id="remember">
           <label class="form-check-label" for="remember">{{ $t('login.inputs.remember') }}</label>
         </div>

         <button type="submit" class="btn btn-dark">{{ $t('login.buttons.login') }}</button>
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

export default {
  name: "Login",
  layout: Layout,
  data: () => ({
    form: useForm({
      email: null,
      password: null,
      remember: false
    })
  }),
  methods: {
    submit () {
      let words = this.$t('tooltips.login')
      this.form.submit('post', '/login', {
        preserveScroll: true,
        onSuccess: () =>  {
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