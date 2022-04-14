<template>
  <transition name="nested" :duration="500">
    <div id="big-cart" v-show="opened">
      <button class="btn bg-transparent" @click="switchOpened">Закрыть</button>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, rerum?</p>
    </div>
  </transition>
</template>

<script>
export default {
  name: "BigCart",
  emits: ['switchedOpened'],
  data: () => ({
    opened: false
  }),
  methods: {
    switchOpened () {
      this.opened = !this.opened
      this.$emit('switchedOpened', this.opened)
    }
  }
}
</script>

<style scoped>
.nested-enter-active, .nested-leave-active {
  transition: all 0.3s ease-in-out;
}
/* delay leave of parent element */
.nested-leave-active {
  transition-delay: 0.1s;
}

.nested-enter-from,
.nested-leave-to {
  transform: translateX(200px);
  opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
  transition: all 0.3s ease-in-out;
}
/* delay enter of nested element */
.nested-enter-active .inner {
  transition-delay: 0.25s;
}

.nested-enter-from .inner,
.nested-leave-to .inner {
  transform: translateX(30px);
  /*
  	Hack around a Chrome 96 bug in handling nested opacity transitions.
    This is not needed in other browsers or Chrome 99+ where the bug
    has been fixed.
  */
  opacity: 0.001;
}
</style>