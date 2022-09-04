<template>
  <div class="home mt-16 bg-gray-100 flex justify-center items-center w-full h-full">
    <div class="container m-auto lg:flex md:flex lg:w-3/4">
      <div class="flex lg:w-2/5 sm:w-3/4 justify-center items-center bg-blue-400">
        <div class="text-group">
            <h1 class="text-2xl text-center p-4 text-white text-bold">Welcome To PN List Mangement System</h1>
            <p class="text-sm text-center p-4 font-normal">
              This application can help admin or social affair Team to handle the
              leave of the student’s
            </p>
            
        </div>
      </div>
      <div class="lg:w-3/5 sm:3/4">

        <img :src="require('../assets/list_manager.png')
        " alt="">
      </div>
    </div>
  </div>

  <router-view></router-view>
</template>