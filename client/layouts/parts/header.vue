<template>
  <header id="header">
    <div class="bg-lightblue">
      <p class="h1 text-white p-2">{{ siteTitle }}</p>

      <header-nav-container>
        <router-link :to="{ name: 'welcome' }" class="navbar-brand"
          ><span>HOME</span></router-link
        >

        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#nav1"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <client-only>
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

              <dropdown-menu title="Untiy">
                <header-link link="/category/unity" title="unity" />
              </dropdown-menu>

              <dropdown-menu title="その他">
                <header-link link="/category/news" title="お知らせ" />
                <header-link link="/articles/intro" title="作成者について" />
                <header-link
                  link="/articles/intro-site"
                  title="記録と乗り越えの紹介"
                />
              </dropdown-menu>
            </ul>
          </div>
        </client-only>
      </header-nav-container>
    </div>
  </header>
</template>

<script>
import DropdownMenu from '~/components/bootstrap4/DropdownMenu'
import HeaderNavContainer from '~/components/header/HeaderNavContainer'
import HeaderLink from '~/components/header/HeaderLink'

export default {
  components: {
    DropdownMenu,
    HeaderNavContainer,
    HeaderLink
  },

  data() {
    return {
      siteTitle: process.env.appName
    }
  }
}
</script>
