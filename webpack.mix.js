const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/instafeed-main.js', 'public/js')
    .js('resources/js/instafeed-small.js', 'public/js')
    .js('resources/js/chat.js', 'public/js')
    .js('resources/js/chatv2.js', 'public/js')


    .sass('resources/sass/chat.scss', 'public/css')
    .sass('resources/sass/chatv2.scss', 'public/css')
    .sass('resources/sass/sitebuilder.scss', 'public/css')
    .sass('resources/sass/edit_slider.scss', 'public/css')


    .sass('resources/sass/admin.scss', 'public/css/admin')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    });

    