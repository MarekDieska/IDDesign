import fs from 'fs';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        https: {
            key: fs.readFileSync('./certs/localhost-key.pem'),
            cert: fs.readFileSync('./certs/localhost.pem'),
        },
        host: 'localhost',
        port: 5173,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
