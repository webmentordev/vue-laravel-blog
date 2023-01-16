<template>
  <div>
    <span @click="toggleForm" class="underline text-main">Edit</span>
    <div v-if="showForm" class="w-full flex items-center justify-center h-screen fixed top-0 left-0 z-20 bg-black bg-opacity-75 backdrop-blur-lg" @click.self="toggleForm">
        <div class="max-w-3xl m-auto w-full text-start bg-white p-6 rounded-lg">
            <form @submit.prevent="updateData" class="p-7">
                <h1 class="text-3xl text-main mb-3">Update Blog</h1>
                <label class="font-semibold">Title:</label>
                <input type="text" v-model="title" class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">

                <label class="font-semibold">Description:</label>
                <input type="text" v-model="description" class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">

                <label class="font-semibold">Thumbnail:</label>
                <input type="file" @change="onImageChange" class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out">
                
                <label class="font-semibold">Post:</label>
                <textarea cols="30" rows="6" v-model="post" class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                <button type="submit" class="bg-main py-2 px-6 rounded-md inline-block text-white">Update</button>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [ 'data' ],
    data(){
        return {
            showForm: false,
            title: "",
            description: "",
            post: "",
            image: null
        }
    },
    mounted(){
        this.title = this.data.title,
        this.description = this.data.description,
        this.post = this.data.post
    },
    methods: {
        onImageChange(e){
            this.image = e.target.files[0];
        },
        toggleForm(){
            this.showForm = !this.showForm
        },
        updateData(){
            axios.post(`/api/posts/update/${this.data.id}`, {
                title: this.title,
                description: this.description,
                post: this.post,
                image: this.image
            },{
                headers: { 'Content-type': 'multipart/form-data' }
            }).then(response => {
                console.log(response.data)
            })
        }
    }
    
}
</script>

<style>

</style>