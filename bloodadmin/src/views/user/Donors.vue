<template>
    <div>
        <Header/>
        <MainDonors/>
        <!-- <SsHome/> -->
        <div class=" bg-third_col pb-4">
    <div
      class="h-24 sm:h-40 flex justify-center items-end"
      :style="{
        'background-image': `url(${ssHomeimg})`,
        'background-size': 'cover',
        'background-position': 'center',
      }"
    >
      <div
        class="mb-4 sm:mb-8 md:mb-16 text-2xl text-center text-black font-extrabold w-fit sm:text-4xl md:text-5xl"
      >
        <h3>Avaiable Blood Donors</h3>
      </div>
    </div>
    <div class=" mt-3">
      <div v-if = "donors.length!= 0"  class="mx-2 sm:mx-8 md:mx-16 flex justify-center gap-2 flex-wrap">
        <div  v-for = "item in donors " key="item.user_id" @click="showprofile" class="flex flex-col text-center w-64  cursor-pointer">
          <div class="h-48">
            <img
              class="mx-auto w-full h-full object-fill"
              src="@/assets/img/moi.png"
              alt=""
            />
          </div>
          <div @click="showprofile" class="text-white w-full bg-second_col">
            <div class="flex flex-col mx-auto">
              <h2 class="text-lg mt-3 font-bold">{{item.fullname}}</h2>
              <h3>Blood group A+</h3>
              <div class="mt-2 flex w-20 mx-auto">
                <img
                  class="w-6 h-6 mb-2"
                  src="@/assets/img/btimesicon.png"
                  alt=""
                />
                <span class="mt-1 text-sm">22 Times</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{donors}}
        <Footer/>
    </div>
</template>

<script >
import Header from '../../components/user/Header.vue'
import MainDonors from '../../components/user/MainDonors.vue'
import FsHome from '../../components/user/FsHome.vue'
import SsHome from '../../components/user/SsHome.vue'
import Footer from '../../components/user/Footer.vue'
export default {
    name: 'Donors',
    components: {
        Header,
        MainDonors,
        FsHome,
        SsHome,
        Footer
    },
    data(){
        return{
      ssHomeimg: require("@/assets/img/sshome.png"),
      donors : [],
      dfr:'dire',
        }
    },
    methods :{
        showprofile(){
            // this.$router.push('/profiled')
            console.log("profile");
        }

    },
 async  mounted() {
  // this.getusersshome();
 await this.$store.dispatch("searchDonors");
  // this.getusers();
 this.donors = await this.$store.state.donors;
  console.log(this.$store.state.donors);
},
}

</script>

<style  scoped>

</style>