import axios from 'axios'
import favicons from './src/head/favicon'
require('dotenv').config()
const { join } = require('path')
const { copySync, removeSync } = require('fs-extra')

module.exports = {
  mode: 'universal', // Comment this for SSR

  srcDir: __dirname,

  env: {
    appUrl: process.env.CLIENT_URL || 'http://localhost:3000',
    apiUrl: process.env.API_URL || process.env.APP_URL + '/api',
    appName: process.env.APP_NAME || 'Laravel Nuxt',
    appLocale: process.env.APP_LOCALE || 'en',
    githubAuth: !!process.env.GITHUB_CLIENT_ID,
    adSlot1: process.env.GOOGLE_ADSENSE_SLOT1,
    adSlot2: process.env.GOOGLE_ADSENSE_SLOT2,
    adSlot3: process.env.GOOGLE_ADSENSE_SLOT3
  },

  head: {
    htmlAttrs: {
      lang: 'ja'
    },
    title: process.env.APP_NAME,
    titleTemplate: '%s - ' + process.env.APP_NAME,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.APP_NAME
      },
      {
        hid: 'og:site_name',
        property: 'og:site_name',
        content: process.env.APP_NAME
      },
      { hid: 'og:type', property: 'og:type', content: 'website' },
      { hid: 'og:url', property: 'og:url', content: process.env.CLIENT_URL },
      { hid: 'og:title', property: 'og:title', content: process.env.APP_NAME },
      {
        hid: 'og:description',
        property: 'og:description',
        content: process.env.APP_NAME
      },
      {
        hid: 'og:image',
        property: 'og:image',
        content: '/img/twitter-top.png'
      },
      {
        name: 'msapplication-square70x70logo',
        content: '/favicons/site-tile-70x70.png'
      },
      {
        name: 'msapplication-square150x150logo',
        content: '/favicons/site-tile-150x150.png'
      },
      {
        name: 'msapplication-wide310x150logo',
        content: '/favicons/site-tile-3100x150.png'
      },
      {
        name: 'msapplication-square310x310logo',
        content: '/favicons/site-tile-310x310.png'
      }
    ],
    link: [...favicons],
    script: [{ src: 'https://static.codepen.io/assets/embed/ei.js' }]
  },

  loading: { color: '#007bff' },

  router: {
    middleware: ['locale', 'check-auth']
  },

  css: [{ src: '~assets/sass/app.scss', lang: 'scss' }],

  plugins: [
    '~components/global',
    '~plugins/i18n',
    '~plugins/vform',
    '~plugins/axios',
    '~plugins/fontawesome',
    '~plugins/vue-scrollto',
    '~/plugins/v-lazy-image',
    // '~plugins/nuxt-client-init', // Comment this for SSR
    { src: '~plugins/bootstrap', mode: 'client' }
  ],

  modules: [
    '@nuxtjs/router',
    '@nuxtjs/recaptcha',
    '@nuxtjs/pwa',
    '@nuxtjs/redirect-module',
    // Simple usage
    [
      '@nuxtjs/google-adsense',
      {
        id: process.env.GOOGLE_ADSENSE,
        pageLevelAds: false
        // analyticsUacct: process.env.GOOGLE_ANALYTICS, // アナリティクスと連携する場合のみ必要
        // analyticsDomainName: domain // アナリティクスと連携する場合のみ必要
      }
    ],
    [
      'wp-nuxt',
      {
        endpoint: process.env.WP_URL + '/wp-json',
        extensions: true
      }
    ],
    [
      '@nuxtjs/google-analytics',
      {
        id: process.env.GOOGLE_ANALYTICS
      }
    ],
    '@nuxtjs/sitemap'
  ],

  redirect: [
    // Redirect options here
    // { from: '^/$', to: '/welcome', statusCode: 301 }
  ],

  recaptcha: {
    /* reCAPTCHA options */
    hideBadge: true, // Hide badge element (v3)
    siteKey: process.env.RECAPTCHA_SITE_KEY, // Site key for requests
    version: 3 // Version
  },

  sitemap: {
    path: '/sitemap.xml',
    hostname: process.env.CLIENT_URL,
    gzip: true,
    exclude: [
      /* '/admin/**' */
    ],
    routes: async () => {
      const { data } = await axios.get(`${process.env.API_URL}/sitemap`)

      return data.map((sitemap) => sitemap.url)
    }
  },

  build: {
    extractCSS: true
  },

  hooks: {
    build: {
      done(builder) {
        // Copy dist files to public/_nuxt
        if (
          builder.nuxt.options.dev === false &&
          builder.nuxt.options.mode === 'spa'
        ) {
          const publicDir = join(
            builder.nuxt.options.rootDir,
            'public',
            '_nuxt'
          )
          removeSync(publicDir)
          copySync(join(builder.nuxt.options.generate.dir, '_nuxt'), publicDir)
          copySync(
            join(builder.nuxt.options.generate.dir, '200.html'),
            join(publicDir, 'index.html')
          )
        }
      }
    }
  }
}
