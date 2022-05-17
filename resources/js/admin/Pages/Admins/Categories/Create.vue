<template>
  <Head>
    <title>Создание товара</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
      <span v-if="form.parent_id === null">
        Создание главной категории
      </span>
      <span v-else>
        Создание дочерней категории для {{ ownCategory.name }}
      </span>
    </h1>
  </div>

  <div class="row gy-3">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Данные на Русском</h5>

              <div class="mb-3">
                <label for="ru_name">Наименование *</label>
                <input
                  id="ru_name"
                  v-model="form.ru.name"
                  :class="{'is-invalid': form.errors['ru.name']}"
                  class="form-control rounded-0"
                  name="ru_name"
                  type="text"
                >
                <div
                  v-if="form.errors['ru.name']"
                  class="invalid-feedback"
                >
                  {{ form.errors['ru.name'] }}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Данные на Английском</h5>

              <div class="mb-3">
                <label for="en_name">Наименование *</label>
                <input
                  id="en_name"
                  v-model="form.en.name"
                  :class="{'is-invalid': form.errors['en.name']}"
                  class="form-control rounded-0"
                  name="en_name"
                  type="text"
                >
                <div
                  v-if="form.errors['en.name']"
                  class="invalid-feedback"
                >
                  {{ form.errors['en.name'] }}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <button type="button" @click="submit" class="btn btn-dark rounded-0 d-block">Сохранить</button>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
  name: "Create",
  layout: Layout,
  data: () => ({
    form: useForm({
      ru: {
        name: null,
      },
      en: {
        name: null,
      },
      parent_id: null
    })
  }),
  computed: {
    ownCategory () {
      return this.$page.props.ownCategory
    },
  },
  mounted() {
    if (this.ownCategory) {
      this.form.defaults({
        ru: {
          name: null,
        },
        en: {
          name: null,
        },
        parent_id: this.ownCategory.id
      }).reset()
    }
  },
  methods: {
    submit () {
      this.form.post('/admin/categories')
    }
  }
}
</script>

<style scoped>

</style>