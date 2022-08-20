<template>
<div class="app">

  <router-link to="/"/>
  <main>
    <router-view/>
  </main>

  <router-link to="/list"/>

</div>

</template>
<script>
export default {
  components:{

  }
}
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,200;1,400;1,500&display=swap");
body{
  margin: 0;
  padding: 0;
  font-family: "Montserrat", sans-serif;
}

  /* #app {
    background: rgb(118, 109, 109);
  } */

nav{

  position: sticky;
  top: 0;
  width: 100%;

  background: #22BBEA;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
  background: #45b6fe;
  height: 12vh;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

nav a.router-link-exact-active{

  background:#FFAD5C;

  /* border-radius: 5px; */
  padding: 5px;

  border-radius: 5px;

  border-bottom: 2px solid orange;

  padding: 2px;

}
nav a{
  border:none; 
  text-decoration: none;
}

.fa-sign-out {
  font-size: 25px;
  color:#5579c6;
  cursor: pointer;
}

</style>