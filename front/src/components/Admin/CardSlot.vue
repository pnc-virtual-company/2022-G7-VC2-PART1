<template>
<div class="w-full flex justify-center">
    <div class="container snap-y m-auto bg-gray-300">
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
    /* position: relative; */
    width: 80%;
    margin-top: 190px;
}
</style>