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

mix.js(['resources/js/app.js', 'resources/js/jquery.min.js', 'resources/js/bootstrap.bundle.min.js', 'resources/js/contact_me.js', 'resources/js/jqBootstrapValidation.js','resources/js/jquery.easing.min.js', 'resources/js/agency.min.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/sass/agency.min.css',
    'resources/sass/all.min.css'
], 'public/css/all.css');