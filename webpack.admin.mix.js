const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

// Merge any existing manifest
mix.mergeManifest();

mix
  .js("resources/js/admin/app.js", "public/js/admin")
  .extract()
  .vue(3)
  .sass("resources/scss/admin/app.scss", "public/css/admin")
  .sourceMaps()
  .version()
  .disableNotifications()
