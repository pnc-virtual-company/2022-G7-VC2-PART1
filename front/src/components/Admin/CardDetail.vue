<template>
<div class="container">
    <div class="card-detail w-full p-3 mt-3 rounded">
        <div class="flex">
            <img :src="require('../../assets/profile.png')" width="80">
            <div class="w-full flex justify-between">
                <div class="flex justify-center align-center">
                <div class="card-title">
                    <p>{{data.first_name}} {{data.last_name}}</p>
                    <p class="text-gray-500">{{data.email}}</p>
                </div>
                </div>
                <div class="flex justify-center justify-items-center p-2">
                <li class="fa fa-edit text-blue-500 text-3xl mr-2 py-0.5"></li>
                <li class="fa fa-trash text-red-500 text-3xl"></li>
                </div>
            </div>
        </div>
        <button class="w-full flex justify-center m-auto" icon @click="show = !show">
            <div class="text-gray-500"><li class="fa fa-angle-down">{{ show ? '' : '' }}</li></div>
        </button>
        <div v-show="show" class="p-3"><hr>
            <p class="mt-2">StudentID: <span class="text-orange-400">{{data.id}}</span></p>
            <p>ClassID: <span class="text-orange-400">{{data.class_id}}</span></p>
            <p>AdminID: <span class="text-orange-400">{{data.admin_id}}</span></p>
            <p>Gender: <span class="text-orange-400">{{data.gender}}</span></p>
            <p>Class: <span class="text-orange-400">{{data.batch.generation}} {{data.class.class}}</span></p>
            <p>Tel: <span class="text-orange-400">{{data.phone_number}}</span></p>
            <p>Password: <span class="text-orange-400">{{data.password}}</span></p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {data: Object},
    data() {
      return {
        show: false,
        showModal:false,
        firstName:"",
        lastName:"",
        gender:"",
        email:"",
        password:"",
        phoneNumber:"",
        profile: null,
        class_id:1,
        batch_id:1,
        admin_id:1,
        role:"student",
      }
    },
    methods: {
    }
}
</script>

<style scoped>
.card-detail {
  background-color: #fff;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}
.card-detail:hover {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
.fa-trash, .fa-edit {
  cursor: pointer;
}
/* form */
   .modal-mask {
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 35%;
        height: auto;
        margin: 0px auto;
        padding: 15px 28px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }
    .modal-enter-from, .modal-leave-to {
        opacity: 0;
    }

    .modal-enter-active .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    };
    form {
        width: 95%;
    }
    .radio {
        width: 4%;
    }
</style>