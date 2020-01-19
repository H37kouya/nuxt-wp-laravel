<template>
  <adsbygoogle :ad-slot="adSlot" />
</template>

<script>
export default {
  data() {
    return {
      adSlot: process.env.adSlot1
    }
  }
}
</script>
