<template>
   <div class="fixed flex bottom-3 right-3">
        <div v-if="status == 'success'" class="flex items-center p-3 rounded-md bg-white max-w-[500px] w-full shadow-xl">
            <i class="fas fa-check p-2 rounded-lg bg-green-600 text-white mr-3"></i>
            <p class="text-gray-700">{{ message }}</p>
        </div>

        <div  v-if="status == 'failed'" class="flex items-center p-3 rounded-md bg-white max-w-[500px] w-full shadow-xl">
            <i class="fas fa-times p-2 rounded-lg bg-red-600 text-white mr-3"></i>
            <p class="text-gray-700">{{ message }}</p>
        </div>
   </div>
</template>

<script>
export default {
    props: {
        status: "",
        message: ""
    }
}
</script>

<style>

</style>