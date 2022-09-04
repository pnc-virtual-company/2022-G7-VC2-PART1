<template>
<div class="container flex justify-end mt-0">
    <button id="show_modal" @click="togle" class="bg-blue-500 hover:bg-blue-700 text-white px-5 py-2.5 rounded focus:outline-none focus:shadow-outline">Add+</button>
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
                <div class="flex justify-between w-full space-x-4">
                    <div class="relative w-full">
                        <h2>Generation</h2>
                        <select class="w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" v-model="batch_id">
                            <option value="" disabled>Choose</option>
                            <option value="1">2022</option>
                            <option value="2">2023</option>
                            <option value="3">2024</option>
                        </select>
                        <div class="mt-1 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-5 mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <div class="relative w-full">
                        <h2>Class</h2>
                        <select class="w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" v-model="class_id">
                            <option value="" disabled>Choose</option>
                            <option value="1">WEB-A</option>
                            <option value="2">WEB-B</option>
                            <option value="3">SNA</option>
                        </select>
                        <div class="mt-1 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-5 mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center space-x-3 mt-5 mb-4">
                    <button  @click="togle" class="bg-red-500 ml-3 hover:bg-red-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline">Cancel</button>
                    <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
    inject: ['userId'],
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
            profile: "",
            class_id: 0,
            batch_id: 0,
            admin_id: localStorage.getItem('userId'),
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
                this.alertPopUP(),
                this.firstName = '',
                this.lastName = '',
                this.password = '',
                this.email = '',
                this.gender = '',
                this.profile = '',
                this.phoneNumber = '',
                this.class_id = '',
                this.batch_id = ''
            )
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
<style scoped>
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
    z-index: 10;
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