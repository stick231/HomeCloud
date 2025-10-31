// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        // 'resources/css/app.css',
        'resources/ts/app.ts',             
        'resources/ts/pages/upload_file.ts'  
      ],
      refresh: true,
    }),
  ],
});
