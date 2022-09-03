<template>
<div class="w-full flex justify-center margin-top">
    <div class="card-body p-5 rounded">
        <slot></slot>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>
.card-body {
    width: 90%;
}
.margin-top {
    margin-top: 5rem;
}
</style>