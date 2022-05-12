<template>

  <section class="container">
    <div class="row">
      <div class="col-12">
        <a :href="link" class="d-block">
          <ImageItem
            v-if="url"
            :source="url"
          />
          <ImageItem
            v-else
            source="public/img/index-big-image.png"
          />
        </a>
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
  },
  computed: {
    url () {
      return this.$page.props.url
    },
    link () {
      return this.$page.props.link ?? '/'
    }
  }
}
</script>

<style scoped>

</style>