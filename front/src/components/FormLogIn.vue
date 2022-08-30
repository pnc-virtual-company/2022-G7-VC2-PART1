<template>
  <div
    class="container w-full flex justify-center items-center m-auto h-screen"
  >
    <form
      @submit.prevent="requestLogin"
      class="lg:w-1/2 md:1/2 sm:w-1/2 bg-blue-400"
    >
      <div class="logo m-auto w-1/2">
        <img
          :src="require('/public/images/logo.png')"
          class="m-auto sm:w-1/2 lg:w-28"
          alt=""
        />
      </div>
      <div>
        <h1 class="font-sans lg:text-2xl sm:text-sm text-center text-blue-500">
          LOGIN ACCOUNT
        </h1>
      </div>

      <!-- input field -->
      <div class="input-group w-full flex justify-between items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="w-6 h-6"
        >
          <path
            d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"
          />
          <path
            d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"
          />
        </svg>

        <input
          class="w-full px-3 py-2 rounded-sm outline-0 foucse:outline-none z-0"
          type="email"
          name="email"
          placeholder="Email address"
          v-model="email"
        />
      </div>
      <!-- <p v-if="email.length == 0" class="sms color-red">invalid</p> -->
      <div v-if="!isShow" class="input-group flex justify-between items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="w-6 h-6"
        >
          <path
            fill-rule="evenodd"
            d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
            clip-rule="evenodd"
          />
        </svg>

        <input
          class="
            w-full
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
        <svg
          @click="onShow"
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
          />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
          />
        </svg>
      </div>
      <div v-if="isShow" class="input-group flex justify-between items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="w-6 h-6"
        >
          <path
            fill-rule="evenodd"
            d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
            clip-rule="evenodd"
          />
        </svg>

        <input
          class="
            w-full
            px-3
            py-2
            rounded-sm
            shadow-sm
            outline-0
            foucse:outline-none
          "
          type="text"
          placeholder="Password"
          v-model="password"
        />
        <svg
          xmlns="http://www.w3.org/2000/svg"
          @click="onShow"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
          />
        </svg>
      </div>

      <div class="">
        <!-- <a clss="text-sm text-sky-400">do you forgot password?</a> -->
      </div>
      <button class="w-full">LogIn</button>
    </form>
  </div>
</template>
<!-- <script>
export default {
  setup() {


    return {
      // return something is used
    }
  }
}


</script> -->
<script setup>
// =======module imported =============
import { ref, defineEmits } from "vue";
import { useRouter } from "vue-router";
import axios from "../http.js";

// ===========user's information================================
let email = ref("");
let password = ref("");
let user = ref({});

let emit = defineEmits(["request-login"]);

const router = useRouter();

// =======user login =================
function requestLogin() {
  if (email.value !== "" && password.value !== "") {
    axios
      .post("login", { email: email.value, password: password.value })
      .then((response) => {
        if (response.data.token != undefined) {
          // ============ set token =================
          localStorage.setItem("token", response.data.token);
          localStorage.setItem("userId", response.data.user.id);
          localStorage.setItem("role", response.data.user.role);
          user.value = response.data;

            // ======== passed data to app ========
            router.push({name:'student'})
          emit("request-login", {
            isLogin: true,
          });
          console.log(response.data);
        }
      });

  }
}
// ======= hide and show password =================
let isShow = ref(false);
function onShow() {
  isShow.value = !isShow.value;
}
</script>


<style scoped>
form {
  padding: 2rem;
  background: #fff;
}

form input {
  width: 100%;

  padding: 1rem;
  background: #fff;
}
/* input::-webkit-input-placeholder{
  color: #fff;
} */
form button {
  background: #e07614;
  /* background-image: linear-gradient(-20deg, #b721ff 0%, #21d4fd 100%); */
  margin-top: 10px;
  border-radius: 5px;
  color: white;
  padding: 10px;
  border: none;
}

.color-red {
  color: red;
}

.input-group {
  border-bottom: 1px solid #390099;
}

select {
  margin-top: 10px;
  background: #ffff;
  outline: none;
}
.left-bar {
  background: #22bbea;
}

.container {
  background-image: url("/public/images/mountain.jpg");
  background-repeat: none;
  background-size: cover;
}
</style>
