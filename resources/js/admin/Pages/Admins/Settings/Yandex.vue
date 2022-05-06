<template>
  <Head>
    <title>Настройки Яндекс метрики</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Настройки Яндекс метрики</h1>
  </div>

  <form @submit.prevent="submit">
    <div class="row gy-3">
      <div class="col-12 col-md-10 col-lg-6">
        <label for="code">Код интеграции метрики</label>
        <textarea
          id="code"
          class="form-control"
          name="сщву"
          v-model="form.code"
          rows="10"
          placeholder="Код интеграции метрики"
        ></textarea>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-10 col-lg-6">
        <button
          class="h-100 d-block btn btn-dark rounded-0 ms-auto"
          type="submit"
        >
          Сохранить
        </button>
      </div>
    </div>
  </form>

</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import bs5 from "../../../../users/plugins/bs5";

export default {
  name: "Yandex",
  layout: Layout,
  components: {
  },
  data: () => ({
    form: useForm({
      code: null,
    })
  }),
  computed: {
    code() {
      return this.$page.props.code ?? null
    },
  },
  mounted() {
    this.form.defaults({
      code: this.code
    })
    this.form.reset()

  },
  methods: {
    submit () {
      this.form.post('/admin/settings/yandex-metrics/save', {
        onSuccess: () => {
          new bs5.Toast({
            body: "Данные сохранены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>