<template>
  <div class="px-4">
    <div class="max-w-7xl bg-white rounded-lg m-auto mt-[120px] py-3 overflow-hidden">
      <Navbar />
      <div class="max-w-5xl w-full m-auto py-7">
        <router-view/>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Nav.vue'
export default {
  components: {
    Navbar
  }
}
</script>