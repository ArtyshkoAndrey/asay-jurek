<template>

  <div class="container">
    <h1>Test</h1>
    <Link href="/about">На about</Link>

    <p>{{ $store.state.currencies.currency.name }}</p>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout";
export default {
  name: "Index",
  layout: Layout,

}
</script>

<style scoped>

</style>