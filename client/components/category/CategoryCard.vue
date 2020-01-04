<template>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card mb-2">
      <h3 class="card-header h4 text-white bg-info mt-0 p-4">{{ title }}</h3>
      <div class="card-body">
        <h4
          v-if="subtitle"
          class="h5"
        >{{ subtitle }}</h4>
        <p class="card-text">{{ text }}</p>
        <router-link
          :to="link"
          class="card-link"
        >続きを見る</router-link>
      </div>
      <div class="card-footer text-right small bg-secondary text-white">
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
  }
}
</script>
