<template>
<!--  <div class="ripple">-->
<!--    <div class="ripple__circle"></div>-->
<!--    <div class="ripple__circle ripple__inner-circle"></div>-->
<!--  </div>-->
  <div class="wrapper">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.ripple {
  display: inline-block;
  position: absolute;
  width: 64px;
  height: 64px;

  &__circle {
    position: absolute;
    border: 4px solid rgb(96, 208, 112);
    opacity: 1;
    border-radius: 50%;
    animation: ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
  }

  &__inner-circle {
    animation-delay: -0.5s;
  }
}

@keyframes ripple {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}


.wrapper {
  background: #718096;
  display: flex;
  height: -webkit-fill-available;
  min-width: 100%;
  animation: animateBg 2s ease-in-out infinite;
  justify-content: center;
  align-items: center;
}

@keyframes animateBg {
  0% {
    background: #718096;
  }
  50% {
    background: #a1aec0;
  }
  100% {
    background: #718096;
  }
}
</style>

