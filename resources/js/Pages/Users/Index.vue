<template>

  <section class="container">
    <div class="row">
      <div class="col-12">
        <Link href="/" class="d-block">
<!--          <img src="public/img/index-big-image.png" class="img-fluid" alt="index-page">-->
          <ImageItem
            source="public/img/index-big-image.png"
          />
        </Link>
      </div>
    </div>
  </section>
</template>

<script>
import Layout from "../../Shared/Layout";
export default {
  name: "Index",
  layout: Layout,
  components: {
  }
}
</script>

<style scoped>

</style>