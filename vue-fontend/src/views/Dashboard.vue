<template>
  <h1 class="text-3xl text-main">Dashboard</h1>
  <Alert :status="status" :message="message" />
  <div v-if="data.length">
    <table class="w-full">
        <tr>
            <th class="text-start">Title</th>
            <th class="text-start">Slug</th>
            <th class="text-end px-3">Created</th>
            <th class="text-end">Delete</th>
        </tr>
        <tr v-for="post in data" :key="post.id" class="text-sm">
            <td class="text-start text-sm py-2">{{ post.title }}</td>
            <td class="text-start text-sm">{{ post.slug }}</td>
            <td class="text-end px-3">{{ post.date }}</td>
            <td class="text-end" @click="deleteBlog(post.id)"><span class="cursor-pointer bg-red-600 py-2 px-3 text-white">Delete</span></td>
        </tr>
    </table>
  </div>
</template>

<script>
import axios from 'axios'
import Alert from '../components/Alert.vue'
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
        Alert
    },
    async mounted() {
        await axios.get('api/posts')
        .then(response => response.data)
        .then(data => this.data = data)
    },
    methods: {
        async deleteBlog(id){
            if(confirm('Are you sure?')){
                await axios.delete(`api/posts/${id}`)
                .then((response) => {
                    if(response.data.status == 'success'){
                    this.status = "success";
                    this.message = "Post has been deleted!";
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