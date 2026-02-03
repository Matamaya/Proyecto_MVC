import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
  build: {
    // Esto genera el archivo final en public/dist
    outDir: 'public/dist',
    rollupOptions: {
      input: 'public/css/app.css',
    },
  },
});