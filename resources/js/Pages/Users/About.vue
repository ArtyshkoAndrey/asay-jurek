<template>
  <div class="container">
    <ImageItem
      source="https://placeimg.com/640/480/any"
    />
  </div>
</template>

<script>
import Layout from "../../Shared/Layout";
import ImageItem from "../../components/ImageItem";

export default {
  name: "About",
  layout: Layout,
  components: {
    ImageItem
  }
}
</script>

<style scoped>

</style>