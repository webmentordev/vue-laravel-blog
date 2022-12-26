<template>
  <div class="max-w-lg m-auto px-4">
    <h1 class="text-3xl text-main mb-3">Create Posts</h1>
    <Alert />
    <form @submit.prevent="createPost">
        <label class="font-semibold">Title:</label>
        <input type="text" v-model="title" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">

        <label class="font-semibold">Thumbnail:</label>
        <input type="file" @change="onImageChange" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">
        
        <label class="font-semibold">Post:</label>
        <textarea cols="30" rows="4" v-model="post" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
        <button type="submit" class="bg-main py-2 px-6 rounded-md inline-block text-white">Post</button>
    </form>
  </div>
</template>

<script>
import Alert from '../../components/Alert.vue'
export default {
  data(){
    return {
      title: "",
      post: "",
      image: null
    }
  },
  methods: {
    onImageChange(e){
      this.image = e.target.files[0];
    },
    async createPost(){
      await axios.post("api/posts" , {
        title: this.title,
        post: this.post,
        image: this.image
      },{
        headers: {
          "Content-type": "application/json"
        }
      })
    }
  },
  components: {
    Alert
  }
}
</script>

<style>

</style>