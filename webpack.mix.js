const {mix} = require('laravel-mix');

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

/**
 * Compile scss
 */
mix.sass('src/Services/Dashboard/resources/assets/scss/custom.scss', 'public/assets/dashboard/css/custom.css');

/**
 * Compile styles
 */
mix.styles([
    'node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css',
    'node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css',
    'node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css',
    'node_modules/adminbsb-materialdesign/plugins/sweetalert/sweetalert.css',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-select/css/bootstrap-select.min.css',
    'node_modules/adminbsb-materialdesign/plugins/dropzone/dropzone.css',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
    'node_modules/adminbsb-materialdesign/css/materialize.css',
    'node_modules/adminbsb-materialdesign/css/style.css',
    'node_modules/adminbsb-materialdesign/css/themes/all-themes.css'
], 'public/assets/dashboard/css/app.css');


/**
 * Compile scripts for admin panel
 */
mix.scripts([
    // Libraries
    'node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js',
    'node_modules/jquery-ui-dist/jquery-ui.js',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js',
    'node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-validation/jquery.validate.js',
    'node_modules/adminbsb-materialdesign/plugins/sweetalert/sweetalert.min.js',
    'node_modules/adminbsb-materialdesign/plugins/dropzone/dropzone.js',
    'node_modules/adminbsb-materialdesign/plugins/momentjs/moment.js',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-inputmask/jquery.inputmask.bundle.js',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-notify/bootstrap-notify.js',
    'node_modules/lodash/lodash.min.js',

    // Custom scripts
    'node_modules/adminbsb-materialdesign/js/admin.js',
    'src/Services/Dashboard/resources/assets/js/app.js'
], 'public/assets/dashboard/js/app.js');

/**
 * Compile scripts for unauthorized pages
 */
mix.scripts([
    // Libraries
    'node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-validation/jquery.validate.js',
    // Custom scripts
    'src/Services/Dashboard/resources/assets/js/unauthorized.js'
], 'public/assets/dashboard/js/unauthorized.js');


/**
 * Copy images
 */
mix.copy('src/Services/Dashboard/resources/assets/images', 'public/assets/dashboard/images', false);

/**
 * Copy fonts
 */
mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap/fonts', 'public/assets/dashboard/fonts', false);



/**
 * Compile assets for 'Website' service
 */

/**
 * Compile scss
 */
mix.sass('src/Services/Website/resources/assets/scss/custom.scss', 'public/assets/website/css/custom.css');