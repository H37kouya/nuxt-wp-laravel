<template>
  <div class="index">
    <ul>
      <li>目次</li>

      <li v-for="(obj, index) in articleIndex" :key="index">
        <router-link v-if="obj" v-scroll-to="{ el: obj.id }" to>
          {{ obj.title }}
        </router-link>

        <ul v-if="obj.length !== 0">
          <li
            v-for="(childObj, objIndex) in obj.children"
            v-if="childObj"
            :key="objIndex"
          >
            <router-link v-scroll-to="{ el: childObj.id }" to="">
              {{ childObj.title }}
            </router-link>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    articleIndex: {
      type: [Object, Array],
      default: null
    }
  }
}
</script>
