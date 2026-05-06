import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Importe aqui

export default defineConfig({
    plugins: [
        tailwindcss(), // Ative o plugin do Tailwind 4
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});