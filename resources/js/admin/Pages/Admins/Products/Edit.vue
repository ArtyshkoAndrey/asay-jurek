<template>
  <Head>
    <title>Товар - {{ serverProduct.name }}</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Товар - {{ serverProduct.name }}</h1>
  </div>

  <div class="row gy-3 gy-md-3">
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
                  v-model="product.ru.name"
                  :class="{'is-invalid': product.errors['ru.name']}"
                  class="form-control rounded-0"
                  name="ru_name"
                  type="text"
                >
                <div
                  v-if="product.errors['ru.name']"
                  class="invalid-feedback"
                >
                  {{ product.errors['ru.name'] }}
                </div>
              </div>

              <div class="mb-3">
                <label for="ru_description">Описание *</label>
                <textarea
                  id="ru_description"
                  v-model="product.ru.description"
                  :class="{'is-invalid': product.errors['ru.description']}"
                  class="form-control rounded-0"
                  name="ru_description"
                  type="text"
                ></textarea>
                <div
                  v-if="product.errors['ru.description']"
                  class="invalid-feedback"
                >
                  {{ product.errors['ru.description'] }}
                </div>
              </div>

              <div class="mb-3">
                <label for="ru_history">История *</label>
                <textarea
                  id="ru_history"
                  v-model="product.ru.history"
                  :class="{'is-invalid': product.errors['ru.history']}"
                  class="form-control rounded-0"
                  name="ru_history"
                  type="text"
                ></textarea>
                <div
                  v-if="product.errors['ru.history']"
                  class="invalid-feedback"
                >
                  {{ product.errors['ru.history'] }}
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
                  v-model="product.en.name"
                  :class="{'is-invalid': product.errors['en.name']}"
                  class="form-control rounded-0"
                  name="en_name"
                  type="text"
                >
                <div
                  v-if="product.errors['en.name']"
                  class="invalid-feedback"
                >
                  {{ product.errors['en.name'] }}
                </div>
              </div>

              <div class="mb-3">
                <label for="en_description">Описание *</label>
                <textarea
                  id="en_description"
                  v-model="product.en.description"
                  :class="{'is-invalid': product.errors['en.description']}"
                  class="form-control rounded-0"
                  name="en_description"
                  type="text"
                ></textarea>
                <div
                  v-if="product.errors['en.description']"
                  class="invalid-feedback"
                >
                  {{ product.errors['en.description'] }}
                </div>
              </div>

              <div class="mb-3">
                <label for="en_history">История *</label>
                <textarea
                  id="en_history"
                  v-model="product.en.history"
                  :class="{'is-invalid': product.errors['en.history']}"
                  class="form-control rounded-0"
                  name="en_history"
                  type="text"
                ></textarea>
                <div
                  v-if="product.errors['en.history']"
                  class="invalid-feedback"
                >
                  {{ product.errors['en.history'] }}
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
              <h5 class="card-title">Информация</h5>

              <div class="mb-3">
                <label for="category_id">Категория *</label>
                <select
                  id="category_id"
                  v-model="product.category_id"
                  :class="{'is-invalid': product.errors.category_id}"
                  aria-label="Категория"
                  class="form-select"
                  name="category_id"
                >
                  <optgroup
                    v-for="category in categoriesWithoutChilds"
                    :label="category.name"
                  >
                    <option
                      v-for="child in category.childs"
                      :value="child.id"
                    >
                      {{ child.name }}
                    </option>
                  </optgroup>
                </select>
                <div
                  v-if="product.errors.category_id"
                  class="invalid-feedback"
                >
                  {{ product.errors.category_id }}
                </div>
              </div>

              <div class="mb-3">
                <label for="status_id">Состояние *</label>
                <select
                  id="status_id"
                  v-model="product.status_id"
                  :class="{'is-invalid': product.errors.status_id}"
                  aria-label="Состояние"
                  class="form-select"
                  name="status_id"
                >
                  <option
                    v-for="status in statuses"
                    :value="status.id"
                  >
                    {{ status.name }}
                  </option>
                </select>
                <div
                  v-if="product.errors.status_id"
                  class="invalid-feedback"
                >
                  {{ product.errors.status_id }}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="row gy-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Данные о товаре</h5>

              <div class="row align-items-end">
                <div class="col-md-6 col-lg-3">
                  <div class="mb-3">
                    <label for="count">Кол-во *</label>
                    <input
                      id="count"
                      v-model="product.count"
                      :class="{'is-invalid': product.errors.count}"
                      class="form-control rounded-0"
                      min="0"
                      name="count"
                      step="1"
                      type="number"
                    >
                    <div
                      v-if="product.errors.count"
                      class="invalid-feedback"
                    >
                      {{ product.errors.count }}
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3">
                  <div class="mb-3">
                    <label for="cost">Стоимость *</label>
                    <input
                      id="cost"
                      v-model="product.cost"
                      :class="{'is-invalid': product.errors.cost}"
                      class="form-control rounded-0"
                      min="0"
                      name="cost"
                      step="1000"
                      type="number"
                    >
                    <div
                      v-if="product.errors.cost"
                      class="invalid-feedback"
                    >
                      {{ product.errors.cost }}
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3">
                  <div class="mb-3">
                    <div class="form-check">
                      <input
                        id="week"
                        v-model="product.week"
                        class="form-check-input"
                        type="checkbox"
                        :value="true"
                      >
                      <label
                        class="form-check-label"
                        for="week"
                      >
                        Подборка недели
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3">
                  <div class="mb-3">
                    <div class="form-check">
                      <input
                        id="new"
                        v-model="product.new"
                        class="form-check-input"
                        type="checkbox"
                        :value="true"
                      >
                      <label
                        class="form-check-label"
                        for="new"
                      >
                        Новое поступление
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="/admin/products/photos" method="post" class="dropzone"></form>
          <small class="text-danger">Если вы не сохраните результат, фотографии автоматически удалятся</small>

          <small v-if="product.errors.ids_photos" class="text-danger mt-2 d-block">Фотографии обязательны для сохранения</small>
        </div>
      </div>
    </div>

    <div class="col-12">
      <button type="button" @click="submit" class="btn btn-dark rounded-0 d-block ms-auto">Сохранить</button>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import Dropzone from "dropzone";
