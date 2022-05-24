<template>
  <div class="w-screen mb-8 ">
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
        <h3>Avaiable Blood Donors</h3>
      </div>
    </div>
    <div class=" w-screen  ">
      <div class=" mx-2 sm:mx-8 md:mx-16 flex justify-center gap-2 flex-wrap ">
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
              </div>
               <div class=" absolute bottom-0 -right-1">
                  <img class=" h-12 w-auto" src="@/assets/img/btbr.png" alt="">
              </div>
          </div>
          <div class=" relative bg-primary_col flex flex-col text-center w-52  h-28 rounded-xl">
              <div class="">
                  <img class=" mx-auto w-auto h-12" src="@/assets/img/A+.png" alt="">
              </div>
              <div class=" text-white mt-2">
                  <h2>(22)</h2>
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
    };
  },
};
</script>

<style scoped>
</style>