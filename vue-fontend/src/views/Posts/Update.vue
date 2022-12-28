<template>
  <div>
    <span @click="toggleForm" class="underline text-main">Edit</span>
    <div v-if="showForm" class="w-full flex items-center justify-center h-screen fixed top-0 left-0 z-20 bg-black bg-opacity-75 backdrop-blur-lg" @click.self="toggleForm">
        <div class="max-w-3xl m-auto w-full text-start bg-white p-6 rounded-lg">
            <form @submit.prevent="update">
                <h1 class="text-3xl text-main mb-3">Update Blog</h1>
                <label class="font-semibold">Title:</label>
                <input type="text" v-model="title" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">

                <label class="font-semibold">Description:</label>
                <input type="text" v-model="description" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">

                <label class="font-semibold">Thumbnail:</label>
                <input type="file" @change="onImageChange" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">
                
                <label class="font-semibold">Post:</label>
                <textarea cols="30" rows="4" v-model="post" required class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                <button type="submit" class="bg-main py-2 px-6 rounded-md inline-block text-white">Update</button>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        data: Object
    },
    data(){
        return {
            showForm: false
        }
    },
    methods: {
        toggleForm(){
            this.showForm = !this.showForm
        }
    }
    
}
</script>

<style>

</style>