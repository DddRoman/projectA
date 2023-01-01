import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { VitePWA } from 'vite-plugin-pwa'

const CACHE_VERSION = '8'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js'
      ],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
        compilerOptions: {
          isCustomElement: tagName => tagName === 'vue-advanced-chat'
        }
      },
    }),
    VitePWA({
      includeAssets: ['favicon.ico', 'apple-touch-icon.png', 'masked-icon.svg'],
      outDir: 'public',
      scope: '/',
      registerType: 'autoUpdate',
      injectRegister: null,
      workbox: {
        clientsClaim: true,
        runtimeCaching: [
          {
            urlPattern: '/assets/',
            options: {
              cacheName: 'bee-assets-v' + CACHE_VERSION
            },
            handler: 'CacheFirst',
          },
          {
            urlPattern: '/images/',
            options: {
              cacheName: 'bee-images-v' + CACHE_VERSION
            },
            handler: 'CacheFirst',
          },
          {
            urlPattern: new RegExp('^https://fonts.(?:googleapis|gstatic).com/(.*)'),
            options: {
              cacheName: 'bee-google-v' + CACHE_VERSION
            },
            handler: 'CacheFirst',
          },
          {
            urlPattern: '/',
            options: {
              cacheName: 'bee-html-v' + CACHE_VERSION
            },
            handler: 'NetworkFirst',
          },
        ],
        // globPatterns: ['**/*.{js,css,html}'],
        navigateFallback: null,
      },
      manifest: {
        start_url: '../',
        scope: '../',
        outDir: 'public',
        name: 'Bee Smart App',
        short_name: 'Beesm.art',
        description: 'App for those who want to be smart',
        theme_color: '#ffffff',
        display: 'standalone',
        orientation: 'portrait',
        icons: [
          {
            "src": "/pwa/android-chrome-192x192.png",
            "sizes": "192x192",
            "type": "image/png"
          },
          {
            "src": "/pwa/android-chrome-512x512.png",
            "sizes": "512x512",
            "type": "image/png"
          },
          {
            "src": "/pwa/android-chrome-512x512.png",
            "sizes": "512x512",
            "type": "image/png",
            "purpose": 'any maskable'
          }
        ]
      }
    })
  ],
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
    },
  },
  css: {
    devSourcemap: true,
  },
});
