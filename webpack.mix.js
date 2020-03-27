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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/custom-admin.scss', 'public/css');


// mix.styles([
//     'public/vendor/bootstrap.css',
//     'public/vendor/animate.css',
//     'public/vendor/dark.css',
//     'public/vendor/et-line.css',
//     'public/vendor/font-icons.css',
//     'public/vendor/fonts.css',
//     'public/vendor/responsive.css',
//     'public/vendor/restaurant.css',
//     'public/vendor/style.css',
//     'public/vendor/swipper.css',
//     'public/vendor/magnific-popup.css',
// ], 'public/css/all.css');

mix.styles('public/vendor/bootstrap.css', 'public/css/vendor/bootstrap.css');
mix.styles('public/vendor/style.css', 'public/css/vendor/style.css');
mix.styles('public/vendor/dark.css', 'public/css/vendor/dark.css');
mix.styles('public/vendor/font-icons.css', 'public/css/vendor/font-icons.css');
mix.styles('public/vendor/animate.css', 'public/css/vendor/animate.css');
mix.styles('public/vendor/magnific-popup.css', 'public/css/vendor/magnific-popup.css');
mix.styles('public/vendor/swipper.css', 'public/css/vendor/swipper.css');
mix.styles('public/vendor/et-line.css', 'public/css/vendor/et-line.css');
mix.styles('public/vendor/restaurant.css', 'public/css/vendor/restaurant.css');
mix.styles('public/vendor/fonts.css', 'public/css/vendor/fonts.css');
mix.styles('public/vendor/responsive.css', 'public/css/vendor/responsive.css');

