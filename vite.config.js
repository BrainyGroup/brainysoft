// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// export default defineConfig({
//     plugins: [
//         laravel([
//             'resources/css/app.css',
//             'resources/js/app.js',
//         ]),
//     ],
// });

import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'


export default defineConfig({
//   plugins: [
//     laravel([
//       'resources/js/app.js',

  //     ]),


  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/css/app.css',
        // 'resources/assets/scss/style.scss',
      ],

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
})
