<template>
  <div class="material-field">
    <label :class="{
              'small': text !== null && text !== '',
              'is-invalid': error
            }"
           :for="id"
           class="material-label"
    >
      {{ placeholder }}
      <span v-if="required"
            class="text-danger"
      >
        *
      </span>
    </label>
    <input :id="id"
           v-model="text"
           :class="{
             'small': text !== null && text !== '',
             'is-invalid': error
           }"
           :name="name"
           :required="required"
           :type="type"
           class="form-control"
    >
    <div v-if="error"
         class="invalid-feedback"
    >
      {{ error }}
    </div>
  </div>
</template>

<script>
export default {
  name: "material-field",
  emits: ['update:modelValue'],
  props: {
    modelValue: {
      required: true
    },
    name: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      required: false,
      default: 'text'
    },
    id: {
      type: String,
      required: true,
    },
    placeholder: {
      type: String,
      required: true,
    },
    error: {
      type: [String, null],
      required: false,
      default: null
    },
    required: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  data: () => ({
    text: null
  }),
  mounted() {
    this.text = this.modelValue
  },
  watch: {
    modelValue: {
      handler(val) {
        this.text = val
      },
      deep: true
    },
    text: function (val) {
      console.log(val)
      this.$emit('update:modelValue', val);
    }
  },
  methods: {}
}
</script>

<style lang="scss"
       scoped
>
.material-field {
  position: relative;

  input {
    font-size: 18px;
    font-weight: 300;
    color: #232629;
    padding: 21px 24px;

    &.small {
      padding: 32px 24px 10px;
    }
  }

  .material-label {
    font-weight: 300;
    font-size: 18px;
    line-height: 21px;
    color: #6F797C;
    position: absolute;
    transition: all .3s ease;
    top: 24px;
    left: 24px;

    &.small {
      top: 10px;
      transform: none;
      font-weight: 300;
      font-size: 14px;
      line-height: 17px;
    }
  }
}
</style>