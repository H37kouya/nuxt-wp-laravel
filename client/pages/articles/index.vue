<template>
  <div class="col-lg-9 pr-lg-0">
    <article-breadcrumbes />

    <div id="category">
      <h1>{{ title }}記事一覧</h1>

      <h2 class="bg-lightblue text-white p-2 rounded">おすすめ記事</h2>

      <div class="row">
        <category-card
          v-for="(article, index) in articles"
          :key="index"
          :title="article.title.rendered"
          :text="article.title.rendered"
          :link="createLink(article.slug)"
          :updated-at="article.modified"
        />
      </div>
    </div>
  </div>
</template>

<script>
import ArticleBreadcrumbes from '~/components/article/ArticleBreadcrumbs.vue'
import CategoryCard from '~/components/category/CategoryCard.vue'

export default {
  layout: 'article',

  components: {
    ArticleBreadcrumbes,
    CategoryCard
  },

  async asyncData({ app, store, params, error }) {
    try {
      return {
        articles: await app.$wp.posts()
      }
    } catch {
      // handle error
      return error({
        statusCode: '500',
        message: 'Internal Server Error'
      })
    }
  },

  data() {
    return {
      title: null
    }
  },

  created() {
    this.title = this.$route.params.slug ? this.$route.params.slug : ''
  },

  methods: {
    createLink(link) {
      return '/articles' + '/' + link
    }
  }
}
</script>
