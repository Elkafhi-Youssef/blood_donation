<template>
    <div>
        <Header/>
        <div
        class=" my-8 mx-auto min-w-[370px]  flex flex-col md:flex-row items-center  bg-white rounded-lg shadow-lg w-[90%]">
        <div class=" md:w-[45%]  flex flex-col md:flex-col-reverse">

            <div class="mt-4 text-center text-2xl font-bold">
                <h1>{{ profileuser.fullname }}</h1>
            </div>
         <div class="mt-4 flex justify-center">
            <img class="mx-auto h-40 w-40 object-cover rounded-full md:rounded-sm" src="@/assets/img/moi.png" alt="" />
         </div>
        </div>
        <div class="w-full my-8 ">
          <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">

                    <tbody>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-4 whitespace-nowrap   text-xl font-semibold">Age</td>
                        <td class=" text-base  font-light px-6 py-4 whitespace-nowrap">
                          {{ profileuser.age }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Phone</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ profileuser.phone }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">User Type</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ profileuser.role }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold"> Blood Type</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ profileuser.blood_type }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">City</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ profileuser.city }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Email</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ profileuser.email }}
                        </td>

                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="  ">
          <div class=" mb-5 flex justify-center">
              <ul class=" flex justify-center border-b-2 border-second_col w-fit ">
                  <li class="block  border-gray-100 md:border-0 md:p-0 hover:text-second_col  mx-2 cursor-pointer"><router-link to="/profileuser/newrequests"> New</router-link></li>
                  <li class="block  border-gray-100 md:border-0 md:p-0 hover:text-second_col  mx-2 cursor-pointer"><router-link to="/profileuser/appointmentRequests"> Appointments</router-link></li>
                  <li class="block  border-gray-100 md:border-0 md:p-0 hover:text-second_col  mx-2 cursor-pointer"><router-link to="/profileuser/accepted"> Completed</router-link></li>
                  <li class="block  border-gray-100 md:border-0 md:p-0 hover:text-second_col  mx-2 cursor-pointer"><router-link to="/profileuser/cancelRequests"> Canceled</router-link></li>        
              </ul>
          </div>
          <div class=" w-[90%] mx-auto flex justify-center flex-wrap gap-3 mb-4 py-5">
              <router-view/>
              
          </div>
      </div>
        <Footer/>
    </div>
</template>

<script >
import Header from '../../components/user/Header.vue'
import ProfileD from '../../components/user/ProfileD.vue'
import Footer from '../../components/user/Footer.vue'
export default {
    name: 'ProfileUser',
    components: {
        Header,
        ProfileD,
        Footer
    },
    computed:{
        profileuser(){
            console.log("profile users data",this.$store.state.profile);
        return this.$store.state.profile
        }
    },
    async  mounted(){
       const user  = localStorage.getItem("user");
      const id = JSON.parse (user).user_id;
      console.log(id);
       await this.$store.dispatch("profileuser",id)
    }
    
}

</script>

<style  scoped>
 .router-link-active{
  color: red;
}

</style>