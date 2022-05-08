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
                    v-model="form.is_admin"
                    id="is_admin"
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

  <div class="row justify-content-center mt-5">
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
</template>

<script>
import Layout from "../../../Shared/Layout";
import bs5 from "../../../../users/plugins/bs5";
import InfiniteLoading from "v3-infinite-loading";
import {Inertia} from "@inertiajs/inertia";
import {useForm} from "@inertiajs/inertia-vue3";

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
    form: useForm({
      q: null,
      is_admin: false
    })
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
    if (this.serverUsers)
      this.users.push(...this.serverUsers.data)
    else {
      new bs5.Toast({
        body: "Ошибка в принятии данный от сервера",
        className: 'border-0 bg-warning text-dark',
        btnCloseWhite: false,
        autohide: true,
        delay: 3000
      }).show()
    }
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
  }
}
</script>

<style scoped>

</style>