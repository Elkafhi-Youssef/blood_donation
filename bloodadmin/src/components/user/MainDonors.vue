<template>
  <div
    class="flex flex-col justify-center text-white font-extrabold items-center md:h-[40vh]"
    :style="{
      'background-image': `url(${mainImage})`,
      'background-size': 'cover',
      'background-position': 'center',
    }"
  >
    <div class=" mt-6 text-2xl text-center  sm:text-3xl md:text-4xl  lg:text-5xl  b w-[90%] ">
      <h3>List Of Donors</h3>
    </div>
    <div
      class=" mt-6 mb-6 w-[80%] mx-auto px-2 py-2 bg-white border-2 border-red-400 rounded-lg"
    >
      <form action="">
        <div class="flex md:justify-between flex-col sm:flex-col md:flex-row">
          <div class="flex flex-row border-b border-black w-full mx-2 lg:mx-4">
            <div>
              <img
                class="h-8 w-8"
                src="@/assets/img/bloodpoint.png"
                alt="icon point blood"
              />
            </div>
            <div class="w-full">
              <select
              v-model='selectBlood'
                class="bg-transparent w-full h-10 px-4 py-2 text-gray-700 leading-tight rounded focus:outline-none focus:shadow-outline bg-white border-none"
              >
                <option value="" disabled>Select Blood Group</option>
                <option value="1">A+</option>
                <option value="2">A-</option>
                <option value="3">B+</option>
                <option value="4">B-</option>
                <option value="5">O+</option>
                <option value="6">O-</option>
                <option value="7">AB+</option>
                <option value="8">AB-</option>
                " >
              </select>
            </div>
          </div>
          <div class="flex flex-row border-b border-black w-full mx-2 lg:mx-4">
            <div>
              <img class="h-6 w-6 mt-1" src="@/assets/img/iconcs.png" alt="" />
            </div>
            <div class="w-full">
              <select
              v-model='selecTCity'
                class="bg-transparent w-full h-10 px-4 py-2 text-gray-700 leading-tight rounded focus:outline-none focus:shadow-outline bg-white border-none"
              >
                
               <option selected value="">Select city</option>
                <option v-for="item in cities" :key="item.city" :value="item.city">{{item.city}}</option>
                " >
              </select>
            </div>
          </div>
          <div class="">
            <button
              class="bg-red-500 text-white border md:border-red-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-red-600 transition duration-150 ease-in-out transform hover:(translate-y-1) md:hover:text-black md:hover:bg-transparent mt-2 md:mt-0 w-full"
            >
              Search
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "MainDonors",
  data() {
    return {
      mainImage: require("@/assets/img/hdimg.jpg"),
      cities:[],
      selecTCity :'',
      selectBlood :'',
    };
  },
   methods: {
    getProfileDonor(id) {
      // this.$store.dispatch('getProfileDonor',id);
      console.log(id);
    },
   async searchDonor() {
      console.log(this.selecTCity);
      console.log(this.selectBlood);
      const data = {
        city: this.selecTCity,
        blood: this.selectBlood,
      };
      await this.$store.dispatch('searchDonor',data)
      this.toDonors();
  },
  toDonors() {
    this.$router.push('/donors');
  },
  },
  created() {
    
    
  },
  async mounted() {
    await this.$store.dispatch("getAllCities");
    this.cities = this.$store.state.cities;
  },
};
</script>

<style scoped></style>
