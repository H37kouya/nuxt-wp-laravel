<template>
  <li class="nav-item dropdown">
    <button
      class="btn btn-dark dropdown-toggle"
      data-toggle="dropdown"
    >
      {{ title }}
    </button>
    <div class="dropdown-menu">
      <slot />
    </div>
  </li>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: null
    }
  }
}
</script>
