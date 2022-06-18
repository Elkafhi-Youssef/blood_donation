<template>
  <div>
    
    <div class="bg-gray-100  flex justify-center items-center py-16">
      <div class="bg-white rounded-lg sm:shadow-lg md:max-w-3xl sm:w-[32rem] md:w-[768px]"
      >
        <div class="bg-white flex flex-col py-2 m-0 sm:m-3">
          <!-- <div class="  md:w-1/2  hidden md:flex ">
            <img src="@/assets/img/imglogin.png" alt="">
        </div> -->
          <div class="flex justify-center mb-10">
            <h1 class="text-lg sm:text-2xl md:text-4xl">Update Profile</h1>
          </div>
          <form @submit.prevent="addHospital" enctype="multipart/form-data">
            <div class="flex flex-wrap justify-center gap-4 sm:mx-0">
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="hospitalname"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Hospital Name</label
                >
                <input
                  type="text"
                  v-model="hospital_name"
                  name="hospitalname"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="hospitalname"
                  aria-describedby="fullname"
                  placeholder="Enter FullName"
                />
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="city"
                  class="form-label inline-block mb-2 text-gray-700"
                  >City</label
                >
                <input
                  type="text"
                  v-model="hospital_city"
                  name="city"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="city"
                  aria-describedby="city"
                  placeholder="Enter Hospital City"
                />
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="address"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Hospital Address</label
                >
                <input
                  type="text"
                  v-model="hospital_address"
                  name="address"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="address"
                  aria-describedby="city"
                  placeholder="Enter Hospital City"
                />
              </div>
            </div>

            <!-- <div class="flex justify-between items-center mb-6">
          <a
            href="#!"
            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
            >Forgot password?</a
          >
        </div> -->
            <button
              type="submit"
              class="
              w-full
                px-6
                py-2.5
                bg-third_col
                text-black
                hover:text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-second_col hover:shadow-lg
                focus:bg-second_col
                focus:shadow-lg
                focus:outline-none
                focus:ring-0
                active:bg-second_col active:shadow-lg
                transition
                duration-150
                ease-in-out
                mt-4
                " 
            >
              Add Hospital
            </button> 
          </form>
        </div>
      </div>
    </div>
   <button @click="todashboard">click</button>
  </div>
</template>

<script setup>

import { defineComponent ,ref} from "vue";
// import the library
import { createToast } from "mosha-vue-toastify";
// import the styling for the toast
import "mosha-vue-toastify/dist/style.css";
import { useRouter } from 'vue-router'
import { useStore } from "vuex";

const router = useRouter()
const store = useStore()

  const  hospital_name=ref('')
  const hospital_city=ref('')
  const hospital_address=ref('')

async function addHospital(){
const data={name:hospital_name.value,city:hospital_city.value,address:hospital_address.value}
await store.dispatch('addHospitalAdmin',data)
console.log('data of addHospitalAdmin',store.state.addHospitalAdmin);
if(store.state.addHospitalAdmin){
  
   createToast({
            title: 'Success',
            description: 'Hospital Added  Successful'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'green',
            type: 'success',
            })
            router.push("/dashboard/hospitals")
}else{
  createToast({
            title: 'Error',
            description: " hospital diddn't add Successful"
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'red',
            type: 'warning',
            })
}
}
function todashboard(){
router.push("/")
}
</script>

<style scoped></style>
