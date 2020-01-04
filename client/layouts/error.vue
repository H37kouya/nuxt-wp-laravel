<template>
  <div class="col-lg-9 pr-lg-0">
    <h1>{{ error.statusCode }}</h1>

    <p v-if="error.statusCode === 404">
      ページが見つかりません
    </p>
    <p v-else>
      エラーが発生しました
    </p>
  </div>
</template>

<script>
export default {
  props: {
    error: {
      type: Object,
      default: null
    }
  }
}
</script>
