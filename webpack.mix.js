const mix = require('laravel-mix');

mix.styles([
    'public/css/vendor/app.css',
    'public/css/vendor/availability-calendar.css',
    'public/css/vendor/bootstrap.css',
    'public/css/vendor/font-awesome.min.css',
    'public/css/vendor/ion.rangeSlider.css',
    'public/css/vendor/ion.rangeSlider.skinFlat.css',
    'public/css/vendor/jquerysctipttop.css',
    'public/css/vendor/linearicons.css',
    'public/css/vendor/magnific-popup.css',
    'public/css/vendor/main.css',
    'public/css/vendor/nice-select.css',
    'public/css/vendor/nouislider.min.css',
    'public/css/vendor/owl.carousel.css',
    'public/css/vendor/themify-icons.css'
], 'public/css/all.css');

mix.scripts([
    'public/js/vendor/jquery-2.2.4.min.js',
    'public/js/vendor/popper.js',
    'public/js/vendor/bootstrap.min.js',
    'public/js/vendor/pricerange.js'
], 'public/js/all.js');

mix.js('resources/js/app.js', 'public/js/app.js');
