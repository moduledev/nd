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
    .sass('resources/sass/custom-admin.scss', 'public/css');

mix.scripts([
    'resources/js/admin/jquery/jquery.min.js',
    'resources/js/admin/bootstrap/bootstrap.bundle.min.js',
    'resources/js/admin/overlayScrollbars/js/overlayScrollbars.min.js',
    'resources/js/admin/js/adminlte.min.js',
], 'public/js/admin.js');
