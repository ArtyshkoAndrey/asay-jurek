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

export default {
  name: "Profile",
  layout: Layout,
  data: () => ({
    photoForm: useForm({
      photo: null,
      user_id: null
    })
  }),
  computed: {
    user () {
      return this.$page.props.user
    }
  },
  mounted() {

    this.photoForm.defaults({
      photo: null,
      user_id: this.user.id
    })
    this.photoForm.reset();
  },
  methods: {
    clickPhoto () {
      this.$refs['photo'].click()
    },
    uploadPhoto () {
      this.photoForm.post('/profile/upload-photo', {
      })
      this.photoForm.reset()
      this.$refs['photo'].value = ''
    }
  }
}
</script>

<style scoped>

</style>