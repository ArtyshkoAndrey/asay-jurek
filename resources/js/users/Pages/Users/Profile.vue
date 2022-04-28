<template>
  <div class="container" id="profile">
    <div class="card bg-white border-0 rounded-0 px-0">
      <div class="card-body px-0 py-0 border-0 rounded-0">

        <div class="row mx-0">

          <div class="col-md-3 bg-white nav-menu m-0 p-0">
            <div aria-orientation="vertical" class="nav flex-column nav-pills h-100 m-0" role="tablist">
              <a aria-selected="true" class="nav-link active border-0 rounded-0 py-4" href=""><i
                class="bx bx-user bx-sm pr-1"></i> Мой профиль</a>
              <a aria-selected="true" class="nav-link border-0 rounded-0 py-4" href=""><i
                class="bx bx-list-ol bx-sm pr-1"></i> Мои заказы</a>
            </div>
          </div>

          <div class="col p-4">
            <div class="row">
              <div class="col-12">
                <h3 class="font-weight-bold">Мой прфоиль</h3>
              </div>
            </div>

            <div class="row mt-4">

              <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 profile-image">
                <ImageItem
                  v-if="user.url"
                  :source="user.url"
                  class="img-fluid w-100 px-md-0"
                  />

                <img v-else src="/public/img/user.png" class="img-fluid w-100 px-md-0" alt="user">
                
                <form id="form-photo" enctype="multipart/form-data">

                  <input type="file"
                         ref="photo"
                         id="photo"
                         name="photo"
                         accept="image/jpeg,image/png"
                         @input="photoForm.photo = $event.target.files[0]"
                         @change="uploadPhoto"
                         style="visibility: hidden; width: 100px;">
                  <button type="button"
                          class="btn btn-dark position-absolute"
                          id="add-photo"
                          :disabled="photoForm.processing"
                          @click="clickPhoto"
                  >
                    <i class="far fa-2x fa-camera"></i>
                  </button>
                </form>
              </div>
              <div class="col">
                <div class="pl-3 mt-3 mt-sm-0">
                  <h4>{{ user.name }}</h4>
                  <p class="fw-light mb-1">
                    Россия, Красноярск, Горького 24, 660099
                  </p>
                  <p class="fw-light">
                    +7 (902) 963-43-66
                  </p>
                </div>
              </div>

              <hr class="d-block d-md-none mt-3 mt-sm-5">

              <div class="col-12 mt-2">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 order-1 order-md-0 mt-4 mt-md-0">
                    <form @submit.prevent="updatePassword">
                      <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input v-model="passwordForm.password"
                               type="password"
                               class="form-control"
                               id="password"
                               placeholder="Пароль"
                               :class="{'is-invalid': passwordForm.errors.password }"
                        >
                        <div v-if="passwordForm.errors.password" class="invalid-feedback">
                          {{ passwordForm.errors.password }}
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="confirm_password" class="form-label">Повторите пароль</label>
                        <input v-model="passwordForm.confirm_password"
                               type="password"
                               class="form-control"
                               id="confirm_password"
                               placeholder="Пароль"
                               :class="{'is-invalid': passwordForm.errors.confirm_password }"
                        >
                        <div v-if="passwordForm.errors.confirm_password" class="invalid-feedback">
                          {{ passwordForm.errors.confirm_password }}
                        </div>
                      </div>
                      <div class="mb-3">
                        <button :disabled="passwordForm.processing"
                                type="submit"
                                class="btn btn-dark fw-light w-100 py-2 text-uppercase"
                        >
                          <span v-if="passwordForm.processing" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          <span v-else>Сохранить</span>
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="col-12 col-sm order-0 order-md-1 mb-4">
<!--                    User INFO-->
                    <form @submit.prevent="updateUser">
                      <div class="row">

                        <div class="col-12 col-sm-12 col-xl-6">
                          <div class="mb-3">
                            <label for="name" class="form-label">ФИО</label>
                            <input v-model="userForm.name"
                                   type="text"
                                   class="form-control"
                                   id="name"
                                   placeholder="ФИО"
                                   :class="{'is-invalid': userForm.errors.name }"
                            >
                            <div v-if="userForm.errors.name" class="invalid-feedback">
                              {{ userForm.errors.name }}
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6">
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input v-model="userForm.email"
                                   type="email"
                                   class="form-control"
                                   id="email"
                                   placeholder="Email"
                                   :class="{'is-invalid': userForm.errors.email }"
                            >
                            <div v-if="userForm.errors.email" class="invalid-feedback">
                              {{ userForm.errors.email }}
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6">
                          <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input v-model="userForm.phone"
                                   type="phone"
                                   class="form-control"
                                   id="phone"
                                   placeholder="Телефон"
                                   :class="{'is-invalid': userForm.errors.phone }"
                            >
                            <div v-if="userForm.errors.phone" class="invalid-feedback">
                              {{ userForm.errors.phone }}
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6 ">
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6 ">
                          <div class="mb-3">
                            <label for="country" class="form-label">Страна</label>
                            <input v-model="userForm.country"
                                   type="text"
                                   class="form-control"
                                   id="country"
                                   placeholder="Страна"
                                   :class="{'is-invalid': userForm.errors.country }"
                            >
                            <div v-if="userForm.errors.country" class="invalid-feedback">
                              {{ userForm.errors.country }}
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6">
                          <div class="mb-3">
                            <label for="city" class="form-label">Город</label>
                            <input v-model="userForm.city"
                                   type="text"
                                   class="form-control"
                                   id="city"
                                   placeholder="Город"
                                   :class="{'is-invalid': userForm.errors.city }"
                            >
                            <div v-if="userForm.errors.city" class="invalid-feedback">
                              {{ userForm.errors.city }}
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="mb-3">
                            <label for="address" class="form-label">Улица, дом</label>
                            <input v-model="userForm.address"
                                   type="text"
                                   class="form-control"
                                   id="address"
                                   placeholder="Улица, дом"
                                   :class="{'is-invalid': userForm.errors.address }"
                            >
                            <div v-if="userForm.errors.address" class="invalid-feedback">
                              {{ userForm.errors.address }}
                            </div>

                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-xl-6">
                          <div class="mb-3">
                            <label for="index" class="form-label">Почтовый Индекс</label>
                            <input v-model="userForm.index"
                                   type="text"
                                   class="form-control"
                                   id="index"
                                   placeholder="Почтовый индекс"
                                   :class="{'is-invalid': userForm.errors.index }"
                            >
                            <div v-if="userForm.errors.index" class="invalid-feedback">
                              {{ userForm.errors.index }}
                            </div>

