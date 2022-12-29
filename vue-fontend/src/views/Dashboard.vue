<template>
  <h1 class="text-3xl text-main">Dashboard</h1>
  <Alert :status="status" :message="message" />
  <div v-if="data.length">
    <table class="w-full">
        <tr>
            <th class="text-start px-2">Title</th>
            <th class="text-start">Slug</th>
            <th class="text-end px-3">Created</th>
            <th class="text-end">Delete</th>
            <th class="text-end px-3">Update</th>
        </tr>
        <tr v-for="post in data" :key="post.id" class="text-sm">
            <td class="text-start px-2 text-sm py-2">{{ post.title }}</td>
            <td class="text-start text-sm">{{ post.slug }}</td>
            <td class="text-end px-3">{{ post.date }}</td>
            <td class="text-end" @click="deleteBlog(post.id)"><span class="cursor-pointer bg-red-600 py-2 px-3 text-white rounded-md">Delete</span></td>
            <td class="text-end px-3"><Update /></td>
        </tr>
    </table>
  </div>
</template>

<script>
import axios from 'axios'
import Alert from '../components/Alert.vue'
import Update from './Posts/Update.vue'
export default {
    name: "DashboardView",
    data(){
        return {
            data: [],
            status: '',
            message: ''
        }
    },
    components: {
        Alert,
        Update
    },
    mounted() {
        axios.get('api/posts')
        .then(response => response.data)
        .then(data => this.data = data)
    },
    methods: {
        deleteBlog(id){
            if(confirm('Are you sure?')){
                axios.delete(`api/posts/${id}`)
                .then((response) => {
                    if(response.data.status == 'success'){
                    this.status = "success";
                    this.message = "Post has been deleted!";
                    this.data = this.data.filter((item) => {
                        return item.id !== id
                    });
                    setTimeout(() => {
                        this.status = "";
                        this.message = "";
                    }, 2000)
                    }else{
                        this.status = "failed";
                        this.message = "Something is wrong with form data.";
                        setTimeout(() => {
                            this.status = "";
                            this.message = "";
                        }, 2000)
                    }
                })
            }
        }
    }
}
</script>

<style>

</style>