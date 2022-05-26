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
                class="bg-transparent w-full h-10 px-4 py-2 text-gray-700 leading-tight rounded focus:outline-none focus:shadow-outline bg-white border-none"
              >
                <option value="">Select Blood Group</option>
                <option value="">A+</option>
                <option value="">A-</option>
                <option value="">B+</option>
                <option value="">B-</option>
                <option value="">O+</option>
                <option value="">O-</option>
                <option value="">AB+</option>
                <option value="">AB-</option>
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
                class="bg-transparent w-full h-10 px-4 py-2 text-gray-700 leading-tight rounded focus:outline-none focus:shadow-outline bg-white border-none"
              >
                <option value="">Select Blood Group</option>
                <option value="">A+</option>
                <option value="">A-</option>
                <option value="">B+</option>
                <option value="">B-</option>
                <option value="">O+</option>
                <option value="">O-</option>
                <option value="">AB+</option>
                <option value="">AB-</option>
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
    };
  },
};
</script>

<style scoped></style>
