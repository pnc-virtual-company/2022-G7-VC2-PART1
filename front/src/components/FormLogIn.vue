<template>
  <div class="form-login">
    <form @submit.prevent="requestLogin">
      <div>
        <h1 class="text-3xl text-center  text-bold">log In</h1>
      </div>
      <div class="input-group my-5">
          <input
            class="
              w-full
              border-b-4
              px-3
              py-2
              rounded-sm
              outline-0
              foucse:outline-none
            "
            type="text"
            placeholder="Email address"
            v-model="email"
          />
      </div>
      <!-- <p v-if="email.length == 0" class="sms color-red">invalid</p> -->
      <div class="input-group my-5">
          <input
            class="
              w-full
              border-b-4
              px-3
              py-2
              rounded-sm
              shadow-sm
              outline-0
              foucse:outline-none
            "
            type="password"
            placeholder="Password"
            v-model="password"
          />
      </div>
      <!-- <p v-if="password.length == 0" class="sms color-red">invalid</p> -->
      <select
        name=""
        v-model="user"
        class="w-full border px-3 py-2 rounded-sm shadow-sm foucse:outline-none"
      >
        <option value="social affiar">social affiar</option>
        <option value="student">student</option>
      </select>
      <div class="my-5">
        <a clss="text-sm text-sky-400">do you forgot password?</a>
      </div>
      <button class="w-full">LogIn</button>
    </form>
  </div>


</template>

<script>

export default {
  data() {
    return {
      email: "",
      password: "",
      user:null
    };
  },
  methods: {
    requestLogin() {
      if (this.email !== '' && this.password !== '' && this.user !== null) {
        this.$emit('reqest-login', { isLogin: true,user:this.user });
        localStorage.setItem('userId', 1);
        this.$router.push({name:'students'})
        
      }
    }
  }
}
</script>

<style scoped>
form {
  padding: 2rem;
  width: 400px;

  margin: 20px auto;
  border-top: 5px solid #390099;
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px,
    rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
}
form input {
  width: 100%;
  margin-top: 10px;
  padding: 1rem;
  background: #fff;
  /* outline: 1px solid black; */
  
}
form button {
background-image: linear-gradient(-20deg, #b721ff 0%, #21d4fd 100%);
  margin-top: 10px;
  border-radius: 5px;
  color:white;
  padding: 10px;
border: none;
}

.color-red {
  color: red;
}
.input-group{
    border-bottom: 1px solid #390099;
}
select{
    margin-top: 10px;
    background: #ffff;
    outline: none;
}

</style>