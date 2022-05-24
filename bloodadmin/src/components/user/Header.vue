<template>
  <div>
    <nav class=" bg-primary_col border-gray-200 px-2 sm:px-4 py-2.5 ">
      <div
        class="container flex flex-wrap justify-between items-center mx-auto "
      >
        <a href="#" class="flex items-center">
          <img
            src="../../assets/img/newlogo1.png"
            class="mr-3 h-6 sm:h-9"
            alt="Flowbite Logo"
          />
          <!-- <span
            class="
              self-center
              text-xl
              font-semibold
              whitespace-nowrap
              dark:text-white
            "
            >Blood</span -->
          <!-- > -->
        </a>
        <button
        @click="openmenu"
          class="
            relative
            inline-flex
            items-center
            px-2.5
            py-1.5
            rounded-md
            text-gray-400
            leading-5
            font-medium
            hover:text-gray-500
            focus:outline-none
            focus:shadow-outline-blue
            focus:border-blue-300
            active:bg-gray-50
            transition
            ease-in-out
            duration-150
            md:hidden"
          type="button"
          
          aria-controls="mobile-menu"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            class="w-6 h-6"
            :class="menuIsopen ? 'hidden ':'block'"
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
            :class="menuIsopen ? 'block ':'hidden'"
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
        :class="menuIsopen ? 'flex ':'hidden'"
        class=" w-full justify-center md:flex md:w-auto    ease-in-out duration-300" id="mobile-menu">
          <ul
            class=" 
              flex  flex-col 
              w-auto
              mt-4
              md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:items-center
            "
          >
            <li >
              <a
                href="#"
                class="
                  block
                  py-2
                  pr-4
                  pl-3
                  text-white
                  rounded
                  md:p-0
                hover:text-second_col
                "
                aria-current="page"
                >Home</a
              >
            </li>
            <li >
              <a
                href="#"
                class="
                  block
                  py-2
                  pr-4
                  pl-3
                  text-white
                   border-gray-100
                  md:border-0
                  md:p-0
                hover:text-second_col
                "
                >Donors</a
              >
            </li>
            <li >
              <a
                href="#"
                class="
                 block
                  py-2
                  pr-4
                  pl-3
                  text-white
                   border-gray-100
                  md:border-0
                  md:p-0
                hover:text-second_col
                "
                >Donate</a
              >
            </li>
            <li >
              <a
                href="#"
                class="
                 block
                  py-2
                  pr-4
                  pl-3
                  text-white
                   border-gray-100
                  md:border-0
                  md:p-0
                hover:text-second_col
                "
                >Contact</a
              >
            </li>
             <li >
              <button class=" text-white bg-second_col border border-second_col md:hover:bg-transparent font-bold py-2 px-4 rounded">
                <a
                href="#"
                >
                Sing in
                </a>
              </button>
            </li>
             <li class=" mt-2  sm:mt-0 overflow-hidden">
              <button class=" text-white bg-second_col border border-second_col md:hover:bg-transparent font-bold py-2 px-4 rounded">
                <a
                href="#"
                >
                Sing in
                </a>
              </button>

               
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script >
  export default {
    name : 'Header',
    data() {
      return {
        menuIsopen: false,
      }
    },
    methods: {
      openmenu() {
        this.menuIsopen = !this.menuIsopen;
      }
    }
  }

</script>

<style  scoped>

</style>