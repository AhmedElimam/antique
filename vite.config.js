import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/css/bootstrap.min.css',
                'resources/css/tiny-slider.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': 'bootstrap',
        }
    },
});
