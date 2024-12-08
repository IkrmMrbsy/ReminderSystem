const mix = require('laravel-mix');
const path = require('path');

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);

// Jika ingin mengatur path custom untuk output CSS
mix.setPublicPath(path.resolve(__dirname, 'public'));
