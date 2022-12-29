<template>
    <div v-if="post" class="max-w-3xl m-auto relative">
      <span class="bg-main text-white py-2 px-4 absolute top-3 left-3 rounded-md">{{ post.date }}</span>
      <img :src="post.thumbnail" class="rounded-lg mb-3">
      <h1 class="text-xl mb-3">{{ post.title }}</h1>
      <article class="text-gray-600">
        {{ post.post }}
      </article>
    </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "SinglePost",
  data(){
    return {
      post: {},
    }
  },
  mounted(){
      axios.get(`/api/posts/${this.$route.params.slug}`)
      .then(response => response.data)
      .then(data => this.post = data)
  }
}
</script>

<style>

</style>