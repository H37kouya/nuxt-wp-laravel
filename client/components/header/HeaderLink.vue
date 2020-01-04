<template>
  <router-link
    :to="link"
    class="dropdown-item"
  >{{ title }}</router-link>
</template>

<script>
export default {
  props: {
    link: {
      type: [String, Object],
      default: null
    },
    title: {
      type: String,
      default: null
    }
  }
}
</script>
