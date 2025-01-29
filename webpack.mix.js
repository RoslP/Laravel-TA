const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .vue()
    .sourceMaps()
    .webpackConfig({
        watchOptions: {
            poll: 1000,
            ignored: /node_modules/,
        }
    });
