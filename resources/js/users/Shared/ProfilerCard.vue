<template>
  <div id="profile" class="container">
    <div class="card card-profiler bg-white border-0 rounded-0 mb-5 px-0">
      <div class="card-body px-0 py-0 border-0 rounded-0">
        <div class="row mx-0">

          <div class="col-md-4 col-lg-3 bg-white nav-menu m-0 p-0">
            <div aria-orientation="vertical" class="nav flex-column nav-pills h-100 m-0" role="tablist">
              <Link :class="{ 'active': $page.url === '/profile' }"
                    aria-selected="true"
                    class="nav-link border-0 rounded-0 py-4"
                    href="/profile"
              >
                <i class="fa-light fa-user pe-2"></i>
                {{ $t('Profile.title') }}
              </Link>
              <Link :class="{ 'active': $page.url.startsWith('/profile/order/') || $page.url.startsWith('/profile/orders') }"
                    aria-selected="true"
                    class="nav-link border-0 rounded-0 py-4"
                    href="/profile/orders"
              >
                <i class="fa-light fa-clipboard-list pe-2"></i>
                {{ $t('Profile_Orders.title') }}
              </Link>
            </div>
          </div>

          <div class="col p-4">
            <slot/>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProfilerCard"
}
</script>