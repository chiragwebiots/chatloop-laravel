const mix = require('laravel-mix');
let glob = require('glob');

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



mix.setPublicPath('./')
   .options({ processCssUrls: false });

// For Admin
mix.sass('resources/assets/admin/scss/vendors/fontawesome.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/flag-icon.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/themify-icons.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/bootstrap.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/datatables.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/dropzone.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/select2.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/vendors/tree.scss', 'public/admin/css/vendors')
   .sass('resources/assets/admin/scss/admin.scss', 'public/admin/css')
   .copyDirectory('resources/assets/admin/js', 'public/admin/js')
   .copyDirectory('resources/assets/admin/fonts', 'public/admin/fonts')
   .copyDirectory('resources/assets/admin/images', 'public/admin/images')
   .sourceMaps();

// TinyMCE
mix.copyDirectory('node_modules/tinymce/icons', 'public/admin/js/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/admin/js/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/admin/js/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/admin/js/tinymce/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/admin/js/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/admin/js/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/admin/js/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/admin/js/tinymce/tinymce.min.js');

// For Frontend
mix.sass('resources/assets/frontend/scss/vendors/fontawesome.scss', 'public/frontend/css/vendors')
   .sass('resources/assets/frontend/scss/vendors/bootstrap.scss', 'public/frontend/css/vendors')
   .sass('resources/assets/frontend/scss/vendors/animate.scss', 'public/frontend/css/vendors')
   .sass('resources/assets/frontend/scss/vendors/owlcarousel.scss', 'public/frontend/css/vendors')
   .sass('resources/assets/frontend/scss/color1.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color2.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color3.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color4.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color5.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color6.scss', 'public/frontend/css')
   .sass('resources/assets/frontend/scss/color7.scss', 'public/frontend/css')
   .copy('resources/assets/frontend/js/bootstrap.min.js', 'public/frontend/js/bootstrap.min.js')
   .copy('resources/assets/frontend/js/jquery-3.3.1.min.js', 'public/frontend/js/jquery-3.3.1.min.js')
   .copy('resources/assets/frontend/js/owl.carousel.min.js', 'public/frontend/js/owl.carousel.min.js')
   .copy('resources/assets/frontend/js/popper.min.js', 'public/frontend/js/popper.min.js')
   .copy('resources/assets/frontend/js/scroll.js', 'public/frontend/js/scroll.js')
   .copy('resources/assets/frontend/js/tilt.jquery.js', 'public/frontend/js/tilt.jquery.js')
   .copy('resources/assets/frontend/js/swiper.min.js', 'public/frontend/js/swiper.min.js')
   .copy('resources/assets/frontend/js/slider.js', 'public/frontend/js/slider.js')
   .copy('resources/assets/frontend/js/script.js', 'public/frontend/js/script.js')
   .copyDirectory('resources/assets/frontend/fonts', 'public/frontend/fonts')
   .copyDirectory('resources/assets/frontend/images', 'public/frontend/images')
   .sourceMaps();

// For Installer
mix.js('resources/assets/install/js/app.js', 'public/install/js/install.js')
   .sass('resources/assets/install/sass/app.scss', 'public/install/css/install.css');
