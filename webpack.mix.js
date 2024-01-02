const mix = require('laravel-mix');

// Compile CSS
mix.styles([
    // 'public/assets/cdn-bootstraps-v5.3.2/bootstrap-css/bootstrap.min.css',
    'public/assets/cdn-datatable-1.11.5/jquery.dataTables.min.css',
    'public/assets/style.css',
    'public/assets/css/font-awesome-all-v5.15.4.min.css',
], 'public/css/app.css');

// Compile JS
mix.scripts([
    'public/assets/cdn-bootstraps-v5.3.2/bootstrap-js/bootstrap.min.js',
    'public/assets/cdn-datatable-1.11.5/jquery.dataTables.js',
    'public/assets/js/jquery/jquery-3.6.0.min.js', // You should only have one jQuery version
    // 'public/assets/js/jquery/jquery-3.5.1.min.js', // This is commented out because you should not include two versions of jQuery
], 'public/js/app.js');

// Versioning files for cache busting (only in production)
if (mix.inProduction()) {
    mix.version();
}