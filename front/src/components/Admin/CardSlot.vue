<template>
<div class="w-full flex justify-center mt-5">
    <div class="container m-auto rounded">
         <div class="card-body w-full p-5 rounded">
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