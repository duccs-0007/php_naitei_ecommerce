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

mix.styles([
    'public/css/linearicons.css',
    'public/css/font-awesome.min.css',
    'public/css/themify-icons.css',
    'public/css/bootstrap.css',
    'public/css/owl.carousel.css',
    'public/css/nice-select.css',
    'public/css/nouislider.min.css',
    'public/css/ion.rangeSlider.css',
    'public/css/ion.rangeSlider.skinFlat.css',
    'public/css/magnific-popup.css',
    'public/css/main.css',
], 'public/css/app.css');

mix.scripts([
    'public/js/vendor/jquery-2.2.4.min.js',
    'public/js/vendor/bootstrap.min.js',
    'public/js/vendor/popper.min.js',
    'public/js/jquery.ajaxchimp.min.js',
    'public/js/jquery.nice-select.min.js',
    'public/js/nouislider.min.js',
    'public/js/jquery.magnific-popup.min.js',
    'public/js/owl.carousel.min.js',
    'public/js/gmaps.min.js',
    'public/js/jquery.sticky.js',
    'public/js/main.js'
], 'public/js/app.min.js');
