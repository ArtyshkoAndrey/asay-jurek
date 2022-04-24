const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

// Merge any existing manifest
mix.mergeManifest();

mix
  .js("resources/js/users/app.js", "public/js/users")
  .extract()
  .vue(3)
  .sass("resources/scss/users/app.scss", "public/css/users")
  .sourceMaps()
  .version()
  .browserSync('https://asay')