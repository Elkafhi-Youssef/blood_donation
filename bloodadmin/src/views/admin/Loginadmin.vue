<template>
  <div class="flex items-center justify-center h-screen px-6 bg-gray-200">
    <div class="w-full max-w-sm p-6 bg-white rounded-md shadow-md">
      <div class="flex items-center justify-center">
        <img class=" w-28 " src="@/assets/img/new_logo.png" alt="">
      </div>

      <form class="mt-4" @submit.prevent="login">
        <label class="block">
          <span class="text-sm text-gray-700">Email</span>
          <input
            type="email"
           class="
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
                "
            v-model="email"
          />
        </label>

        <label class="block mt-3">
          <span class="text-sm text-gray-700">Password</span>
          <input
            type="password"
            class="
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
                "
            v-model="password"
          />
        </label>

        <div class="flex items-center justify-between mt-4">
          <div>
            <label class="inline-flex items-center">
              <input
                type="checkbox"
                class="
                  text-indigo-600
                  border-gray-200
                  rounded-md
                  focus:border-indigo-600
                  focus:ring
                  focus:ring-opacity-40
                  focus:ring-indigo-500
                "
              />
              <span class="mx-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>

          <div>
            <a
              class="block text-sm text-indigo-700 fontme hover:underline"
              href="#"
              >Forgot your password?</a
            >
          </div>
        </div>

        <div class="mt-6">
          <button
            type="submit"
            class="
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
              "
          >
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script  setup >
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
const router = useRouter()
// export default {
//   name: "Login-view",
//   data() {
//     return {
//       email: "",
//     }
//   },
//   methods: {



// login() {
//   this.$router.push("/dashboard");
// }
// }
// }
const email = "youssef@gmial.com"
  const login = ()=>{
    router.push("/dashboard/users");
  }
</script>

