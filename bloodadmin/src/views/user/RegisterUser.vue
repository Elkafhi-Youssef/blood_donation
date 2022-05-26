<template>
    <div>
        <Header/>
         <div class="bg-gray-100 w-screen flex justify-center items-center py-16 ">
      <div class= " bg-white rounded-lg sm:shadow-lg  md:max-w-3xl ">

    <div class="   bg-white   flex flex-col py-2  m-0 sm:m-3">
      <!-- <div class="  md:w-1/2  hidden md:flex ">
            <img src="@/assets/img/imglogin.png" alt="">
        </div> -->
        <div class=" flex justify-center mb-10">
            <h1 class=" text-lg sm:text-2xl md:text-4xl" >Register</h1>
        </div>
      <form @submit="onSubmit(e)">
        <div class="flex flex-wrap justify-center gap-4 sm:mx-0  ">

          <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >FullNmae</label
            >
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter FullName"
            />
          </div>
          
          <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >Email </label
            >
            <input
              type="email"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter Email"
            />
          </div>
           <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >Phone number</label
            >
            <input
              type="number"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter Phone number"
            />
          </div>
           <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >City</label
            >
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter City"
            />
          </div>
          <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >Age</label
            >
            <input
              type="number"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter Age"
            />
          </div>
          <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >User Type</label
            >
            <select name="typeuser" id=""  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none">
                <option value="">Select</option>
                <option value="1">Donor</option>
                <option value="2">Recipient</option>
            </select>
          </div>
           <div class="form-group mb-0 min-w-[360px] ">
            <label
              for="exampleInputEmail2"
              class="form-label inline-block mb-2 text-gray-700"
              >User Type</label
            >
            <select name="bloodtype" id=""  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none">
                <option value="A+">Select your blood type</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
          </div>
            <div class="form-group mb-0 min-w-[360px] ">
                <label
                for="exampleInputEmail2"
                class="form-label inline-block mb-2 text-gray-700"
                >Password</label
                >
                <input
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                id="exampleInputEmail2"
                aria-describedby="emailHelp"
                placeholder="Enter password"
                />
            </div>
        </div>

        <div class="flex justify-between items-center mb-6">
          <a
            href="#!"
            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
            >Forgot password?</a
          >
        </div>
        <button
          type="submit"
          class=" px-6 py-2.5 bg-third_col text-black hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-second_col hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >
          Sign in
        </button>
        <p class="text-gray-800 mt-6 text-center">
          Not a member?
          <a
            href="#!"
            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
            >Register</a
          >
        </p>
      </form>
    </div>
      </div>

         </div>
        
        <Footer/>
    </div>
</template>

<script>
import Header from '../../components/user/Header.vue'
import Footer from '../../components/user/Footer.vue'
    export default {
        name : 'LoginUser',
        components: {
            Header,
            Footer,
        },
        data() {
            return {
                num: 0
            }
        },
        methods: {
           add(){
               this.num = this.num + 1;
           }
        }
    }
</script>

<style scoped>

</style>