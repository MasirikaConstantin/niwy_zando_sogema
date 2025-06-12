// webpack.mix.js
const mix = require('laravel-mix');


mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/atlantis.min.css',
    'public/assets/plugins/select2/css/select2.min.css',
    'public/assets/css/nimate.min.css',
    'public/assets/css/demo.css'
], 'public/assets/myAllCss.css');

mix.scripts([
    'public/assets/js/core/jquery.3.2.1.min.js',
    'public/assets/js/core/popper.min.js',
    'public/assets/js/core/bootstrap.min.js',
    'public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'public/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
    //'public/assets/js/plugin/moment/moment.min.js',
    //'public/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js',
    //'public/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js',
    'public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
    'public/assets/js/plugin/chart.js/chart.min.js',
    'public/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js',
    'public/assets/js/plugin/chart-circle/circles.min.js',
    //'public/assets/js/plugin/datatables/datatables.min.js',
    'public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
    'public/assets/js/plugin/jqvmap/jquery.vmap.min.js',
    'public/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js',
    //'public/assets/js/plugin/sweetalert/sweetalert.min.js',
    'public/assets/js/atlantis.min.js',
    'public/assets/plugins/select2/js/select2.full.min.js',
    'public/assets/js/setting-demo.js',
    'public/assets/js/demo.js',
    //'public/assets/js/axios.min.js'
], 'public/assets/js/myAllJs.js');

// if (!mix.inProduction()) {
//     mix.browserSync('your-local-dev-url.test');
//     mix.sourceMaps();
// }

// if (mix.inProduction()) {
//     mix.version();
// }