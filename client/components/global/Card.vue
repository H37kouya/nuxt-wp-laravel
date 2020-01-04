<template>
  <div class="mb-2 px-md-1 px-lg-0 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="h4 card-header-title">{{ title }}</h3>
      </div>

      <div class="card-body">
        <h4
          v-if="isSubtitle()"
          class="card-title h5 my-1"
        >{{ subtitle }}</h4>
        <p class="card-text">{{ text }}</p>
        <router-link
          :to="link"
          class="card-link"
        >詳しく見る</router-link>
      </div>
      <div class="card-footer text-right small">
        <p>
          <time :timedate="_updateAtEmt">
            最終更新日:{{ _updateAtDisplay }}
          </time>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'

export default {
  name: 'Card',

  props: {
    title: { type: String, default: null },
    subtitle: { type: String, default: null },
    text: { type: String, default: null },
    link: { type: String, default: null },
    updatedAt: { type: String, default: null }
  },

  created() {
    this._updateAtEmt = moment(this.updatedAt).format('YYYY-MM-DD')
    this._updateAtDisplay = moment(this.updatedAt).format('YYYY年MM月DD日')
  },

  methods: {
    isSubtitle() {
      return this.subtitle !== null
    }
  }
}
</script>
