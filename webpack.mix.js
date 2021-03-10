const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

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
    .react('resources/js/views/frontend/Portfolio.js', 'public/js/pages/portfolio.js')
    .react('resources/js/views/frontend/homepage/Portfolio.js', 'public/js/pages/homepage/portfolio.js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .purgeCss({
        enabled: mix.inProduction(),
        folders: ['src', 'templates', 'resources/views', 'resources/js'],
        extensions: ['html', 'js', 'php', 'vue', 'blade.php'],
        // whitelistPatternsChildren: [/^bg/, /^text/]
    });
