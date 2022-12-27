<template>
    <nav
        class="py-2 flex px-4 items-center justify-between bg-gray-50 max-w-[98%] m-auto"
    >
        <h1 class="text-2xl mt-1">BigBlogger</h1>
        <div class="flex items-center">
            <router-link class="mx-3 font-semibold" to="/">Home</router-link>
            <router-link class="mx-3 font-semibold" to="/about"
                >About</router-link
            >
            <router-link class="mx-3 font-semibold" to="/dashboard"
                >Dashboard</router-link
            >
            <router-link
                class="ml-3 font-semibold bg-main rounded-md py-2 px-6 text-white"
                to="/create-post"
                >Post</router-link
            >
        </div>
    </nav>
</template>

<script>
export default {};
</script>

<style></style>
