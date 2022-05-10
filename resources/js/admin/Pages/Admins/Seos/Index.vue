<template>
  <Head>
    <title>SEO настройки</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Seo данные</h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 col-md-10">
      <div class="card">
        <div class="card-body">
          <form @submit.prevent="submit">
            <div class="row align-items-center gy-3">
              <div class="col-12 col-md-6 col-lg-3">
                <input
                  id="q"
                  v-model="form.q"
                  aria-describedby="q"
                  class="form-control rounded-0"
                  name="q"
                  placeholder="Найти..."
                  type="text"
                >
              </div>
              <div class="col-12 col-md-auto">
                <button
                  class="h-100 btn btn-dark rounded-0"
                  type="submit"
                >
                  Фильтровать
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row gy-3  justify-content-center mt-5">
    <div class="col-12 mt-0 col-md-10">
      <button
        class="btn d-block btn-dark ms-auto fw-light rounded-0"
        @click="openCreateSeoModal"
      >
        Создать Seo страницу
      </button>
    </div>
    <div class="col-12 col-md-10">
      <div class="card px-3">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">URL</th>
              <th scope="col">Заголовок</th>
            </tr>
            </thead>
            <tbody>

            <tr
              v-for="seo in seos"
              style="cursor: pointer"
              @click="open(seo)"
            >
              <th scope="row">{{ seo.id }}</th>
              <td>
                {{ seo.url }}
              </td>
              <td>{{ seo.title }}</td>

            </tr>

            </tbody>
          </table>
          <InfiniteLoading
            :first-load="false"
            :seos="seos"
            @infinite="loadDataFromServer"
          >
            <template #complete>
              <span></span>
            </template>
          </InfiniteLoading>
        </div>
      </div>
    </div>
  </div>

  <!--  Model Update User-->
  <div
    id="updateSeoModal"
    aria-hidden="true"
    aria-labelledby="exampleModalLabel"
    class="modal fade"
    tabindex="-1"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5
            id="exampleModalLabel"
            class="modal-title"
          >
            {{ selectSeo.title }}
          </h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <form>

                <div class="mb-3">
                  <label for="url">URL</label>
                  <input
                    id="url"
                    v-model="selectSeo.url"
                    :class="{'is-invalid': selectSeo.errors.url}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectSeo.errors.url"
                    class="invalid-feedback"
                  >
                    {{ selectSeo.errors.url }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="title">Заголовок</label>
                  <input
                    id="title"
                    v-model="selectSeo.title"
                    :class="{'is-invalid': selectSeo.errors.title}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectSeo.errors.title"
                    class="invalid-feedback"
                  >
                    {{ selectSeo.errors.title }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="description">Описание</label>
                  <input
                    id="description"
                    v-model="selectSeo.description"
                    :class="{'is-invalid': selectSeo.errors.description}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectSeo.errors.description"
                    class="invalid-feedback"
                  >
                    {{ selectSeo.errors.description }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="meta_description">Мета Описание</label>
                  <input
                    id="meta_description"
                    v-model="selectSeo.meta_description"
                    :class="{'is-invalid': selectSeo.errors.meta_description}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectSeo.errors.meta_description"
                    class="invalid-feedback"
                  >
                    {{ selectSeo.errors.meta_description }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="meta_keywords">Ключевые слова</label>
                  <input
                    id="meta_keywords"
                    v-model="selectSeo.meta_keywords"
                    :class="{'is-invalid': selectSeo.errors.meta_keywords}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectSeo.errors.meta_keywords"
                    class="invalid-feedback"
                  >
                    {{ selectSeo.errors.meta_keywords }}
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-danger me-auto rounded-0 fw-light"
            type="button"
            @click="destroySeo"
          >
            Удалить
          </button>
          <button
            class="btn btn-secondary rounded-0 fw-light"
            data-bs-dismiss="modal"
            type="button"
          >
            Закрыть
          </button>
          <button
            :disabled="selectSeo.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveUpdateSeo"
          >
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--  Model Create User-->
  <div
    id="createSeoModal"
    aria-hidden="true"
    aria-labelledby="exampleModalLabel"
    class="modal fade"
    tabindex="-1"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5
            id="exampleModalLabel"
            class="modal-title"
          >
            Создание новой SEO страницы
          </h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <form>
                <div class="mb-3">
                  <label for="url">URL</label>
                  <input
                    id="url"
                    v-model="createSeo.url"
                    :class="{'is-invalid': createSeo.errors.url}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createSeo.errors.url"
                    class="invalid-feedback"
                  >
                    {{ createSeo.errors.url }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="title">Заголовок</label>
                  <input
                    id="title"
                    v-model="createSeo.title"
                    :class="{'is-invalid': createSeo.errors.title}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createSeo.errors.title"
                    class="invalid-feedback"
                  >
                    {{ createSeo.errors.title }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="description">Описание</label>
                  <input
                    id="description"
                    v-model="createSeo.description"
                    :class="{'is-invalid': createSeo.errors.description}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createSeo.errors.description"
                    class="invalid-feedback"
                  >
                    {{ createSeo.errors.description }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="meta_description">Мета Описание</label>
                  <input
                    id="meta_description"
                    v-model="createSeo.meta_description"
                    :class="{'is-invalid': createSeo.errors.meta_description}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createSeo.errors.meta_description"
                    class="invalid-feedback"
                  >
                    {{ createSeo.errors.meta_description }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="meta_keywords">Ключевые слова</label>
                  <input
                    id="meta_keywords"
                    v-model="createSeo.meta_keywords"
                    :class="{'is-invalid': createSeo.errors.meta_keywords}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createSeo.errors.meta_keywords"
                    class="invalid-feedback"
                  >
                    {{ createSeo.errors.meta_keywords }}
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-secondary rounded-0 fw-light"
            data-bs-dismiss="modal"
            type="button"
          >
            Закрыть
          </button>
          <button
            :disabled="createSeo.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveCreateSeo"
          >
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../../../Shared/Layout";
import bs5 from "../../../../users/plugins/bs5";
import InfiniteLoading from "v3-infinite-loading";
import {useForm} from "@inertiajs/inertia-vue3";
import {Modal} from 'bootstrap';

export default {
  name: "Index",
  layout: Layout,
  components: {
    InfiniteLoading
  },
  data: () => ({
    seos: [],
    page: 2,
    noResult: false,
    message: "",
    createSeo: useForm({
      url: null,
      title: null,
      description: null,
      meta_description: null,
      meta_keywords: null,
    }),
    selectSeo: useForm({
      url: null,
      title: null,
      description: null,
      meta_description: null,
      meta_keywords: null,
    }),
    form: useForm({
      q: null,
    }),
    destroySeoForm: useForm({}),
    modal: null,
    createSeoModal: null
  }),
  computed: {
    formData() {
      return this.$page.props.formData
    },
    serverSeos() {
      return this.$page.props.seos ?? null
    },
  },
  mounted() {
    this.form.defaults({
      q: this.formData.q
    })
    this.form.reset()
    if (this.serverSeos) {
      this.seos.push(...this.serverSeos.data)
    } else {
      new bs5.Toast({
        body: "Ошибка в принятии данный от сервера",
        className: 'border-0 bg-warning text-dark',
        btnCloseWhite: false,
        autohide: true,
        delay: 3000
      }).show()
    }

    this.modal = new Modal(
      $('#updateSeoModal')
    )

    this.createSeoModal = new Modal($('#createSeoModal'))
  },
  methods: {
    async loadDataFromServer($state) {
      try {
        const result = await axios.get('/admin/seos', {
          params: {
            page: this.page,
            is_json: true,
            q: this.form.q,
          }
        })
        if (result.data.payload.seos.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.seos.push(...result.data.payload.seos.data);
            $state.loaded()
            if (this.page > result.data.payload.seos.last_page) {
              $state.complete()
            }
          }, 1000)
        } else {
          $state.complete()
        }
      } catch (err) {
        $state.error()
      }
    },
    submit() {
      this.form.get('/admin/seos')
    },

    open(seo) {
      console.log(seo)
      this.selectSeo.defaults({
        ...seo
      }).reset()
      this.modal.show()
    },
    submitSaveUpdateSeo() {
      this.selectSeo.put('/admin/seos/' + this.selectSeo.id, {
        onSuccess: () => {
          this.modal.hide()
          new bs5.Toast({
            body: "Данные SEO изменены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
    openCreateSeoModal() {
      this.createSeo.defaults({
        url: null,
        title: null,
        description: null,
        meta_description: null,
        meta_keywords: null,
      }).reset()
      this.createSeoModal.show()
    },
    submitSaveCreateSeo() {
      this.createSeo.post('/admin/seos', {
        onSuccess: () => {
          this.createSeoModal.hide()
          new bs5.Toast({
            body: "Новая SEO страницы успешно создалась",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
    destroySeo() {
      this.destroySeoForm.delete('/admin/seos/' + this.selectSeo.id, {
        onSuccess: () => {
          this.modal.hide()
          new bs5.Toast({
            body: "Выбранная SEO страницы удалена",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    }
  }
}
</script>

<style scoped>

</style>