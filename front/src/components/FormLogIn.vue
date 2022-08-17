<template>
<form @submit.prevent="onLog">
    <div>
        <h1>log In</h1>
    </div>
    <input  class="w-full border px-3 py-2 rounded-sm shadow-sm foucse:outline-none" type="text" placeholder="Email address" v-model="email">
    <p v-if="email.length==0" class="sms color-red">invalid</p>
    <input class="w-full border px-3 py-2 rounded-sm shadow-sm foucse:outline-none" type="password" placeholder="Password" v-model="password">
        <p v-if="password.length==0" class="sms color-red">invalid</p>
        <select name="" class="w-full border px-3 py-2 rounded-sm shadow-sm foucse:outline-none">
            <option value="social affiar">social affiar</option>
            <option value="student">student</option>
        </select>
    <div>
        <a>do you forgot password?</a>
    </div>
    <button>LogIn</button>
</form>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
      onLog() {
          if (this.email != '' && this.password!='' ) {
              this.$router.push({ name: "student", params: { id: 1 } });
        }
    },
  },
};
</script>

<style scoped>

form{
    padding: 1rem;
    width: 400px;
  
    margin:20px auto;
     border-top: 5px solid #390099;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
}
form input{
    width: 100%;
    margin-top:10px;
    padding: .5rem;
    outline: 1px solid black;
}
form button{
    background: #3a0ca3;
    margin-top: 10px;
    color:#fff;
    /* outline: 2px solid #390099;
    border: 1px solid #390099; */
    border-radius: 5px;
    padding: 10px;
}

.color-red{
    color: red;
}
</style>