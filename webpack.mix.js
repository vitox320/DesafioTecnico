const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/views/site/css/reset.css',
    'resources/views/site/css/style.css'
], 'public/site/css/style.css')
    .scripts([
        'resources/views/site/js/app.js'
    ], 'public/site/js/app.js')
    .scripts([
        'resources/views/site/logradouro/js/logradouro.js'
    ], 'public/site/logradouro/js/logradouro.js')
    .scripts([
        'resources/views/site/perfil/js/perfil.js'
    ], 'public/site/perfil/js/perfil.js')
    .scripts([
        'resources/views/site/usuario/js/usuario.js'
    ], 'public/site/usuario/js/usuario.js')
    .version();
//

