<template>
  <div
    class="pt-7 flex justify-center"
    :style="{
      'background-image': `url(${imgfooter})`,
      'background-size': 'cover',
      'background-position': 'center',
    }"
  > 
  <div>

  
    <div
      class="container flex  justify-center md:justify-between lg:justify-between flex-wrap lg:mx-32"
    >
      <div class="flex flex-col text-center w-56 h-auto">
        <div class="">
          <img
            class="mx-auto h-6 w-auto"
            src="@/assets/img/newlogo1.png"
            alt=""
          />
        </div>
        <div class="text-white mt-2 w-full text-xl">
          <p>
            Blood is a web site that help who need a blood, Any where anytime,with a min of time.
          </p>
        </div>
      </div>
      <div class="flex flex-col text-center w-52 h-auto">
        <div class="text-white font-bold text-lg">
          <h1>Shorts Links</h1>
        </div>
        <div class="text-white mt-2 w-full border-red-600">
          <div class="flex flex-col mx-auto">
            <ul class=" ">
              <li>
                <a
                  href="#"
                  class="block py-2 pr-4 pl-3 text-white rounded md:p-0 hover:text-second_col"
                  aria-current="page"
                  >Home</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col"
                  >Donors</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col"
                  >Donate</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 pr-4 pl-3 text-white border-gray-100 md:border-0 md:p-0 hover:text-second_col"
                  >Contact</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex flex-col text-center w-52 h-auto mb-3">
        <div class="text-white font-bold text-lg">
          <h1>Social links</h1>
        </div>
        <div class="text-white mt-2 w-full border-red-600">
          <div class="flex mx-auto justify-between top-3 md:mt-10">
            <div class="">
              <img class="mx-auto h-6 w-auto" src="@/assets/img/f.png" alt="" />
            </div>
            <div class="">
              <img
                class="mx-auto h-6 w-auto"
                src="@/assets/img/in.png"
                alt=""
              />
            </div>
            <div class="">
              <img class="mx-auto h-6 w-auto" src="@/assets/img/y.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class=" text-center text-xl text-white mt-4">
        <p>
          © 2022 Blood. All rights reserved.
        </p>

      </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      imgfooter: require("@/assets/img/imgfooter.png"),
    };
  },
};
</script>

<style scoped></style>
