const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('website.scss').scripts('website.js');
    mix.copy('resources/assets/fonts/Mopster-Regular.otf', 'public/fonts/Mopster-Regular.otf');
    mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
});
