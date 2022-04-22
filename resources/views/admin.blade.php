<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">
  <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet"/>
  <script src="{{ mix('/js/admin/manifest.js') }}" defer></script>
  <script src="{{ mix('/js/admin/vendor.js') }}" defer></script>
  <script src="{{ mix('/js/admin/app.js') }}" defer></script>
</head>

<body>
  @inertia
</body>

</html>