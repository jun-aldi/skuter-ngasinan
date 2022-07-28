import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                //vendor
                'public/vendors/feather/feather.css',
                'public/vendors/mdi/css/materialdesignicons.min.css',
                'public/vendors/ti-icons/css/themify-icons.css',
                'public/vendors/typicons/typicons.css',
                'public/vendors/simple-line-icons/css/simple-line-icons.css',
                'public/vendors/css/vendor.bundle.base.css',
                // 'public/vendors/datatables.net-bs4/dataTables.bootstrap4.css',
                'public/js/select.dataTables.min.css',
                'public/css/vertical-layout-light/style.css',
                //js
                'public/vendors/js/vendor.bundle.base.js',
                'public/vendors/chart.js/Chart.min.js',
                'public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js',
                'public/vendors/progressbar.js/progressbar.min.js',
                'public/js/off-canvas.js',
                'public/js/hoverable-collapse.js',
                'public/js/template.js',
                'public/js/settings.js',
                'public/js/todolist.js',
                'public/js/jquery.cookie.js',
                'public/js/dashboard.js',
                'public/js/Chart.roundedBarCharts.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
