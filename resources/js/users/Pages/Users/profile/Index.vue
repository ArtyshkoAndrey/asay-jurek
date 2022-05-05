<template>
  <ProfilerCard>
    <div class="row">
      <div class="col-12">
        <h3 class="font-weight-bold">{{ $t('Profile.title') }}</h3>
      </div>
    </div>

    <div class="row mt-4">

      <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 profile-image">
        <ImageItem
          v-if="user.url"
          :source="user.url"
          class="img-fluid w-100 px-md-0"
        />

        <img
          v-else
          alt="user"
          class="img-fluid w-100 px-md-0"
          src="/public/img/user.png"
        >

        <form
          id="form-photo"
          enctype="multipart/form-data"
        >

          <input
            id="photo"
            ref="photo"
            accept="image/jpeg,image/png"
            name="photo"
            style="visibility: hidden; width: 100px;"
            type="file"
            @change="uploadPhoto"
            @input="photoForm.photo = $event.target.files[0]"
          >
          <button
            id="add-photo"
            :disabled="photoForm.processing"
            class="btn btn-dark position-absolute"
            type="button"
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
            {{ user.address ?? $t('Profile.nullAddress') }}
          </p>
          <p class="fw-light">
            {{ user.phone ?? $t('Profile.nullPhone') }}
          </p>
        </div>
      </div>

      <hr class="d-block d-md-none mt-3 mt-sm-5">

      <div class="col-12 mt-2">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 order-1 order-md-0 mt-4 mt-md-0">
            <form @submit.prevent="updatePassword">
              <div class="mb-3">
                <label
                  class="form-label"
                  for="password"
                >{{ $t('Profile.inputs.password') }}</label>
                <input
                  id="password"
                  v-model="passwordForm.password"
                  :class="{'is-invalid': passwordForm.errors.password }"
                  class="form-control"
                  :placeholder="$t('Profile.inputs.password')"
                  type="password"
                >
                <div
                  v-if="passwordForm.errors.password"
                  class="invalid-feedback"
                >
                  {{ passwordForm.errors.password }}
                </div>
              </div>
              <div class="mb-3">
                <label
                  class="form-label"
                  for="confirm_password"
                >{{ $t('Profile.inputs.confirm_password') }}</label>
                <input
                  id="confirm_password"
                  v-model="passwordForm.confirm_password"
                  :class="{'is-invalid': passwordForm.errors.confirm_password }"
                  class="form-control"
                  :placeholder="$t('Profile.inputs.confirm_password')"
                  type="password"
                >
                <div
                  v-if="passwordForm.errors.confirm_password"
                  class="invalid-feedback"
                >
                  {{ passwordForm.errors.confirm_password }}
                </div>
              </div>
              <div class="mb-3">
                <button
                  :disabled="passwordForm.processing"
                  class="btn btn-dark fw-light w-100 py-2 text-uppercase"
                  type="submit"
                >
                  <span
                    v-if="passwordForm.processing"
                    aria-hidden="true"
                    class="spinner-grow spinner-grow-sm"
                    role="status"
                  ></span>
                  <span v-else>{{ $t('Profile.buttons.save') }}</span>
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
                    <label
                      class="form-label"
                      for="name"
                    >
                      {{ $t('Profile.inputs.name') }}
                    </label>
                    <input
                      id="name"
                      v-model="userForm.name"
                      :class="{'is-invalid': userForm.errors.name }"
                      class="form-control"
                      :placeholder="$t('Profile.inputs.name')"
                      type="text"
                    >
                    <div
                      v-if="userForm.errors.name"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.name }}
                    </div>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-xl-6">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="email"
                    >
                      Email
                    </label>
                    <input
                      id="email"
                      v-model="userForm.email"
                      :class="{'is-invalid': userForm.errors.email }"
                      class="form-control"
                      placeholder="Email"
                      type="email"
                    >
                    <div
                      v-if="userForm.errors.email"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.email }}
                    </div>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-xl-6">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="phone"
                    >
                      {{ $t('Profile.inputs.phone') }}
                    </label>
                    <input
                      id="phone"
                      v-model="userForm.phone"
                      :class="{'is-invalid': userForm.errors.phone }"
                      class="form-control"
                      :placeholder="$t('Profile.inputs.phone')"
                      type="phone"
                    >
                    <div
                      v-if="userForm.errors.phone"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.phone }}
                    </div>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-xl-6 ">
                </div>

                <div class="col-12 col-sm-12 col-xl-6 ">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="country"
                    >
                      {{ $t('Profile.inputs.country') }}
                    </label>
                    <Select2
                      ref="country"
                      v-model="country"
                      :class="{'is-invalid': userForm.errors.country }"
                      :settings="countryOptions"
                      @change="changeCountry($event)"
                      @select="selectCountry($event)"
                    />
                    <div
                      v-if="userForm.errors.country"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.country }}
                    </div>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-xl-6">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="city"
                    >
                      {{ $t('Profile.inputs.city') }}
                    </label>

                    <Select2
                      ref="city"
                      v-model="city"
                      :class="{'is-invalid': userForm.errors.city }"
                      :disabled="userForm.country === null"
                      :settings="cityOptions"
                      @change="changeCity($event)"
                      @select="selectCity($event)"
                    />
                    <div
                      v-if="userForm.errors.city"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.city }}
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="address"
                    >
                      {{ $t('Profile.inputs.street') }}
                    </label>
                    <input
                      id="street"
                      v-model="userForm.street"
                      :class="{'is-invalid': userForm.errors.street }"
                      :disabled="this.userForm.city === null"
                      class="form-control"
                      :placeholder="$t('Profile.inputs.street')"
                      type="text"
                    >
                    <div
                      v-if="userForm.errors.street"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.street }}
                    </div>

                  </div>
                </div>

                <div class="col-12 col-sm-12 col-xl-6">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="index"
                    >
                      {{ $t('Profile.inputs.post_index') }}
                    </label>
                    <input
                      id="post_index"
                      v-model="userForm.post_index"
                      :class="{'is-invalid': userForm.errors.post_index }"
                      :disabled="this.userForm.street === null"
                      class="form-control"
                      :placeholder="$t('Profile.inputs.post_index')"
                      type="text"
                    >
                    <div
                      v-if="userForm.errors.post_index"
                      class="invalid-feedback"
                    >
                      {{ userForm.errors.post_index }}
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-xl-6">

                      <button
                        :disabled="userForm.processing"
                        class="btn btn-dark fw-light w-100 py-2 text-uppercase"
                        type="submit"
                      >
                        <span
                          v-if="userForm.processing"
                          aria-hidden="true"
                          class="spinner-grow spinner-grow-sm"
                          role="status"
                        ></span>
                        <span v-else>{{ $t('Profile.buttons.save') }}</span>
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
    user() {
      return this.$page.props.user
    },
    countryOptions() {
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
    cityOptions() {
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
              from_bound: {value: "city"},
              to_bound: {value: "settlement"},
              restrict_value: true,
              locations: [
                {country: this.userForm.country}
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
    clickPhoto() {
      this.$refs['photo'].click()
    },
    uploadPhoto() {
      this.photoForm.post('/profile/upload-photo', {
        preserveState: true,
        preserveScroll: true,
        onStart: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onStart.loadingAvatar'),
            className: 'border-0 bg-warning text-dark',
            btnCloseWhite: false,
            autohide: true,
            delay: 3000
          }).show()
        },
        onSuccess: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onSuccess.loadedAvatar'),
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onError.loadedAvatar'),
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
    updatePassword() {
      this.passwordForm.post('/profile/update-password', {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onSuccess.updatePassword'),
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onError.updatePassword'),
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    },
    updateUser() {
      this.userForm.post('/profile/update-info', {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          new bs5.Toast({

            body: this.$t('Profile.Tooltips.onSuccess.updateProfile'),
            className: 'border-0 bg-dark text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        },
        onError: () => {
          new bs5.Toast({
            body: this.$t('Profile.Tooltips.onError.updateProfile'),
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
            autohide: true,
            delay: 3000
          }).show()
        }
      })
    },

    myChangeEvent(val) {
      console.log(val);
    },
    mySelectEvent(data) {
      if (data.qc_complete !== 0) {
        this.userForm.address = null
      }
      console.log(data)
    },

    changeCountry(val) {
      console.log(val);
    },
    selectCountry(data) {
      this.userForm.country = data.text
      this.city = null
      this.userForm.city = null
      this.userForm.steet = null
      this.userForm.post_index = null
      console.log(data)
    },

    changeCity(val) {
      console.log(data)
      console.log(val);
    },
    selectCity(data) {
      console.log(data)
      this.userForm.city = data.text
      this.userForm.steet = null
      this.userForm.post_index = null
    }
  },
}
</script>

<style scoped>

</style>