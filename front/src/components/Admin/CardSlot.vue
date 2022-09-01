<template>
<div class="w-full flex justify-center mt-5">
    <div class="container m-auto bg-gray-300 rounded">
         <div class="card-body w-full p-4 rounded">
            <slot></slot>
        </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>
.container {
    width: 80%;
}
</style>