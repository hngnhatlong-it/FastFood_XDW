import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['css/app.css', 'js/app.js'], // Giữ nguyên vì file của bạn nằm ở fe/css/...
            refresh: true,
        }),
    ],
    build: {
        // Xuất file build sang thư mục public của backend
        outDir: '../be/public/build',
        emptyOutDir: true,
    }
});