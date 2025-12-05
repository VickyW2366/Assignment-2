import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
        tailwindcss(),
    ],
    server: {
        cors:true,
        hmr: {
            host: "stunning-space-lamp-5g7g6795vgrg2j5w-5173.app.github.dev",
            clientPort: 443,
            protocol:'wss',
        },
    }
});