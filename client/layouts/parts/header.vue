<template>
  <header id="header">
    <div class="bg-lightblue">
      <p class="h1 text-white p-2">{{ siteTitle }}</p>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <router-link :to="{ name: 'welcome' }" class="navbar-brand"
          >HOME</router-link
        >

        <no-ssr>
          <button
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#nav1"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="nav1" class="collapse navbar-collapse">
            <ul class="navbar-nav">
              <dropdown-menu title="CSS">
                <header-link title="bootstrap" link="/category/bootstrap" />
                <header-link title="uikit" link="/category/uikit" />
              </dropdown-menu>

              <dropdown-menu title="PHP">
                <header-link link="/category/php" title="php" />
                <header-link link="/category/laravel" title="Laravel" />
              </dropdown-menu>

              <dropdown-menu title="その他">
                <router-link to="/category/news" class="dropdown-item"
                  >お知らせ</router-link
                >
                <router-link to="/articles/intro" class="dropdown-item"
                  >作成者について</router-link
                >
                <router-link to="/articles/intro-site" class="dropdown-item"
                  >記録と乗り越えの紹介</router-link
                >
              </dropdown-menu>
            </ul>
          </div>
        </no-ssr>
      </nav>
    </div>
  </header>
</template>

<script>
import DropdownMenu from '~/components/bootstrap4/DropdownMenu'
// import HeaderNavContainer from '~/components/header/HeaderNavContainer'
import HeaderLink from '~/components/header/HeaderLink'

export default {
  components: {
    DropdownMenu,
    // HeaderNavContainer,
    HeaderLink
  },

  data() {
    return {
      siteTitle: process.env.appName
    }
  }
}
</script>
