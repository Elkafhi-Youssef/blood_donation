<template>
  <div class=" bg-gray-100">
    <div class=" md:w-[96%] md:mx-auto flex flex-col md:flex-row   gap-5">
      <div
        class=" my-8 mx-auto min-w-[370px] max-w-[375px] md:max-w-[500px] flex flex-col items-center  bg-white rounded-lg shadow-lg w-[90%]">
        <div class="mt-4 text-center text-2xl font-bold">
          <h1>{{ donor.fullname }}</h1>
        </div>
        <div class="mt-4 flex justify-center">
          <img class="mx-auto h-40 w-40 object-cover rounded-full" :src="'http://127.0.0.1/BLOOD_DONATION/backendAPI/public/imgsProfile/'+donor.image" alt="" />
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
                          {{ donor.age }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Phone</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ donor.phone }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">User Type</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ donor.role }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold"> Blood Type</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ donor.blood_type }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">City</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ donor.city }}
                        </td>

                      </tr>
                      <tr class="bg-white border-none transition duration-300 ease-in-out hover:bg-third_col">
                        <td class="px-6 py-2 whitespace-nowrap   text-xl font-semibold">Email</td>
                        <td class=" text-base  font-light px-6 py-2 whitespace-nowrap">
                          {{ donor.email }}
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

      <div
        class=" my-8  mx-auto min-w-[370px] max-w-[375px]  md:max-w-[500px] flex flex-col items-center  bg-white rounded-lg shadow-lg w-[90%]">
        <div class="w-full p-7 min-w-[375px] ">
          <div class="flex justify-center mb-8">
            <h1 class="text-lg sm:text-2xl md:text-4xl">Add Request</h1>
          </div>
          <form @submit.prevent="addrequest">
            <div class="form-group mb-6">
              <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Date</label>
              <input type="date"
              :min="new Date().toISOString().substr(0, 10)"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter when you need blood"
                v-model="requestDate" />
            </div>
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Time</label>
              <input type="time" name="limittime" list="limittimeslist" step="0.001" required v-model="requestTime"
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
                  ">
            </div>

            <datalist id="limittimeslist">
              <option value="09:00"></option>
              <option value="10:00"></option>
              <option value="10:00"></option>
              <option value="11:00"></option>
              <option value="14:00"></option>
              <option value="15:00"></option>
              <option value="16:00"></option>
              <option value="17:00"></option>
            </datalist>
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Select Hospital</label>
              <select v-model="hospitalId" class="
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
                  ">
                <option selected value="">Select hospital name</option>
                <option v-for="item in hospitalsOfCityP" :key="item.hospital_name" :value="item.hospital_id">
                  {{ item.hospital_name }}</option>
              </select>
            </div>
            <div class="form-group mb-6">
              <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Add Desription</label>
              <textarea v-model="requestDescription"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
            </div>

            <button type="submit"
              class="w-full px-6 py-2.5 bg-third_col text-black hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-second_col hover:shadow-lg focus:bg-second_col focus:shadow-lg focus:outline-none focus:ring-0 active:bg-second_col active:shadow-lg transition duration-150 ease-in-out">
              Add Request
            </button>
          </form>
        </div>

      </div>
    </div>
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
  name: "ProfileD",
  data() {
    return {
      // donor: {},
      hospitalsOfCityP: [],
      hospitalId: "",
      requestTime: "",
      requestDate: "",
      requestDescription: "",
    }
  },
  methods: {
    addrequest() {
      const user = localStorage.getItem("user");
      const id = JSON.parse(user).user_id;
      const requestInfo = {
        requestDate: this.requestDate,
        requestTime: this.requestTime,
        hospitalId: this.hospitalId,
        requestDescription: this.requestDescription,
        donor_id: this.donor.user_id
      }
      console.log('data request ', requestInfo);
      console.log('info', this.donor)
      axios
        .post("http://127.0.0.1/blood_donation/backendAPI/Request/addRequest/" + id, requestInfo, {
          headers: {
            'content-type': 'application/json',
          },
        })
        .then((response) => {
          if (response.data.message == 'success') {
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
            redirectToPatientProfile();
          }
          else {
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
        });
    },
    redirectToPatientProfile(){
      this.$router.push('/profilepatient/cancelrequestspatient');
    }


  },
  computed: {
    donor() {
      this.donor = this.$store.state.donor
      return this.$store.state.donor
    }
  },
  async mounted() {
    const id = localStorage.getItem('idProfileDonor')
    await this.$store.dispatch('getProfileDonor', id);
    if (this.donor.lenght < 0) {
      this.donor = this.$store.state.donor
    }
    const user = localStorage.getItem("user");
    const city = JSON.parse(user).city;
    await this.$store.dispatch('getHospitals', city);
    this.hospitalsOfCityP = this.$store.state.hospitalsOfCity
  }
};
</script>

<style scoped>
</style>
