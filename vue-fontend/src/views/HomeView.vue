<template>
  <h1 class="text-3xl text-main">Home page</h1>
  <div class="grid grid-cols-2 gap-6">

  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'HomeView',
  async mounted(){
    await axios.get('api/posts')
    .then(response => console.log(response.data))
  }
}
</script>