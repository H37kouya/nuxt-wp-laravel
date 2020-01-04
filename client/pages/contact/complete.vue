<template>
  <div class="col-lg-9 pr-lg-0">
    <main-image />

    <div class="m-1 p-2 bg-white border border-secondary rounded">
      <div class="articles">
        <h1>{{ title }}</h1>

        <div
          ref="content"
          class="pt-2"
        ></div>
      </div>
    </div>
  </div>
</template>

<script>
import MainImage from '~/components/layouts/MainImage.vue'

export default {
  layout: 'articlenocontact',

  components: {
    MainImage
  },

  data() {
    return {
      title: 'thank you'
    }
  }
}
</script>
