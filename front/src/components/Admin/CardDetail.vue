<template>
<!---------------------------------table-view-student------------------------->
<tbody>
    <tr>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span class="flex justify-center"><img :src="require('../../assets/user_male.png')" width="54"></span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.id}}</span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.first_name}} {{data.last_name}}</span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.gender}}</span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.batch.generation}} {{data.class.class}}</span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.phone_number}}</span></td>
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.email}}</span></td>
        <!-- <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all"><span>{{data.password}}</span></td> -->
        <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all text-white justify-center">
            <span class="flex justify-center space-x-2">
                <li @click="editData(data.id)" class="fa fa-edit text-blue-500 text-3xl py-0.5"></li>
                <li @click="removeList(data.id)" class="fa fa-trash-o text-red-500 text-3xl"></li>
            </span>
        </td>
    </tr>
</tbody>
<!-------------------------------------end-view-------------------------------->
<div class="container">
    <div class="modal-mask" v-if="showModal==true">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
                <!-------------------form-edit---------------------------->
                <form @submit.prevent="updateData(data.id)">
                    <div class="flex border-circle justify-center">
                        <img :src="require('../../assets/profile.png')" width="110">
                    </div>
                    <p class="mb-2"></p><hr>
                    <div class="w-100 flex justify-between space-x-4 mt-5">
                        <input type="text" class="w-full appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="First Name" v-model="firstName">
                        <input type="text" class="w-full appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Last Name" v-model="lastName">
                    </div>
                    <div class="flex">     
                        <input type="radio" class="radio" value="Male" v-model="gender">
                        <h2 class="ml-1">Male</h2>
                        <input type="radio" class="radio ml-1" value="Female" v-model="gender">
                        <h2 class="ml-1">Female</h2>
                    </div>
                    <input type="text" class="w-full mt-3 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Email" v-model="email">
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
                    <div class="flex justify-center mt-5 mb-4 space-x-4">
                        <button  @click="togle" class="bg-red-500 hover:bg-red-700 text-white font-bold px-5 py-3 rounded focus:outline-none focus:shadow-outline">Cancel</button>
                        <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded focus:outline-none focus:shadow-outline">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from "../../http.js";
import Swal from 'sweetalert2';
export default {
    inject: ['displayData'],
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
        profile:null,
        class_id: 0,
        batch_id: 0,
        admin_id:localStorage.getItem('userId'),
        role:"student",
        ref: this.displayData
      }
    },
    methods: {
        alertPopUP() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your data has been update',
                showConfirmButton: false,
                timer: 1500
            })
        },
        removeList(id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$emit('remove-list', id)
                }
            })
        },
        editData(id){
            this.showModal=!this.showModal
            this.firstName = this.data.first_name , this.lastName = this.data.last_name,
            this.gender = this.data.gender, this.email = this.data.email, this.password = this.data.password, this.profile=this.data.profile,
            this.phoneNumber=this.data.phone_number,this.class_id= this.data.class_id,this.batch_id=this.data.batch_id,this.data.admin_id,this.role,
            id
        },
        updateData(id) {
            let lists = {first_name:this.firstName, last_name:this.lastName,
            gender:this.gender,email:this.email, password:this.password,profile:this.profile,
            phone_number:this.phoneNumber,class_id:this.class_id,batch_id:this.batch_id,admin_id:this.admin_id,role:this.role};
            axios.put('students/' + id, lists)
            .then(() => {
                this.alertPopUP();
                this.ref();
                this.togle();
            })
        },
        togle(){
            this.showModal = !this.showModal
        },
    },
}
</script>

<style scoped>
.fa-trash-o, .fa-edit {
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
tr:hover {
  background: gainsboro;
}
</style>