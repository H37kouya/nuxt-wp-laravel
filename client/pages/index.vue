<template>
  <div class="col-lg-9 pr-lg-0">
    <div class="m-1 p-2 bg-white border border-secondary rounded">
      <div :id="articlesId" class="articles">
        <h1>{{ title }}</h1>

        <article-index :article-index="index" />

        <div ref="content" class="pt-2">
          <div v-html="content"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ArticleBreadcrumbes from '~/components/article/ArticleBreadcrumbs.vue'
import ArticleIndex from '~/components/article/ArticleIndex.vue'
import CreateIndex from '~/src/Index/CreateIndex.js'
import MainImage from '~/components/layouts/MainImage.vue'

export default {
  layout: 'article',

  components: {
    ArticleBreadcrumbes,
    ArticleIndex,
    MainImage
  },

  async asyncData({ app, store, params, error }) {
    try {
      return {
        // article: await app.$wp.frontPage()
        article: await app.$wp.slug().name('home')
      }
    } catch {
      return error({
        statusCode: '500',
        message: 'Internal Server Error'
      })
    }
  },

  data() {
    return {
      articlesId: null,
      content: null,
      title: process.env.appName,
      index: null
    }
  },

  created() {
    const _article = this.article

    if (!_article.content.protected) {
      this.content = _article.content.rendered
    }

    this.articlesId = _article.id
  },

  mounted() {
    const h2Element = this.$refs.content.querySelectorAll('h2')
    const h3ElementList = this.$refs.content.querySelectorAll('h3')
    const h3ElementArrayLength = h3ElementList.length
    this.index = CreateIndex(h2Element, h3ElementArrayLength)
  },

  head() {
    return { title: this.title }
  }
}
</script>
