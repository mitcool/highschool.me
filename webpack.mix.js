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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin/admin.scss', 'public/css/admin/admin.min.css')
   .sass('resources/sass/style.scss','public/css/main/style.min.css')
   .sass('resources/sass/media.scss','public/css/main/media.min.css');


