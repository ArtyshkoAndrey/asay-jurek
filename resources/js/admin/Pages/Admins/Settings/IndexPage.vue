<template>
  <Head>
    <title>Настройки главного экрана</title>
  </Head>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Настройки главного экрана</h1>
  </div>


  <div class="row gy-3 justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Фотография на главном экране</h5>
          <form
            action="/admin/settings/index-page"
            class="dropzone"
            method="post"
          ></form>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Ссылка на фотографии</h5>
          <div class="mb-3">
            <label for="link">Ссылка</label>
            <input type="text" id="link" class="form-control" v-model="form.link">
          </div>

          <button class="btn btn-dark rounded-0" @click="submit">Сохранить</button>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import Layout from "../../../Shared/Layout";
import {useForm} from "@inertiajs/inertia-vue3";
import bs5 from "../../../../users/plugins/bs5";
import Dropzone from "dropzone";

export default {
  name: "IndexPage",
  layout: Layout,
  components: {},
  data: () => ({
    dropzone: null,
    form: useForm({
      link: null
    })
  }),
  computed: {
    url () {
      return this.$page.props.url
    },
    link () {
      return this.$page.props.link
    },
  },
  mounted() {
    this.dropzone = new Dropzone(".dropzone", {
      addRemoveLinks: true,
      uploadMultiple: false,
      maxFiles: 1,
    });

    if (this.url) {
      let mockFile = { name: this.url, size: 0, accepted: true };
      this.dropzone.emit('addedfile', mockFile)
      this.dropzone.emit("thumbnail", mockFile, this.url);
      this.dropzone.emit("complete", mockFile);
      this.dropzone.emit("success", mockFile);
      this.dropzone.emit("complete", mockFile);
      this.dropzone.files.push(mockFile);
    }

    if (this.link) {
      this.form.defaults({
        link: this.link
      }).reset()
    }

    this.dropzone.on("success", this.success)
    this.dropzone.on("removedfile", this.removedfile)
    this.dropzone.on("maxfilesexceeded", this.maxfilesexceeded)
  },
  beforeUnmount() {
    this.dropzone.disable()
    this.dropzone = null
  },
  methods: {
    success (file) {
      console.log(file)
    },
    removedfile (file) {
      axios.post('/admin/settings/index-page/delete')
    },
    maxfilesexceeded (file) {
      this.dropzone.removeAllFiles();
      this.dropzone.addFile(file);
    },
    submit () {
      this.form.post('/admin/settings/index-page/link')
    }
  }
}
</script>

<style
  lang="scss"
>
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