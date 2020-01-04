<template>
  <v-lazy-image
    :src="img.laptopCoffee"
    class="img-fluid rounded border border-secondary"
    alt="パソコンのイメージ"
  />
</template>

<script>
import ImgLaptopCoffee from '~/assets/img/laptop-coffee.jpg'

export default {
  data() {
    return {
      img: {
        laptopCoffee: ImgLaptopCoffee
      }
    }
  }
}
</script>

<style></style>
