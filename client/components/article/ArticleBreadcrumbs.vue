<template>
  <nav v-if="breadcrumbs">
    <div id="breadcrumbs">
      <ol class="breadcrumb breadcrumb-nowrap">
        <li
          v-for="(breadcrumb, index) in breadcrumbs"
          :key="index"
          class="breadcrumb-item"
          :class="{ active: index === breadcrumbs.length - 1 }"
        >
          <router-link
            v-if="index !== breadcrumbs.length - 1"
            :to="breadcrumb.url"
          >
            <fa
              v-if="index === 0"
              icon="home"
              class="mr-1"
            />
            {{ breadcrumb.title }}
          </router-link>

          <span v-else>{{ breadcrumb.title }}</span>
        </li>
      </ol>
    </div>
  </nav>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      breadcrumbs: null
    }
  },

  async created() {
    const apiUrl = process.env.apiUrl
    const getUrl = `${apiUrl}/breadcrumb/${this.$route.params.slug}`
    const query = '?type=' + this.$route.name

    await axios.get(getUrl + query).then((res) => {
      const breadcrumbs = res.data
      this.breadcrumbs = breadcrumbs
    })
  }
}
</script>
