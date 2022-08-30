<template>
  <div>
    <listView/>
    <Card/>
  </div>

</template>
<script>
import listView  from './LeaveView.vue'
import Card from "@/components/UI/CardDetail.vue";
export default {
  components:{
    listView,
    Card,
}
}
</script>

<style>
</style>