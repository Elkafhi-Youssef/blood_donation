<template>
  <div class="bg-primary_col">
    <div class="lg:w-[90%] md:w-[90%] md:mx-auto lg:mx-auto">
      <nav class="border-gray-200 px-2 sm:px-4 py-2.5 md:px-0">
        <div class="flex flex-wrap justify-between items-center mx-auto">
          <a href="#" class="flex items-center">
            <img
              src="../../assets/img/newlogo1.png"
              class="mr-3 h-6 sm:h-9"
              alt="Flowbite Logo"
            />
          </a>
          <button
            @click="openmenu"
            class="relative inline-flex items-center px-2.5 py-1.5 rounded-md text-gray-400 leading-5 font-medium hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 transition ease-in-out duration-150 md:hidden"
            type="button"
            aria-controls="mobile-menu"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-6 h-6"
              :class="menuIsopen ? 'hidden ' : 'block'"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <svg
              class="w-6 h-6"
              :class="menuIsopen ? 'block ' : 'hidden'"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>

          <div
            :class="menuIsopen ? 'flex ' : 'hidden'"
            class="w-full justify-center md:flex md:w-auto ease-in-out duration-300"
            id="mobile-menu"
          >
            <ul
              class="flex flex-col w-auto mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:items-center"
            >
              <!-- <v-btn v-for='item in rightMenu' :key='item.title'
                   :to='item.to' v-if='item.showButton' flat>
                   {{ item.title }}
            </v-btn> -->
              <li>
                <router-link
                  to="/"
                  class="block py-2 pr-4 pl-3 text-white rounded md:p-0 hover:text-second_col"
                  aria-current="page"
                  >Home</router-link
                >
              </li>
              <li>
                <a
                @click="donors"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col cursor-pointer"
                  >Donors</a
                >
              </li>
              <li>
                <ra
                @click="donate"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col"
                  >Donate</ra
                >
              </li>
              <li>
                <router-link to="/contact"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col"
                  >Contact</router-link
                >
              </li>
              <li v-if="!token">
                <button
                  class="text-white bg-second_col border border-second_col md:hover:bg-transparent font-bold py-2 px-4 rounded"
                >
                  <router-link to="/loginuser"> Sing in </router-link>
                </button>
              </li>
              <li v-if="!token" class="mt-2 sm:mt-0 overflow-hidden">
                <button
                  class="text-white bg-second_col border border-second_col md:hover:bg-transparent font-bold py-2 px-4 rounded"
                >
                  <router-link to="/registeruser"> Sing up </router-link>
                </button>
              </li>
              <li v-if="token" class="mt-2 sm:mt-0 overflow-hidden">
                <div >
                  <button
                    @click="dropdownOpen = !dropdownOpen"
                    class="relative z-10 block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none "
                  >
                    <img
                      class="object-cover w-full h-full"
                      src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80"
                      alt="Your avatar"
                    />
                  </button>

                  <div
                    v-show="dropdownOpen"
                    @click="dropdownOpen = false"
                    class="fixed  z-50 w-full h-full "
                  ></div>

                  <transition
                    enter-active-class="transition duration-150 ease-out transform"
                    enter-from-class="scale-95 opacity-0"
                    enter-to-class="scale-100 opacity-100"
                    leave-active-class="transition duration-150 ease-in transform"
                    leave-from-class="scale-100 opacity-100"
                    leave-to-class="scale-95 opacity-0"
                  >
                    <div
                      v-show="dropdownOpen"
                      class="absolute right-0 z-20 w-48 py-1 mt-2 bg-white rounded-lg shadow-xl"
                    >
                      <a 
                      @click="profileuser"
                        class="px-4 py-2 flex rounded-md text-sm text-gray-700 hover:bg-second_col hover:text-white cursor-pointer">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5 mr-1"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          />
                        </svg>
                        Profile</a
                      >
                      <a
                        href="#"
                        class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5 mr-1"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          />
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                          />
                        </svg>
                        Settings</a
                      >
                      <a
                        @click="logout"  
                        class="flex px-4 py-2 rounded-md text-sm text-gray-700 hover:bg-indigo-600 hover:text-white cursor-pointer"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5 mr-1"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                          />
                        </svg>
                        Log out</a
                      >
                    </div>
                  </transition>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'
import { defineComponent } from "vue";
// import the library
import { createToast } from "mosha-vue-toastify";
// import the styling for the toast
import "mosha-vue-toastify/dist/style.css";
export default {
  name: "Header",
  data() {
    return {
      menuIsopen: false,
      dropdownOpen: false,
      token: localStorage.getItem("token") ,
      // headermenu :[
      //   { to: '/', title: 'sign in',
      //     showButton: !this.$store.state.auth.isUserLoggedIn },
      // ]
    };
  },
  methods: {
    openmenu() {
      this.menuIsopen = !this.menuIsopen;
    },
      logout() {
      console.log("logout");
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      localStorage.removeItem("idProfileDonor");
      this.$router.push("/loginuser");
    },
   async donors() {
     if(!localStorage.getItem('token')){
        createToast(
          {
            title: "warning!",
            description: "Please make sure to log in first",
          },
          {
            showIcon: "true",
            showCloseButton: "true",
            swipeClose: "true",
            toastBackgroundColor: "red",
            type: "warning",
          }
        );
        this.$router.push("/loginUser");
     }else{
       const donors =await this.$store.dispatch("donors")
      this.$router.push("/donors");
     }
    },
    async profileuser() {
      const user  = localStorage.getItem("user");
      const id = JSON.parse (user).user_id;
      console.log(id);
       await this.$store.dispatch("profileuser",id)
      this.$router.push("/profileuser/newrequests");
     
    },
    async donate() {
     if(!localStorage.getItem('token')){
        createToast(
          {
            title: "warning!",
            description: "Please make sure to log in first",
          },
          {
            showIcon: "true",
            showCloseButton: "true",
            swipeClose: "true",
            toastBackgroundColor: "red",
            type: "warning",
          }
        );
        this.$router.push("/loginUser");
     }else{
       
      this.$router.push("/donate");
     }
    },
    // logout: function () {
    // this.$store.dispatch(AUTH_LOGOUT)
    // .then(() => {
    //   this.$router.push('/loginuser')
    // })
  }
   
    
 
  
  // mounted: {
  //   // token() {
  //   //   console.log(localStorage.getItem("token"));
  //   //   this.token = localStorage.getItem("token");
  //   // },
  
  // },
};
</script>

<style scoped></style>
