const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

if (['admin', 'users'].includes(process.env.npm_config_section)) {
  require(`${__dirname}/webpack.${process.env.npm_config_section}.mix.js`)
} else {
  // console.log(
  //   '\x1b[41m%s\x1b[0m',
  //   'Provide correct --section argument to build command: user or admin'
  // )
  // throw new Error('Provide correct --section argument to build command!')
}
