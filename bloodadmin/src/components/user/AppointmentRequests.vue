<template>
<div v-if="!appointmentRequests || !appointmentRequests.length">
  <h1>no appointment </h1>
</div>
  <div v-for="item in appointmentRequests" key="item.request_id" class="  w-[20rem] shadow-lg border-l-2 border-second_col rounded-lg ">
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
      
    </div>
  </div>
   
 
</template>

<script >
export default {
  name: "appointmentRequests",
  data() {
    return {
      appointmentRequests:[]

    };
  },
  methods:{
    async accept(id){
      console.log(id)
      await this.$store.dispatch('acceptRequest',id);
      this.$router.push("/userprofile")
    }
  },
  computed:{
    appointmentRequests(){
      this.appointmentRequests = this.$store.state.appointmentRequests
      console.log(this.appointmentRequests);
      return this.$store.state.appointmentRequests
    }
  },
  async mounted() {
    const user = localStorage.getItem("user");
    const id = JSON.parse(user).user_id;
    const token  = localStorage.getItem("token");
   await this.$store.dispatch('getAppointmentRequests',{id:id,token:token})


  }
};


</script>

<style lang="scss" scoped>
</style>