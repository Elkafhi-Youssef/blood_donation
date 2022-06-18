<template>
  <div class=" ">

    <div class="mt-4">
      <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 sm:w-1/2">
          <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-second_col bg-opacity-75 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
              <div class="text-gray-500">All Users</div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 sm:w-1/2">
          <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3  bg-second_col bg-opacity-75 rounded-full">
              <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="3" y1="21" x2="21" y2="21" />
                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                <line x1="10" y1="9" x2="14" y2="9" />
                <line x1="12" y1="7" x2="12" y2="11" />
              </svg>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
              <div class="text-gray-500">All Hospitals</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8"></div>

    <div class="flex flex-col mt-8">
      <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Name
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  blood type
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  city
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Role
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
              </tr>
            </thead>

            <tbody class="bg-white">
              <tr v-for="(u, index) in users" :key="index">
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full"
                        :src="'http://127.0.0.1/BLOOD_DONATION/backendAPI/public/imgsProfile/' + u.image" alt="" />
                    </div>

                    <div class="ml-4">
                      <div class="text-sm font-medium leading-5 text-gray-900">
                        {{ u.fullname }}
                      </div>
                      <div class="text-sm leading-5 text-gray-500">
                        {{ u.email }}
                      </div>
                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <div class="text-sm leading-5 text-gray-900">
                    {{ u.blood_type }}
                  </div>
                  <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div>
                </td>

                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5  rounded-full">{{ u.city }}</span>
                </td>

                <td class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                  {{ u.role }}
                </td>

                <td
                  class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap">
                  <div class="flex justify-around">
                    <span class="text-yellow-500 flex justify-center">
                      <a @click="showUpdate(u.user_id)" class="mx-2 px-2 rounded-md"><svg
                          xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" viewBox="0 0 20 20"
                          fill="currentColor">
                          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                          <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd" />
                        </svg>
                      </a>
                      
                        <button @click="deleteUser(u.user_id)" class="mx-2 px-2 rounded-md ">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd" />
                          </svg>
                        </button>
                     
                    </span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <div v-if="isShowUpdate" class="absolute top-0 left-0 w-full h-full z-50">
        <div  class="top-0 left-0 w-full h-full fixed flex justify-center items-center">
        <div class=" w-full h-full absolute  bg-black opacity-80 top-0 left-0">
        </div>
          <div class="bg-white rounded-lg sm:shadow-lg md:max-w-3xl sm:w-[32rem] md:w-[80%] mx-auto   absolute left-1/2 -translate-x-1/2 ">
            <div class="bg-white flex flex-col py-2 m-0 sm:m-3 ">
              <!-- <div class="  md:w-1/2  hidden md:flex ">
              <img src="@/assets/img/imglogin.png" alt="">
              </div> -->
              <div class="flex justify-center mb-10">
                <h1 class="text-lg sm:text-2xl md:text-4xl">Update Profile</h1>
              </div>
              <form @submit.prevent="check(userUpdate.user_id)" enctype="multipart/form-data">
                <div class="flex flex-wrap justify-center gap-4 sm:mx-0">
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="fullname" class="form-label inline-block mb-2 text-gray-700">FullNmae</label>
                    <input type="text" v-model="userUpdate.fullname" name="fullname"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                      id="fullname" aria-describedby="fullname" placeholder="Enter FullName" />
                  </div>
                
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="email" class="form-label inline-block mb-2 text-gray-700">Email
                    </label>
                    <input type="email" v-model="userUpdate.email" name="email"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                      id="email" aria-describedby="email" placeholder="Enter Email" />
                  </div>
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="phone" class="form-label inline-block mb-2 text-gray-700">Phone number</label>
                    <input type="tel" v-model="userUpdate.phone" name="phone"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                      id="phone" aria-describedby="phone" placeholder="Enter Phone number" />

                  </div>
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="city" class="form-label inline-block mb-2 text-gray-700">City</label>
                    <input type="text" v-model="userUpdate.city" name="city"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                      id="city" aria-describedby="city" placeholder="Enter City" />
                  </div>
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="age" class="form-label inline-block mb-2 text-gray-700">Age</label>
                    <input type="number" v-model="userUpdate.age" name="age"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                      id="age" aria-describedby="age" placeholder="Enter Age" />
                  </div>
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="role" class="form-label inline-block mb-2 text-gray-700">UserUpdate Type</label>
                    <select v-model="userUpdate.role" name="role" id="role"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none">
                      <option value="">Select</option>
                      <option value="donor">Donor</option>
                      <option value="patient">Patient</option>
                    </select>
                  </div>
                  <div class="form-group mb-0 min-w-[360px]">
                    <label for="bl" class="form-label inline-block mb-2 text-gray-700">Blood Type</label>
                    <select v-model="userUpdate.blood_id" name="blood_id" id=""
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none">
                      <option value="">Select your blood type</option>
                      <option value="1">A+</option>
                      <option value="2">A-</option>
                      <option value="3">B+</option>
                      <option value="4">B-</option>
                      <option value="5">AB+</option>
                      <option value="6">AB-</option>
                      <option value="7">O+</option>
                      <option value="8">O-</option>
                    </select>
                  </div>

                  
                </div>

                <!-- <div class="flex justify-between items-center mb-6">
            <a
              href="#!"
              class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
              >Forgot password?</a
            >
          </div> -->
                <button type="submit" class="
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
                  ">
                  Update
                </button>
              </form>
            </div>
          </div>
      <div @click="()=>isShowUpdate = false"  class=" absolute top-2 right-3 text-white cursor-pointer text-2xl">X</div>
          </div>

    </div>
    <!-- <form action="https://api.web3forms.com/submit" method="POST">

    <input type="hidden" name="access_key" value="e2157fd2-8db7-4179-833c-038e23416e61">

    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <textarea name="message" required></textarea>
    <input type="hidden" name="redirect" value="https://web3forms.com/success">

    <button type="submit">Submit Form</button>

