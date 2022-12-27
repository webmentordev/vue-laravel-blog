<template>
    <div class="max-w-3xl w-full m-auto py-7">
        <h1 class="text-3xl text-main">Home page</h1>
        <div class="flex items-center">
            <input
                type="text"
                v-model="search"
                placeholder="Search blog..."
                required
                @change="searchBlog"
                class="w-full mt-2 bg-white rounded border border-gray-300 focus:border-main focus:ring-4 focus:ring-main-half text-base mr-2 outline-none text-gray-700 py-1 px-3 mb-2 leading-8 transition-colors duration-200 ease-in-out"
            />
            <button
                class="bg-main h-fit py-[9px] px-6 rounded-md inline-block text-white"
                @click="searchBlog"
            >
                Search
            </button>
        </div>

        <div v-if="data.length" class="grid grid-cols-2 gap-6 py-3">
            <div v-for="post in data" :key="post.id">
                <div
                    class="rounded-lg mb-3 h-[220px] w-full bg-cover bg-center"
                    :style="{
                        'background-image': 'url(' + post.thumbnail + ')',
                    }"
                ></div>
                <h2 class="text-lg">{{ post.title }}</h2>
                <p class="text-gray-600 mb-2">{{ post.description }}</p>
                <router-link
                    :to="{ path: '/post/' + post.slug }"
                    class="py-2 px-6 rounded-md bg-main text-white inline-block"
                    >Read More<i class="fas fa-caret-right ml-3"></i
                ></router-link>
            </div>
        </div>
        <div class="text-center" v-else>
            <p><i class="fab fa-react animate-spin"></i> Loading blogs...</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "HomeView",
    data() {
        return {
            data: [],
            search: "",
        };
    },
    async mounted() {
        this.fetchData();
    },
    methods: {
        async searchBlog() {
            await axios
                .get(`/api/posts/search/${this.search}`)
                .then((response) => response.data)
                .then((data) => (this.data = data));
            if (this.search == "") {
                this.fetchData();
            }
        },
        async fetchData() {
            await axios
                .get("/api/posts")
                .then((response) => response.data)
                .then(data => this.data = data);
        },
    },
};
</script>
