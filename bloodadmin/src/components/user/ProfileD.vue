<template>
  <div class=" bg-gray-100">
    <div class=" md:w-[96%] md:mx-auto flex flex-col md:flex-row   gap-5">
      <div class=" my-8 mx-auto min-w-[370px] max-w-[375px] md:max-w-[500px] flex flex-col items-center  bg-white rounded-lg shadow-lg w-[90%]">
        <div class="mt-4 text-center text-2xl font-bold">
          <h1>Youssef Elkafhi</h1>
        </div>
        <div class="mt-4 flex justify-center">
          <img class="mx-auto h-40 w-40 object-cover rounded-full" src="@/assets/img/moi.png" alt="" />
        </div>
        <div class="w-full my-8 ">
          <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          
          <tbody>
            <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-4 whitespace-nowrap   text-xl font-semibold">Age</td>
              <td class=" text-base  font-light px-6 py-4 whitespace-nowrap">
                22
              </td>
            
            </tr>
             <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Phone</td>
              <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                0677374836747
              </td>
            
            </tr>
            <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">User Type</td>
              <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                Donor
              </td>
            
            </tr>
            <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Type Blood</td>
              <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
               A+
              </td>
            
            </tr>
            <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">City</td>
              <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
               Safi
              </td>
            
            </tr>
             <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
              <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Email</td>
              <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
               youssef@gmail.com
              </td>
            
            </tr>
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
          
         
        </div>
      </div>

     <div class=" my-8  mx-auto min-w-[370px] max-w-[375px] max-h-[455px] md:max-w-[500px] flex flex-col items-center  bg-white rounded-lg shadow-lg w-[90%]">
        <div class="w-full p-7 min-w-[375px] ">
          <div class="flex justify-center mb-10">
            <h1 class="text-lg sm:text-2xl md:text-4xl">Add Request</h1>
          </div>
          <form>
            <div class="form-group mb-6">
              <label
                for="exampleInputEmail2"
                class="form-label inline-block mb-2 text-gray-700"
                >Hospital Name-City</label
              >
              <select
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
              >
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
    </div>
  
</template>

<script>
export default {
  name: "ProfileD",
};
</script>

<style scoped></style>
