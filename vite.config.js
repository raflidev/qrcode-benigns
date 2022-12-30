import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/coupons.js',
                'resources/js/header.js',
                'resources/js/users.js',
                'resources/js/transaction.js',
            ],
            refresh: true,
        }),
    ],
});
