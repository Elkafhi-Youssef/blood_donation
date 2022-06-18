<template>
  <div class=" bg-third_col pb-4">
    <div class="h-24 sm:h-40 flex justify-center items-end" :style="{
      'background-image': `url(${ssHomeimg})`,
      'background-size': 'cover',
      'background-position': 'center',
    }">
      <div class="mb-4 sm:mb-8 md:mb-16 text-2xl text-center text-black font-extrabold w-fit sm:text-4xl md:text-5xl">
        <h3>Avaiable Blood Donors</h3>
      </div>
    </div>
    <div class=" mt-3">
      <div class="mx-2 sm:mx-8 md:mx-16 flex justify-center gap-2 flex-wrap">
        <div v-for="item in users" key="item.user_id" @click="getProfileDonor(item.user_id)" class="flex flex-col text-center w-64">
          <div class="h-48">
            <img class="mx-auto w-full h-full object-fill" :src="'http://127.0.0.1/BLOOD_DONATION/backendAPI/public/imgsProfile/'+item.image" alt="" />
          </div>
          <div class="text-white w-full bg-second_col">
            <div class="flex flex-col mx-auto">
              <h2 class="text-lg mt-3 font-bold">{{item.fullname}}</h2>
              <h3>Blood group {{item.blood_type}}</h3>
              <div class="mt-2 flex w-20 mx-auto">
                <img class="w-6 h-6 mb-2" src="@/assets/img/btimesicon.png" alt="" />
                <span class="mt-1 text-sm">{{item.times}} Times</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { mapActions } from 'vuex';
import { mapState } from 'vuex';
export default {
  name: "SsHome",
  data() {
    return {
      ssHomeimg: require("@/assets/img/sshome.png"),
      users:[]
    }
},
methods:{
  getProfileDonor(id){
    // this.$store.dispatch('getProfileDonor',id);
    console.log(id);
  },
},
  created() {
    
},
async mounted() {
  // this.getusersshome();
 await this.$store.dispatch("getusersshome");
  // this.getusers();
  this.users = this.$store.state.usersshome;



},

}

</script>

<style scoped>
</style>
