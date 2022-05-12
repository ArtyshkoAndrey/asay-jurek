<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >
  <link
    rel="shortcut icon"
    href="{{ asset('img/logo.ico') }}"
    type="image/x-icon"
  >
  <link
    rel="stylesheet"
    href="{{ asset('css/all.css') }}"
  >
  <link
    href="{{ mix('/css/users/app.css') }}"
    rel="stylesheet"
  />
  <script
    src="{{ mix('/js/users/manifest.js') }}"
    defer
  ></script>
  <script
    src="{{ mix('/js/users/vendor.js') }}"
    defer
  ></script>
  <script
    src="{{ mix('/js/users/app.js') }}"
    defer
  ></script>
</head>

<body class="d-flex flex-column h-100">
@inertia


{!! \App\Models\Setting::getYandexMetrics() !!}
</body>

</html>