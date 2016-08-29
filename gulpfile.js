const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix){
    mix.sass('app.scss')
        .styles([
         'sb-admin-2.css',
         'sb-admin-2.min.css',
         'bootstrap.css',
         'bootstrap.min.css',
         'font-awesome.css',
         'font-awesome.min.css'
         ],'./public/css/admin.css')

         .scripts([
         'sb-admin-2.js',
         'sb-admin-2.min.js',
         'bootstrap.js',
         'bootstrap.min.js',
         'jquery.js',
         'jquery.min.js'
         ],'./public/js/admin.js')
});
