<template>
  <div class="scroll-to-top">
    <router-link
      v-scroll-to="{ el: '#PageTop' }"
      to
      class="scroll-to-top-link"
    >
      <fa
        icon="arrow-circle-up"
        size="4x"
        class="scroll-to-top-icon"
      ></fa>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'ScrollToTop'
}
</script>
