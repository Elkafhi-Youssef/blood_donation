<template>
  <div>
    <Header />
    <div class="bg-gray-100 w-screen flex justify-center items-center py-16">
      <div class="rounded-lg shadow-lg bg-white sm:w-[32rem]  flex">
        <div class="w-full  p-7 min-w-[375px]">
            <div class=" flex justify-center mb-10">
            <h1 class=" text-lg sm:text-2xl md:text-4xl" >Add Request</h1>
        </div>
          <form>
               <div class="form-group mb-6">
              <label
                for="exampleInputEmail2"
                class="form-label inline-block mb-2 text-gray-700"
                >Hospital Name-City</label
              >
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none">
                    <option>Select Hospital</option>
                    <option>Hospital 1</option>
                    <option>Hospital 2</option>
                    <option>Hospital 3</option>
                    <option>Hospital 4</option>
                    <option>Hospital 5</option>
                
                </select>
            </div>
            <div class="form-group mb-6">
              <label
                for="exampleInputEmail2"
                class="form-label inline-block mb-2 text-gray-700"
                >Email address</label
              >
              <input
                type="email"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                id="exampleInputEmail2"
                aria-describedby="emailHelp"
                placeholder="Enter email"
              />
            </div>
            <div class="form-group mb-6">
              <textarea
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                id="exampleFormControlTextarea13"
                rows="3"
                placeholder="Message"
              ></textarea>
            </div>

            
            <button
              type="submit"
              class="w-full px-6 py-2.5 bg-third_col text-black hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-second_col hover:shadow-lg focus:bg-second_col focus:shadow-lg focus:outline-none focus:ring-0 active:bg-second_col active:shadow-lg transition duration-150 ease-in-out"
            >
              Sign in
            </button>
           
          </form>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from "../../components/user/Header.vue";
import Footer from "../../components/user/Footer.vue";

export default {
  name: "LoginUser",
  components: {
    Header,
    Footer,
  },
};
</script>

<style scoped></style>
