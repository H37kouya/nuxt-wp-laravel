<template>
  <div>
    <h2 class="text-white text-center py-3">
      {{ title }}
    </h2>
  </div>
</template>

<script>
export default {
  props: {
    title: { type: String, default: null }
  }
}
</script>
