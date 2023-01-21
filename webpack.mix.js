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

// mix.browserSync('localhost/overlordappv2');

mix.setResourceRoot('../');
mix.alias({

    '@': path.resolve('resources'),
    'ext': path.resolve('node_modules'),
})


mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/home.js', 'public/js/pages/').vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/img/', 'public/images');