<!--                            <Select2 v-model="userForm.address" :settings="myOptions" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />-->

                          </div>
                        </div>

                        <div class="col-12">
                          <div class="row">
                            <div class="col-12 col-xl-6">

                              <button :disabled="userForm.processing"
                                      type="submit"
                                      class="btn btn-dark fw-light w-100 py-2 text-uppercase"
                              >
                                <span v-if="userForm.processing" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                <span v-else>Сохранить</span>
                              </button>

                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import Select2 from 'vue3-select2-component';

export default {
  name: "Profile",
  layout: Layout,
  components: {
    Select2
  },
  data: () => ({
    test: null,
    photoForm: useForm({
      photo: null,
      user_id: null
    }),
    passwordForm: useForm({
      password: null,
      confirm_password: null
    }),
    userForm: useForm({
      name: null,
      email: null,
      address: null,
      index: null,
      city: null,
      country: null,
      phone: null
    })
  }),
  computed: {
    user () {
      return this.$page.props.user
    },
    myOptions () {
      return {
        language: "ru",
        ajax: {
          headers: {
            "Content-Type": 'application/json',
            "Authorization": "Token be33fe1fe0328828d9632c248dcad68166e62740",
            "X-Secret": '23c196abec29f8f3bafeb96f8be339c491a3bb77'
          },
          delay: 250,
          type: "POST",
          url: 'https://cleaner.dadata.ru/api/v1/clean/address',
          data: function (params) {
            return JSON.stringify([params.term])
          },
          processResults: function (data) {
            return {
              results: data.map((e) => {
                return {
                  text: e.result,
                  id: e.result,
                  country: e.country,
                  city: e.city,
                  qc_complete: e.qc_complete
                };
              })
            };
          }
        }
      }
    }
  },
  mounted() {

    this.photoForm.defaults({
      photo: null,
      user_id: this.user.id
    })
    this.photoForm.reset();

    this.userForm.defaults({
      name: this.user.name,
      email: this.user.email,
      address: this.user.address,
      index: this.user.index,
      city: null,
      country: null,
      phone: this.user.phone
    })
    this.userForm.reset();
  },
  methods: {
    clickPhoto () {
      this.$refs['photo'].click()
    },
    uploadPhoto () {
      this.photoForm.post('/profile/upload-photo', {
        preserveState: true,
        preserveScroll: true
      })
      this.photoForm.reset()
      this.$refs['photo'].value = ''
    },
    updatePassword () {
      this.passwordForm.post('/profile/update-password', {
        preserveState: true,
        preserveScroll: true
      })
    },
    updateUser () {
      this.userForm.post('/profile/update-info', {
        preserveState: true,
        preserveScroll: true
      })
    },

    myChangeEvent(val){
      console.log(val);
    },
    mySelectEvent(data){
      if (data.qc_complete !== 0) {
        this.userForm.address = null
      }
      console.log(data)
    }
  },
}
</script>

<style scoped>

</style>