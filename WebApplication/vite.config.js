import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";


export default ({ mode }) => {
    process.env = Object.assign(process.env, loadEnv(mode, process.cwd(), ''));

    return defineConfig({
        plugins: [
            laravel({
                input: ['resources/js/main.js'],
                refresh: true,
            }),
            vue({
                template: {
                 transformAssetUrls: {
                   base: null,
                   includeAbsolute: false,
                   },
                 },
             }),
        ],
        server: {
            port:  process.env.VITE_PORT,
            host:  process.env.VITE_HOST,
            hmr:{
                host:  process.env.VITE_HOST
            },
            watch:{usePolling: true}
        }
    });
}