</form> -->
  </div>
</template>

<script setup>
import { computed } from '@vue/reactivity';
import { onMounted, ref } from 'vue';
import { useStore } from 'vuex';
import Footer from "../../components/user/Footer.vue";
import { defineComponent } from "vue";
// import the library
import { createToast } from "mosha-vue-toastify";
// import the styling for the toast
import "mosha-vue-toastify/dist/style.css";
import swal from 'sweetalert';
import axios from 'axios';

let keyword =ref('')
let userUpdate = ref(
  {
    user_id:'',
    fullname: '',
    phone: "",
    email: "",
    city: "",
    role: "",
    blood_id: '',
    age: "",
  })
const store = useStore();
let isShowUpdate = ref(false)
async function showUpdate(id) {
  console.log(id)
  await store.dispatch('profileuser',id)
  console.log(store.state.profile)
  userUpdate.value.fullname = store.state.profile.fullname
  userUpdate.value.phone = store.state.profile.phone
  userUpdate.value.email = store.state.profile.email
  userUpdate.value.city = store.state.profile.city
  userUpdate.value.role = store.state.profile.role
  userUpdate.value.blood_id = store.state.profile.blood_id
  userUpdate.value.age = store.state.profile.age
  userUpdate.value.user_id = store.state.profile.user_id
  isShowUpdate.value = true;
 
}
function check(id){
    if(userUpdate.value.fullname ==''|| userUpdate.value.phone == '' || userUpdate.value.email== ''|| userUpdate.value.city == '' || userUpdate.value.role =='' ||userUpdate.value.blood_id == '' ||userUpdate.value.age=='' ){
       createToast({
            title: 'Error',
            description: 'Please fill all the fields'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'red',
            type: 'warning',
            })
            return false;
    }else{
      console.log('before work update',id);
      update(id);
    }
}
 async function update(){
   console.log(store.state.isUpdateProfileByAdmin);
 await store.dispatch('updateUserByAdmin',userUpdate.value)
   console.log('n3arfo ax kayn hna ',store.state.isUpdateProfileByAdmin);
 if(store.state.isUpdateProfileByAdmin == true){
  console.log('updated done');
  await store.dispatch('getAllUsersAdmin')
  isShowUpdate.value = false;
  createToast({
            title: 'Success',
            description: 'Update done  Successful'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'green',
            type: 'success',
            })
 }else{
    createToast({
            title: 'Error',
            description: 'User didn t update Successful'
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
async function deleteUser(id){
  console.log(id);
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this user",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    console.log('ok')
    axios.post("http://127.0.0.1/BLOOD_DONATION/backendAPI/User/deleteUserByAdmin/"+id, {
        headers: {
           "Content-Type": "application/json",
        },
        
      }).then(response =>{
        console.log(response);
        if(response.data.message == "success"){
          store.dispatch('getAllUsersAdmin')
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
  
        }else{
           swal("Poof! Your imaginary file has been deleted!", {
            icon: "warning",
          });
        }
      })  
   
  }
});
}
// const users = computed(() => {
//   return store.state.allUsersAdmin
// })
const xihaja= ref('yousef')
const key = computed(()=>{
  // return store.state.keyword

  xihaja.value
  }
)
const users = computed(()=>{
 const key = keyword.value = store.getters.getKeyword
  return store.state.allUsersAdmin.filter((element)=>{
    return element.fullname.toLowerCase().indexOf(key) > -1;
  })
})

        


onMounted(async () => {
  await store.dispatch('getAllUsersAdmin')
  console.log("all users  in page users", users)
})

</script>
