<template>
  <div class="col-lg-9 pr-lg-0">
    <article-breadcrumbes />

    <main-image />

    <div class="m-1 p-2 bg-white border border-secondary rounded">
      <div :id="articlesId" class="articles">
        <h1>{{ title }}</h1>

        <article-time :created-at="createdAt" :updated-at="updatedAt" />

        <article-index :article-index="index" />

        <div ref="content" class="pt-2">
          <div v-html="content"></div>
        </div>
      </div>

      <div>
        <adsense-horizontal />
      </div>
    </div>
  </div>
</template>

<script>
import AdsenseHorizontal from '~/components/adsense/AdsenseHorizontal'
import ArticleBreadcrumbes from '~/components/article/ArticleBreadcrumbs.vue'
import ArticleIndex from '~/components/article/ArticleIndex.vue'
import ArticleTime from '~/components/article/ArticleTime.vue'
import CreateIndex from '~/src/Index/CreateIndex.js'
import MainImage from '~/components/layouts/MainImage.vue'

export default {
  layout: 'article',

  components: {
    AdsenseHorizontal,
    ArticleBreadcrumbes,
    ArticleIndex,
    ArticleTime,
    MainImage
  },

  async asyncData({ app, store, params, error }) {
    try {
      const _article = await app.$wp.slug().name(params.slug)
      return { article: _article }
    } catch {
      return error({
        statusCode: '404',
        message: 'Not Found'
      })
    }
  },

  data() {
    return {
      articlesId: null,
      content: null,
      createdAt: null,
      description: null,
      title: null,
      updatedAt: null,
      index: null
    }
  },

  created() {
    const _article = this.article

    if (!_article.content.protected) {
      this.content = _article.content.rendered
    }

    this.articlesId = _article.id
    this.description = _article.meta.description[0]
    this.createdAt = _article.date
    this.title = _article.title.rendered
    this.updatedAt = _article.modified
  },

  mounted() {
    const h2Element = this.$refs.content.querySelectorAll('h2')
    const h3ElementList = this.$refs.content.querySelectorAll('h3')
    const h3ElementArrayLength = h3ElementList.length
    this.index = CreateIndex(h2Element, h3ElementArrayLength)
  },

  head() {
    return {
      title: this.title,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.description
        },
        {
          hid: 'og:description',
          property: 'og:description',
          content: this.description
        },
        { hid: 'og:title', property: 'og:title', content: this.title },
        { hid: 'og:type', property: 'og:type', content: 'article' }
      ]
    }
  }
}
</script>
