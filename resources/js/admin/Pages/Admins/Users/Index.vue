<template>
  <Head>
    <title>Все пользователи сайта</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Пользователи</h1>
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
                <div class="form-check">
                  <input
                    id="is_admin"
                    v-model="form.is_admin"
                    class="form-check-input"
                    type="checkbox"
                    value="true"
                  >
                  <label
                    class="form-check-label"
                    for="is_admin"
                  >
                    Администраторы
                  </label>
                </div>
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
      <button class="btn d-block btn-dark ms-auto fw-light rounded-0" @click="openCreateUserModal">Создать пользователя</button>
    </div>
    <div class="col-12 col-md-10">
      <div class="card px-3">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">Имя</th>
              <th scope="col">Email</th>
              <th scope="col">Дата регистрации</th>
              <th scope="col">Роль</th>
            </tr>
            </thead>
            <tbody>

            <tr
              v-for="user in users"
              style="cursor: pointer"
              @click="open(user)"
            >
              <th scope="row">{{ user.id }}</th>
              <td>
                {{ user.name }}
              </td>
              <td>{{ user.email }}</td>
              <td>{{ user.created_at }}</td>
              <td>{{ user.admin ? 'Администратор' : 'Покупатель' }}</td>

            </tr>

            </tbody>
          </table>
          <InfiniteLoading
            :first-load="false"
            :users="users"
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
    id="updateUserModal"
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
            {{ selectUser.name }}
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
                  <label for="name">Имя</label>
                  <input
                    id="name"
                    v-model="selectUser.name"
                    :class="{'is-invalid': selectUser.errors.name}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="selectUser.errors.name"
                    class="invalid-feedback"
                  >
                    {{ selectUser.errors.name }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    v-model="selectUser.email"
                    :class="{'is-invalid': selectUser.errors.email}"
                    class="form-control rounded-0"
                    type="email"
                  >
                  <div
                    v-if="selectUser.errors.email"
                    class="invalid-feedback"
                  >
                    {{ selectUser.errors.email }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone">Телефон</label>
                  <input
                    id="phone"
                    v-model="selectUser.phone"
                    :class="{'is-invalid': selectUser.errors.phone}"
                    class="form-control rounded-0"
                    type="phone"
                  >
                  <div
                    v-if="selectUser.errors.phone"
                    class="invalid-feedback"
                  >
                    {{ selectUser.errors.phone }}
                  </div>
                </div>

                <div class="form-check">
                  <input
                    id="is-admin"
                    v-model="selectUser.is_admin"
                    class="form-check-input rounded-0"
                    type="checkbox"
                    value="true"
                    :disabled="$page.props.auth.user.id === selectUser.id"
                  >
                  <label
                    class="form-check-label"
                    for="is-admin"
                  >
                    Администратор
                  </label>
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
            :disabled="selectUser.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveUpdateUser"
          >
            Сохранить
          </button>
        </div>
      </div>
    </div>
  </div>

<!--  Model Create User-->
  <div
    id="createUserModal"
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
            Создание нового пользователя
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
                  <label for="name">Имя</label>
                  <input
                    id="name"
                    v-model="createUser.name"
                    :class="{'is-invalid': createUser.errors.name}"
                    class="form-control rounded-0"
                    type="text"
                  >
                  <div
                    v-if="createUser.errors.name"
                    class="invalid-feedback"
                  >
                    {{ createUser.errors.name }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    v-model="createUser.email"
                    :class="{'is-invalid': createUser.errors.email}"
                    class="form-control rounded-0"
                    type="email"
                  >
                  <div
                    v-if="createUser.errors.email"
                    class="invalid-feedback"
                  >
                    {{ createUser.errors.email }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone">Телефон</label>
                  <input
                    id="phone"
                    v-model="createUser.phone"
                    :class="{'is-invalid': createUser.errors.phone}"
                    class="form-control rounded-0"
                    type="phone"
                  >
                  <div
                    v-if="createUser.errors.phone"
                    class="invalid-feedback"
                  >
                    {{ createUser.errors.phone }}
                  </div>
                </div>

                <div class="mb-3">
                  <label for="password">Пароль</label>
                  <input
                    id="password"
                    v-model="createUser.password"
                    :class="{'is-invalid': createUser.errors.password}"
                    class="form-control rounded-0"
                    type="password"
                  >
                  <div
                    v-if="createUser.errors.password"
                    class="invalid-feedback"
                  >
                    {{ createUser.errors.password }}
                  </div>
                </div>

                <div class="form-check">
                  <input
                    id="is-admin"
                    v-model="createUser.is_admin"
                    class="form-check-input rounded-0"
                    type="checkbox"
                    value="true"
                  >
                  <label
                    class="form-check-label"
                    for="is-admin"
                  >
                    Администратор
                  </label>
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
            :disabled="createUser.processing"
            class="btn btn-dark fw-light rounded-0"
            type="button"
            @click="submitSaveCreateUser"
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
    users: [],
    page: 2,
    noResult: false,
    message: "",
    createUser: useForm({
      id: null,
      name: null,
      phone: null,
      email: null,
      password: null,
      is_admin: false
    }),
    selectUser: useForm({
      id: null,
      name: null,
      phone: null,
      email: null,
      is_admin: false
    }),
    form: useForm({
      q: null,
      is_admin: false
    }),
    modal: null
  }),
  computed: {
    formData() {
      return this.$page.props.formData
    },
    serverUsers() {
      return this.$page.props.users ?? null
    },
  },
  mounted() {
    this.form.defaults({
      q: this.formData.q,
      is_admin: this.formData.is_admin
    })
    this.form.reset()
    if (this.serverUsers) {
      this.users.push(...this.serverUsers.data)
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
      $('#updateUserModal')
    )

    this.createUserModal = new Modal($('#createUserModal'))
  },
  methods: {
    async loadDataFromServer($state) {
      try {
        const result = await axios.get('/admin/users', {
          params: {
            page: this.page,
            is_json: true,
            q: this.form.q,
          }
        })
        if (result.data.payload.users.data.length > 0) {
          setTimeout(() => {
            this.page++;
            this.users.push(...result.data.payload.users.data);
            $state.loaded()
            if (this.page > result.data.payload.users.last_page) {
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
      this.form.get('/admin/users')
    },

    open(user) {
      console.log(user)
      this.selectUser.defaults({
        ...user,
        is_admin: user.admin
      }).reset()
      this.modal.show()
    },
    submitSaveUpdateUser () {
      this.selectUser.put('/admin/users/' + this.selectUser.id, {
        onSuccess: () => {
          this.modal.hide()
          new bs5.Toast({
            body: "Данные пользовтеля изменены",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
    openCreateUserModal () {
      this.createUser.defaults({
        id: null,
        name: null,
        phone: null,
        email: null,
        password: null,
        is_admin: false
      }).reset()
      this.createUserModal.show()
    },
    submitSaveCreateUser () {
      this.createUser.post('/admin/users', {
        onSuccess: () => {
          this.createUserModal.hide()
          new bs5.Toast({
            body: "Новый пользователь успешно создался",
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
          this.submit()
        }
      })
    },
  }
}
</script>

<style scoped>

</style>