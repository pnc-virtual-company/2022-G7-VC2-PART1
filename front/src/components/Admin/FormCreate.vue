<template>
    <div class="container flex justify-end mt-0 mr-2">
        <button id="show_modal" @click="togle" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline" type="submit">Add+</button>
    </div>
    <div class="modal-mask" v-if="showModal==true">
      <div class="modal-wrapper">
        <div class="modal-container rounded">
            <form @submit.prevent="addStudent">
                <div class="flex justify-center">
                    <img :src="require('../../assets/profile.png')" width="110">
                </div>
                <p class="mb-2"></p><hr>
                <div class="w-100 flex justify-between space-x-4 mt-5">
                    <input type="text" class="w-full appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="First Name" v-model="firstName">
                    <input type="text" class="w-full appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Last Name" v-model="lastName">
                </div>
                <div class="form-check flex">     
                    <input type="radio" class="radio" value="Male" v-model="gender">
                    <h2 class="ml-1">Male</h2>
                    <input type="radio" class="radio ml-1" value="Female" v-model="gender">
                    <h2 class="ml-1">Female</h2>
                </div>
                <input type="text" class="w-full mt-4 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Email" v-model="email">
                <input type="password" class="w-full mt-5 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Password" v-model="password">
                <input type="number" class="w-full mt-5 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Phone Number" v-model="phoneNumber">
                <input type="file" class="w-full mt-5 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Choose file">
                <div class="flex justify-center mt-5 mb-4">
                    <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline">Submit</button>
                    <button  @click="togle" class="bg-red-500 ml-3 hover:bg-red-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline">Cancel</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
    emits: ['add-data'],
    data(){
        return {
            showModal: false,
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
    methods:{
        alertPopUP() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your data has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        },
        addStudent(){
            let notEmptydata = this.firstName !='' && this.lastName !='' && this.password !='' && this.gender !='' && this.email !='';
            this.$emit('add-data',  
                this.firstName, this.lastName,
                this.gender, this.email, this.password, this.profile,
                this.phoneNumber,this.class_id,this.batch_id,this.admin_id,this.role,
                this.alertPopUP()
            )
            this.firstName = '',
            this.lastName = '',
            this.password = '',
            this.gender = ''
            this.profile = '',
            this.phoneNumber = ''
            this.togle()
            if(!notEmptydata){
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Please completed all your date',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
        togle(){
            this.showModal = !this.showModal
        },
    },
}
</script>
<style>
    .modal-mask {
        position: fixed;
        z-index: 10;
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