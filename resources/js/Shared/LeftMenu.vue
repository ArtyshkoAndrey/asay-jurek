<template>
  <transition :duration="500" name="nested">
    <div v-show="opened" id="left-menu">
      <nav class="navbar navbar-expand navbar-light bg-transparent">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarNavPrimary">
            <ul class="navbar-nav text-uppercase justify-content-between w-100">
              <li class="nav-item ps-3">
                <button class="nav-link btn bg-transparent p-0" @click="opened = !opened">
                  <i class="fa-regular fa-xmark"></i>
                </button>
              </li>
              <li class="nav-item pe-3">
                <button class="nav-link btn bg-transparent p-0" @click="openCart">
                  <i class="far fa-shopping-bag"></i>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container left-links-wrapper">
        <div class="row">
         <div class="col-12">
           <ul class="navbar-nav navbar-expand-xxl nav" id="left-links">
             <li class="nav-item dropdown" v-for="i in 20">
               <a href="#"
                  class="nav-link dropdown-toggle"
                  id="category1Dropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
               >
                 Одежда и аксессуары
               </a>
               <ul class="dropdown-menu" aria-labelledby="category1Dropdown">
                 <li class="dropdown-item" v-for="j in 10">
                   <Link href="/">Мужчинам</Link>
                 </li>
               </ul>
             </li>
           </ul>
         </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "LeftMenu",
  data: () => ({
    opened: false,
    smallWidth: false,
  }),
  mounted() {
    if ($(document).width() <= 768) {
      this.smallWidth = true
    }
  },
  methods: {
    switchStatusOpened () {
      if ($(document).width() <= 768) {
        this.smallWidth = true
        this.opened = !this.opened
      }
    },
    openCart () {
      this.$parent.openCart()
    }
  },
  watch: {
    opened: (newVal) => {
      if (newVal) {
        $('body').css('overflow', 'hidden')
      } else {
        $('body').css('overflow', 'auto')
      }
    }
  }
}
</script>

<style scoped>

.nested-enter-active, .nested-leave-active {
  transition: all 0.5s ease-in-out;
}

/* delay leave of parent element */
.nested-leave-active {
  transition-delay: .1s;
}

.nested-enter-from,
.nested-leave-to {
  transform: translateX(-500px);
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
  transform: translateX(100px);
  /*
  	Hack around a Chrome 96 bug in handling nested opacity transitions.
    This is not needed in other browsers or Chrome 99+ where the bug
    has been fixed.
  */
  opacity: 0.001;
}

</style>