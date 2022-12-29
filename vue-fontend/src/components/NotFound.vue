<template>
    <div class="max-w-3xl w-full m-auto py-7 h-[400px] flex items-center justify-center">
        <div class="px-4 text-center">
            <h1 class="text-3xl text-main mb-3">404 Not Found!</h1>
            <p class="mb-2">Your requested page not found! :(</p>
            <button @click="this.$router.go(-1)" class="py-2 px-4 text-white bg-main rounded-md">Go Back</button>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>