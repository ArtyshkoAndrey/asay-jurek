<template>
  <transition :duration="500" name="nested">
    <div v-show="opened" id="big-cart" class="py-3">
      <div class="row mx-0">
        <div class="col-12 bg-white">
          <button class="btn bg-transparent fw-normal text-uppercase ms-auto w-auto d-flex px-3 py-3"
                  @click="switchOpened"
          >
            {{ $t('components.BigCart.close') }}
          </button>
        </div>
      </div>

      <div class="row big-cart-items-list mx-0 gy-md-3 gy-4 mt-0">
        <div v-for="i in 20" class="col-12 item">
          <div class="row">
            <div class="col-4 col-md-4">
              <img alt="Item Name" class="img-fluid border-0" src="https://placeimg.com/720/1280/any">
            </div>
            <div class="col">
              <div class="row">
                <div class="col-12">
                  <h5 class="item-name">ВИНТАЖНОЕ ПАЛЬТО ИЗ ХЛОПКА</h5>
                </div>
                <div class="col-12">
                  <span class="item-price">100 000 ₸ </span>
                </div>
                <div class="col-12">
                  <button class="btn bg-transparent px-0 py-3 mt-2 remove-item">Удалить из корзины</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


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
    switchOpened() {
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
  transition-delay: .1s;
}

.nested-enter-from,
.nested-leave-to {
  transform: translateX(200px);
  opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
  transition: all 1s ease-in-out;
}

/* delay enter of nested element */
.nested-enter-active .inner {
  transition-delay: 10s;
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