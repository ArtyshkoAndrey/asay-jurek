<template>
  <section class="container mt-5">
   <div class="row justify-content-center">
     <div class="col-12 col-sm-10 col-md-6 col-lg-4">
       <form>
         <div class="mb-3">
           <label for="email" class="form-label">Email</label>
           <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
         </div>
         <div class="mb-3">
           <label for="password" class="form-label">{{ $t('login.inputs.password') }}</label>
           <input type="password" class="form-control" id="password">
         </div>
         <div class="mb-3 form-check">
           <input type="checkbox" class="form-check-input" id="remember">
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

export default {
  name: "Login",
  layout: Layout,
}
</script>

<style scoped>

</style>