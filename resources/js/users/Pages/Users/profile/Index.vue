<template>
  <ProfilerCard>
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
                {{ user.address ?? 'Адрес не указан' }}
              </p>
              <p class="fw-light">
                {{ user.phone ?? 'Номер телефона не указах' }}
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
                        <!--                            <input v-model="userForm.country"-->
                        <!--                                   type="text"-->
                        <!--                                   class="form-control"-->
                        <!--                                   id="country"-->
                        <!--                                   placeholder="Страна"-->
                        <!--                                   :class="{'is-invalid': userForm.errors.country }"-->
                        <!--                            >-->


                        <Select2 v-model="country"
                                 ref="country"
                                 :settings="countryOptions"
                                 @change="changeCountry($event)"
                                 @select="selectCountry($event)"
                                 :class="{'is-invalid': userForm.errors.country }"
                        />
                        <div v-if="userForm.errors.country" class="invalid-feedback">
                          {{ userForm.errors.country }}
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-xl-6">
                      <div class="mb-3">
                        <label for="city" class="form-label">Город</label>
                        <!--                            <input v-model="userForm.city"-->
                        <!--                                   type="text"-->
                        <!--                                   class="form-control"-->
                        <!--                                   id="city"-->
                        <!--                                   placeholder="Город"-->
                        <!--                                   :class="{'is-invalid': userForm.errors.city }"-->
                        <!--                            >-->

                        <Select2 v-model="city"
                                 ref="city"
                                 :disabled="userForm.country === null"
                                 :settings="cityOptions"
                                 @change="changeCity($event)"
                                 @select="selectCity($event)"
                                 :class="{'is-invalid': userForm.errors.city }"
                        />
                        <div v-if="userForm.errors.city" class="invalid-feedback">
                          {{ userForm.errors.city }}
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="mb-3">
                        <label for="address" class="form-label">Улица, дом</label>
                        <input v-model="userForm.street"
                               type="text"
                               class="form-control"
                               id="street"
                               placeholder="Улица, дом"
                               :class="{'is-invalid': userForm.errors.street }"
                               :disabled="this.userForm.city === null"
                        >
                        <div v-if="userForm.errors.street" class="invalid-feedback">
                          {{ userForm.errors.street }}
                        </div>

                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-xl-6">
                      <div class="mb-3">
                        <label for="index" class="form-label">Почтовый Индекс</label>
                        <input v-model="userForm.post_index"
                               type="text"
                               class="form-control"
                               id="post_index"
                               placeholder="Почтовый индекс"
                               :class="{'is-invalid': userForm.errors.post_index }"
                               :disabled="this.userForm.street === null"
                        >
                        <div v-if="userForm.errors.post_index" class="invalid-feedback">
                          {{ userForm.errors.post_index }}
                        </div>
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
  </ProfilerCard>
</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import Select2 from 'vue3-select2-component';
import bs5 from "../../../plugins/bs5";
import ProfilerCard from "../../../Shared/ProfilerCard";
export default {
  name: "Index",
  layout: Layout,
  components: {
    Select2,
    ProfilerCard
  },
  data: () => ({
    photoForm: useForm({ // Для форма закрузки сообщения
      photo: null,
      user_id: null
    }),
    passwordForm: useForm({ // Для формы сброса пароля
      password: null,
      confirm_password: null
    }),
    userForm: useForm({ // Для фоормы с данными пользователя
      name: null,
      email: null,
      street: null,
      post_index: null,
      city: null,
      country: null,
      phone: null
    }),
    city: null, // Для поля города селект
    country: null, // Для поля страны селект
  }),
  computed: {
    user () {
      return this.$page.props.user
    },
    countryOptions () {
      return {
        language: "ru",
        ajax: {
          headers: {
            "Content-Type": 'application/json',
            "Authorization": "Token be33fe1fe0328828d9632c248dcad68166e62740",
            "X-Secret": '23c196abec29f8f3bafeb96f8be339c491a3bb77'
          },
          delay: 500,
          type: "POST",
          url: 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/country',
          data: function (params) {
            return JSON.stringify({query: params.term})
          },
          processResults: function (data) {
            return {
              results: data.suggestions.map((e) => {
                return {
                  text: e.value,
                  id: e.value,
                  country_code: e.data.code
                };
              })
            };
          }
        }
      }
    },
    cityOptions () {
      return {
        language: "ru",
        ajax: {
          headers: {
            "Content-Type": 'application/json',
            "Authorization": "Token be33fe1fe0328828d9632c248dcad68166e62740",
            "X-Secret": '23c196abec29f8f3bafeb96f8be339c491a3bb77'
          },
          delay: 500,
          type: "POST",
          url: 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address',
          data: (params) => {
            return JSON.stringify({
              query: params.term,
              from_bound: { value: "city" },
              to_bound: { value: "settlement" },
              restrict_value: true,
              locations: [
                { country: this.userForm.country }
              ]
            })
          },
          processResults: (data) => {
            return {
              results: data.suggestions.map((e) => {
                return {
                  text: e.data.city,
                  id: e.data.city,
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
      street: this.user.street,
      post_index: this.user.post_index,
      city: this.user.city,
      country: this.user.country,
      phone: this.user.phone
    })
    this.userForm.reset();

      this.country = this.user.country
      this.city = this.user.city
      let newOption = new Option(this.country, this.country, false, false);
      this.$refs['country'].select2.append(newOption).trigger('change');

    newOption = new Option(this.city, this.city, false, false);
    this.$refs['city'].select2.append(newOption).trigger('change');
  },
  methods: {
    clickPhoto () {
      this.$refs['photo'].click()
    },
    uploadPhoto () {
      this.photoForm.post('/profile/upload-photo', {
        preserveState: true,
        preserveScroll: true,
        onStart: () => {
          new bs5.Toast({
            body: 'Изображение отправляется на сервервер, дождитесь окончание загрузки',
            className: 'border-0 bg-warning text-dark',
            btnCloseWhite: false,
            autohide: true,
            delay: 3000
          }).show()
        },
        onSuccess: () => {
          new bs5.Toast({
            body: 'Изображение аккаунта успешно обновлено',
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: 'На сервере произошла ошбка про сохранении изображения',
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
      this.photoForm.reset()
      this.$refs['photo'].value = ''
    },
    updatePassword () {
      this.passwordForm.post('/profile/update-password', {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          new bs5.Toast({
            body: 'Ваш новый пароль установлен',
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: 'Ошибка при сбросе пароля',
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    },
    updateUser () {
      this.userForm.post('/profile/update-info', {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          new bs5.Toast({
            body: 'Профиль успешно обновлён',
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: 'Ошибка при сохранении данных пользователя',
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
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
    },

    changeCountry(val){
      console.log(val);
    },
    selectCountry(data){
      this.userForm.country = data.text
      this.city = null
      this.userForm.city = null
      this.userForm.steet = null
      this.userForm.post_index = null
      console.log(data)
    },

    changeCity(val){
      console.log(data)
      console.log(val);
    },
    selectCity(data){
      console.log(data)
      this.userForm.city =  data.text
      this.userForm.steet = null
      this.userForm.post_index = null
    }
  },
}
</script>

<style scoped>

</style>