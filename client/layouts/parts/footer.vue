<template>
  <div>
    <footer id="footer">
      <div class="bg-dark">
        <div class="d-flex justify-content-center">
          <ul class="list-inline my-4 p-2">
            <li class="list-inline-item">
              <router-link
                :to="{ name: 'welcome' }"
                class="text-white"
              >トップページ</router-link>
            </li>
            <li class="list-inline-item">
              <router-link
                v-scroll-to="{ el: '#PageTop' }"
                to=""
                class="text-white"
              >お問い合わせ</router-link>
            </li>
            <li class="list-inline-item">
              <router-link
                to="/articles/intro"
                class="text-white"
              >作成者について</router-link>
            </li>
            <li class="list-inline-item">
              <router-link
                to="/articles/intro-site"
                class="text-white"
              >記録と乗り越えの紹介</router-link>
            </li>
          </ul>
        </div>

        <div class="d-flex justify-content-center flex-wrap pb-3">
          <ul class="list-unstyled px-4">
            <li class="pb-1">
              <router-link
                to="/category/php"
                class="text-white"
              >
                PHP
              </router-link>
            </li>
            <li class="pb-1">
              <router-link
                to="/category/laravel"
                class="text-white"
              >Laravel</router-link>
            </li>
          </ul>

          <ul class="list-unstyled px-4">
            <li class="pb-1">
              <router-link
                to="/category/bootstrap"
                class="text-white"
              >
                Bootstrap
              </router-link>
            </li>
            <li class="pb-1">
              <router-link
                to="/category/uikit"
                class="text-white"
              >uikit</router-link>
            </li>
            <li class="pb-1">
              <router-link
                to="/category/other"
                class="text-white"
              >その他</router-link>
            </li>
          </ul>
        </div>

        <!-- <div class="px-2 pb-2">
        <a
          href="https://twitter.com/share?ref_src=twsrc%5Etfw"
          class="twitter-share-button"
          data-size="large"
          data-hashtags="記録と乗り越え"
          data-lang="ja"
          data-show-count="false"
        >Tweet</a>
        <script
          async
          src="https://platform.twitter.com/widgets.js"
          charset="utf-8"
          type="application/javascript"
        >
        </script>
      </div>-->
      </div>

      <div class="bg-secondary">
        <ul class="list-inline pl-4 py-2 mb-0">
          <!-- <li class="list-inline-item pr-2"><a
              href="/sitemap"
              class=" text-white"
            >サイトマップ</a></li> -->
        </ul>
      </div>

      <div class="py-3 px-2 text-right">
        <small>&copy;2019 {{ copylight }} copylight rights reserved.</small>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      copylight: process.env.appName
    }
  }
}
</script>
