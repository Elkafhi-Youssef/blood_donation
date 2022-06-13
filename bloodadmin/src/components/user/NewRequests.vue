<template>
<div v-if="!newRequests || !newRequests.length">
  <h1>no new requests</h1>
</div>
  <div v-for="item in newRequest" key="item.request_id" class="  w-[20rem] shadow-lg border-l-2 border-second_col rounded-lg ">
    <div class=" flex justify-between text-xs mb-6 w-[95%] mx-auto mt-1 ">
      <span>{{item.request_date}},{{item.request_time}}</span>
      <span>status:{{item.request_status}}</span>
    </div>
    <div class=" w-[95%] mx-auto">
      <p class=" text-sm">
        {{item.description}}
      </p>
    </div>
    <div class="overflow-hidden">
      <table class="min-w-full ">

        <tbody>
          <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
            <td class="pl-2 py-2 whitespace-nowrap font-medium ">Blood request</td>
            <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
              {{item.blood_type}}
            </td>

          </tr>
          <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
            <td class="px-3 py-2 whitespace-nowrap  font-medium  ">P.Fullname</td>
            <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
             {{item.fullname}}
            </td>

          </tr>
          <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
            <td class="px-3 py-2 whitespace-nowrap  font-medium ">Hospital Name</td>
            <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
             {{item.hospital_name}}
            </td>

          </tr>
          <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col ">
            <td class="px-3 py-2 whitespace-nowrap font-medium rounded-bl-lg"> Hospital City</td>
            <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
              {{item.hospital_city}}
            </td>

          </tr>
        </tbody>
      </table>
      <div class=" flex my-2">
        <a @click="accept(item.request_id)" class="flex px-4 py-2 rounded-md text-sm text-gray-700 bg-third_col hover:bg-second_col hover:text-white cursor-pointer mx-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
          </svg>
          Accept</a>
        <a @click="cancel(item.request_id)"
          class="flex px-4 py-2 rounded-md text-sm text-black bg-third_col hover:bg-second_col hover:text-white cursor-pointer  mx-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
          Cancel</a>
      </div>
    </div>
  </div>
   
 
</template>

<script >
export default {
  name: "NewRequests",
  data() {
    return {
      newRequests:[]

    };
  },
  methods:{
    async accept(id){
      console.log(id)
      await this.$store.dispatch('acceptRequest',id);
      this.$router.push('/profileuser/appointmentRequests')
    },
    async cancel(id){
      console.log(id)
      await this.$store.dispatch('cancelRequest',id);
      this.$router.push('/profileuser/cancelRequests')
    }
  },
  computed:{
    newRequest(){
      this.newRequests = this.$store.state.newRequest
      console.log(this.newRequests);
      return this.$store.state.newRequest
    }
  },
  async mounted() {
    const user = localStorage.getItem("user");
    const id = JSON.parse(user).user_id;
    const token  = localStorage.getItem("token");
    console.log('data of token',token)
    await this.$store.dispatch('getNewRequest', {id:id,token:token});
     if(this.$store.state.tokenExpired ==true){
      // localStorage.removeItem("token");
      // localStorage.removeItem("user");
      // localStorage.removeItem("idProfileDonor");
      // this.$router.push("/loginuser");
      console.log(" here token expired");
    }else{
      console.log("token not expired");
    }


  }
};


</script>

<style lang="scss" scoped>
</style>