<template>
    <div v-if="post.id" class="max-w-3xl m-auto relative">
      <span class="bg-main text-white py-2 px-4 absolute top-3 left-3 rounded-md">{{ post.date }}</span>
      <img :src="post.thumbnail" class="rounded-lg mb-3">
      <h1 class="text-xl mb-3">{{ post.title }}</h1>
      <article class="text-gray-600">
        {{ post.post }}
      </article>
    </div>
    <div v-else>
      <p class="py-2 px-4 text-center">{{ message }}</p>
    </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "SinglePost",
  data(){
    return {
      post: {},
      message: ""
    }
  },
  mounted(){
    this.message = "Loading..."
      axios.get(`/api/posts/${this.$route.params.slug}`)
      .then(response => response.data)
      .then(data => {
        if(data.status != "failed"){
          this.post = data
        }else{
          this.message = "No Data found!"
        }
      }).catch(() => {
          this.message = "No Data found!"
      })
  }
}
</script>

<style>

</style>