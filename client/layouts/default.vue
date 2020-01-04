<template>
  <container id="PageTop">
    <hk-header />

    <container-content>
      <nuxt />

      <!-- sidebar-start -->
      <hk-sidebar>
        <contact-form />
      </hk-sidebar>
      <!-- sidebar-end -->
    </container-content>

    <hk-footer />

    <scroll-to-top />
  </container>
</template>

<script>
import Container from '~/components/layouts/Container.vue'
import ContainerContent from '~/components/layouts/ContainerContent.vue'
import hkFooter from '~/layouts/parts/footer.vue'
import hkHeader from '~/layouts/parts/header.vue'
import hkSidebar from '~/components/layouts/Sidebar.vue'

export default {
  components: {
    Container,
    ContainerContent,
    hkFooter,
    hkHeader,
    hkSidebar
  },

  created() {
    this.$router.push({
      name: 'welcome',
    })
  }
}
</script>
