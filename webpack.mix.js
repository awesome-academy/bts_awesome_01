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

mix.copyDirectory('resources/img', 'public/dist/img');
mix.sass('resources/sass/app.scss', 'public/css/common_css/admin/vendor.css');
mix.copy('resources/css/user/styles/tour_create.css', 'public/css/common_css/user/tour_create.css');

mix.styles([
    'public/css/common_css/admin/vendor.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/Ionicons/css/ionicons.min.css',
    'node_modules/admin-lte/dist/css/AdminLTE.css',
    'node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
], 'public/css/common_css/admin/admin.css')
   .styles([
    'public/css/common_css/admin/vendor.css',
    'resources/css/user/plugins/animate.css',
    'resources/css/user/plugins/bootstrap.min.css',
    'resources/css/user/plugins/font-awesome.min.css',
    'resources/css/user/plugins/owl.carousel.css',
    'resources/css/user/plugins/owl.theme.default.css',
    'resources/css/user/styles/main_styles.css',
    'resources/css/user/styles/responsive.css'
], 'public/css/common_css/user/user_home.css');

mix.js([
    'resources/js/bootstrap.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/admin-lte/dist/js/demo.js',
], 'public/js/common_js/admin/admin.js')
   .js([
    'resources/js/bootstrap.js',
    'node_modules/popper.js/dist/popper.js',
    'resources/js/user/plugins/easing.js',
    'resources/js/user/plugins/owl.carousel.js',
    'resources/js/user/styles/custom.js'
], 'public/js/common_js/user/user_home.js');
