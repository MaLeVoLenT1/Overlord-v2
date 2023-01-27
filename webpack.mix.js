const mix = require('laravel-mix');
path = require('path');
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

mix.browserSync('localhost/overlord-v2');

mix.setResourceRoot('../');
mix.alias({'@': path.resolve('resources'), 'ext': path.resolve('node_modules'),});


mix.js('resources/js/app.js', 'public/js')
    //Scripts controls Massive Theme
    .js('resources/js/scripts.js', 'public/js')
    .js('resources/js/pages/home.js', 'public/js/pages/').vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'resources/js/lib/visible.js',
    'resources/js/lib/menuzord.js',
    'resources/js/lib/jquery.nav.js',
    'resources/js/lib/wow.min.js',
    'resources/js/lib/owl.carousel.min.js',
    'resources/js/lib/smooth.js',
    'resources/js/lib/bootstrap-filestyle.min.js',
    'resources/js/lib/jquery.ui.touch-punch.min.js',
    'resources/js/lib/jquery.fixedheadertable.js',
], 'public/js/vendor.js');

mix.copyDirectory('resources/img/', 'public/images');
