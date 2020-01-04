<template>
  <div v-if="isDisplay()" class="text-right">
    <p v-if="isCreatedDisplay()">
      記事作成日 :
      <time :datetime="_createdAtEmt">{{ _createdAtDisplay }}</time>
    </p>
    <p v-if="isUpdatedDisplay()">
      最終更新日 :
      <time :datetime="_updatedAtEmt">{{ _updatedAtDisplay }}</time>
    </p>
  </div>
</template>

<script>
import moment from 'moment'

export default {
  props: {
    createdAt: {
      type: String,
      default: null
    },
    updatedAt: {
      type: String,
      default: null
    }
  },

  created() {
    this._createdAtEmt = moment(this.createdAt).format('YYYY-MM-DD')
    this._updatedAtEmt = moment(this.updatedAt).format('YYYY-MM-DD')
    this._createdAtDisplay = moment(this.createdAt).format('YYYY年MM月DD日')
    this._updatedAtDisplay = moment(this.updatedAt).format('YYYY年MM月DD日')
  },

  methods: {
    isDisplay() {
      return this.isCreatedDisplay() || this.isUpdatedDisplay()
    },

    isCreatedDisplay() {
      return this.createdAt !== null
    },

    isUpdatedDisplay() {
      return this.updatedAt !== null
    }
  }
}
</script>