import {Inertia} from "@inertiajs/inertia";
import bs5 from "../../../../users/plugins/bs5";

export default {
  name: "Edit",
  layout: Layout,
  components: {
  },
  data: () => ({
    product: useForm({
      ru: {
        name: null,
        description: null,
        history: null
      },
      en: {
        name: null,
        description: null,
        history: null
      },
      category_id: null,
      count: null,
      cost: null,
      new: false,
      week: false,
      status_id: null,
      images: [],
      ids_photos: []
    }),
    dropzone: null
  }),
  computed: {
    serverProduct() {
      return this.$page.props.product
    },
    categories() {
      return this.$page.props.categories
    },
    statuses() {
      return this.$page.props.statuses
    },
    categoriesWithoutChilds() {
      return this.categories.filter(e => e.parent === null)
    }
  },
  mounted() {
    this.product.defaults({
      ...this.serverProduct,
      ru: {
        name: this.serverProduct.translate['ru'].name,
        description: this.serverProduct.translate['ru'].description,
        history: this.serverProduct.translate['ru'].history
      },
      en: {
        name: this.serverProduct.translate['en'].name,
        description: this.serverProduct.translate['en'].description,
        history: this.serverProduct.translate['en'].history
      },
      ids_photos: this.serverProduct.images.map(e => e.id)
    }).reset()
    this.dropzone = new Dropzone(".dropzone", {
      addRemoveLinks: true
    });

    this.dropzone.on("success", this.success)
    this.dropzone.on("removedfile", this.removedfile)

    this.serverProduct.images.forEach(e => {
      let mockFile = { name: e.owner_name, size: e.bites, id: e.id, accepted: true };
      this.dropzone.emit('addedfile', mockFile)
      this.dropzone.emit("thumbnail", mockFile, e.url);
      this.dropzone.emit("complete", mockFile);
      this.dropzone.emit("success", mockFile);
      this.dropzone.emit("complete", mockFile);
      this.dropzone.files.push(mockFile);
    })
  },
  beforeUnmount() {
    this.dropzone.disable()
    this.dropzone = null
  },
  methods: {
    success(file) {
      if (file.xhr) {
        //  if upload file in server

        let json = JSON.parse(file.xhr.response)
        this.product.ids_photos.push(json.payload.image.id)
      }
    },
    removedfile (file) {
      let id
      if (file instanceof File) {
        let json = JSON.parse(file.xhr.response)
        id = json.payload.image.id
        this.product.ids_photos = this.product.ids_photos.filter(e => e !== id)
      } else {
        id = file.id
        this.product.ids_photos = this.product.ids_photos.filter(e => e !== file.id)
      }

      axios.delete('/admin/products/photos/' + id)
        .then(r => {
          new bs5.Toast({
            body: "Фотография удалена",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        })

        .catch(e => {
          new bs5.Toast({
            body: "Ошибка при удалении фотографии",
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        })
    },
    submit () {
      this.product.put('/admin/products/' + this.serverProduct.id, {
        onSuccess: () => {
          alert('Сохранено')
        }
      })
    }
  },
}
</script>

<style lang="scss">
@import 'dropzone/src/dropzone';

.dropzone {
  border: 2px dashed rgba(28,110,164,0.38);
  border-radius: 8px 8px 8px 8px;
}
.dz-image {
  img {
    object-fit: cover;
    height: 100%;
    width: 100%;
  }
}
</style>