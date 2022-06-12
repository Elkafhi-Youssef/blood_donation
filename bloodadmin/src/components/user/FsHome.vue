<template>
  <div class=" mb-8 ">
    <div
      class="h-24 sm:h-40 flex justify-center items-end "
      :style="{
        'background-image': `url(${fsHomeimg})`,
        'background-size': 'cover',
        'background-position': 'center',
      }"
    >
      <div
        class="
          mb-4
          sm:mb-8
          md:mb-16
          text-2xl text-center text-black
          font-extrabold
          w-fit
          sm:text-4xl
          md:text-5xl
        "
      >
        <h3>Avaiable Blood type</h3>
      </div>
    </div>
    <div class=" w-full ">
      <div class=" mx-2 sm:mx-8 md:mx-16   flex justify-center gap-2 flex-wrap ">
          <div v-if="typeBlood[0]" class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[0].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[1]" class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A-.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[1].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[2]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/B+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[2].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[3]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/B-.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[3].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[4]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/AB+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[4].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[5]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/AB-.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[5].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[6]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/O+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[6].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div v-if="typeBlood[7]"  class=" relative bg-primary_col flex flex-col text-center w-64  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/O-.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>({{typeBlood[7].number_users}})</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
         
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FsHome",
  data() {
    return {
      fsHomeimg: require("@/assets/img/fsHome.png"),
      typeBlood :'',
    };
    },
   
  created() {
    
},
async mounted() {
 await this.$store.dispatch("getBloodTypes");
  this.typeBlood = this.$store.state.typeBlood;
},
};
</script>

<style scoped>
</style>