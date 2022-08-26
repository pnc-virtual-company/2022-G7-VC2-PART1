<template>
  <div class="student">
    <listView/>
    <Card/>
  </div>

</template>
<script>
import listView  from './ListView.vue'
import Card from "../components/CardView.vue";
export default {
  components:{
    listView,
    Card,
}
}
</script>

<style>
</style>