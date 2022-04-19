<template>
  {{ category.name }}
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
  name: "Catalog",
  layout: Layout,
  computed: {
    category () {
      return this.$page.props.category
    }
  }
}
</script>

<style scoped>

</style>