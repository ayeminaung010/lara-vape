import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // laravel({
        //     input: [
        //         'resources/css/app.css',
        //         'resources/scss/app.scss',
        //         'resources/js/app.js',
        //     ],
        //     refresh: [
        //         ...refreshPaths,
        //         'app/Http/Livewire/**',
        //     ],
        // }),
        laravel({
            input: ['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
