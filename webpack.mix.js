const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/js/app.js', 'public/js');
   // .sass('resources/sass/app.scss', 'public/css');

  // mix.styles([
  // 'public/css/master.css',
  // 'public/css/mahdi.css',
  // 'public/css/search_slider.css',
  // 'public/css/owl.carousel.css',
  
  // ], 'public/css/app.css')
     