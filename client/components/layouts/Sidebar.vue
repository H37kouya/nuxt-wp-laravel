<template>
  <article id="sidebar" class="col-lg-3 pl-lg-0">
    <div class="bg-info p-2 m-1 rounded">
      <section>
        <sidebar-header title="おすすめ記事" />

        <div class="pb-4 px-3 row">
          <div v-for="(article, index) in articles" :key="index">
            <card
              :title="article.title.rendered"
              :text="article.meta.description[0]"
              :link="createLink(article.slug)"
              :updated-at="article.modified"
            />
          </div>
        </div>
      </section>
    </div>

    <div>
      <slot />
    </div>

    <div class="p-2">
      <div class="bg-danger py-4 rounded">
        <router-link to="/articles" class="text-white h3">
          <p class="text-center m-0">
            記事一覧へ!!
          </p>
        </router-link>
      </div>
    </div>

    <div>
      <adsense-vertical />
    </div>
  </article>
</template>

<script>
import AdsenseVertical from '~/components/adsense/AdsenseVertical'
import Card from '~/components/global/Card'
import SidebarHeader from '~/components/layouts/SidebarHeader.vue'

export default {
  components: {
    AdsenseVertical,
    Card,
    SidebarHeader
  },

  data() {
    return {
      articles: null
    }
  },

  async created() {
    this.articles = await this.$wp.posts().perPage(5)
  },

  methods: {
    createLink(link) {
      return '/articles' + '/' + link
    }
  }
}
</script>
