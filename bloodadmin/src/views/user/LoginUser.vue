<template>
  <div>
    <Header />
    <div class="bg-gray-100 flex justify-center items-center py-16">
      <div class="rounded-lg shadow-lg bg-white sm:w-[32rem] md:w-[768px] flex">
        <div class="md:w-1/2 hidden md:flex">
          <img src="@/assets/img/imglogin.png" alt="" />
        </div>
        <div class="w-full md:w-1/2 p-7 min-w-[375px] ">
          <form @submit.prevent="login">
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Email address</label>
              <input type="email" name="email" v-model="user.email" class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid
                  border-third_col
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700
                  focus:bg-white
                  focus:border-second_col
                  focus:outline-none
                " id="" aria-describedby="email" placeholder="Enter email" />
            </div>
            <div class="form-group mb-6">
              <label for="password" class="form-label inline-block mb-2 text-gray-700">Password</label>
              <input type="password" name="password" v-model="user.password" class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid
                  border-third_col
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700
                  focus:bg-white
                  focus:border-second_col
                  focus:outline-none
                " id="password" placeholder=" enter your Password" />
            </div>
            <div class="flex justify-between items-center mb-6">
              <!-- <div class="form-group form-check">
            <input
              type="checkbox"
              class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
              id="exampleCheck2"
            />
            <label
              class="form-check-label inline-block text-gray-800"
              for="exampleCheck2"
              >Remember me</label
            >
          </div> -->
              <!-- <a
                href="#!"
                class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                >Forgot password?</a
              > -->
            </div>
            <button type="submit" class="
                w-full
                px-6
                py-2.5
                bg-third_col
                text-black
                hover:text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-second_col hover:shadow-lg
                focus:bg-second_col
                focus:shadow-lg
                focus:outline-none
                focus:ring-0
                active:bg-second_col active:shadow-lg
                transition
                duration-150
                ease-in-out
              ">
              Sign in
            </button>
            <p class="text-gray-800 mt-6 text-center">
              Not a member?
              <router-link to="/registeruser" class="
                  text-blue-600
                  hover:text-blue-700
                  focus:text-blue-700
                  transition
                  duration-200
                  ease-in-out
                ">Register</router-link>
            </p>
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
import axios from "axios";
import { defineComponent } from "vue";
// import the library
import { createToast } from "mosha-vue-toastify";
// import the styling for the toast
import "mosha-vue-toastify/dist/style.css";

export default {
  name: "LoginUser",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    check() {
      const { email, password } =
        this.user;
      if (email == "" || password == "") {
        createToast(
          {
            title: "Some text",
            description: "Please fill all the fields",
          },
          {
            showIcon: "true",
            showCloseButton: "true",
            swipeClose: "true",
            toastBackgroundColor: "red",
            type: "warning",
          }
        );
        return false;
      } else {
        this.login();
      }
    },
    login() {
      const { email, password } = this.user;

      const data = JSON.stringify({ email, password });
      const config = {
        method: 'post',
        url: 'http://127.0.0.1/blood_donation/backendAPI/User/login',
        headers: {
          'Content-Type': 'application/json'
        },
        data: data
      };
      axios(config)
        .then((response) => {
          // console.log(response.data);
          // let token = response.data.token;



          console.log(response.data.data);
          if (response.data.message == "success") {
            localStorage.setItem("user", JSON.stringify(response.data.data));
            let token = response.data.token;
            localStorage.setItem("token", token);
            this.$router.push("/");
            createToast(
              {
                title: "success",
                description: response.data.alert,
              },
              {
                showIcon: "true",
                showCloseButton: "true",
                swipeClose: "true",
                toastBackgroundColor: "green",
                type: "success",
              }
            );
          } else {
            createToast(
              {
                title: "Some text",
                description: response.data.alert,
              },
              {
                showIcon: "true",
                showCloseButton: "true",
                swipeClose: "true",
                toastBackgroundColor: "red",
                type: "warning",
              }
            );
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
</style>
