import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/assets/css/bootstrap.min.css',
                'public/assets/css/atlantis.min.css',
                'public/assets/plugins/select2/css/select2.min.css',
            ],
            refresh: true,
        }),
    ],
});
