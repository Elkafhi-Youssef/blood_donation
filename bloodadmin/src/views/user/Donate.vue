<template>
  <div>
    <Header />
    <div class="bg-gray-100 flex justify-center items-center py-16">
      <div class="rounded-lg shadow-lg bg-white sm:w-[32rem] md:w-[768px] flex  ">

        <div class="w-full  p-7 min-w-[375px]   max-w-[70%]  m-auto">
          <div class="  text-center mb-4">
            <h1 class=" text-xl md:text-3xl font-semibold ">
              Appointment
            </h1>
          </div>
          <form @submit.prevent="addApp">
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">City</label>
              <select @change="getHospitals($event)" v-model="selecTCity" class="
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
                <option selected value="">Select city</option>
                <option v-for="item in cities" :key="item.hospital_city" :value="item.hospital_city">
                  {{ item.hospital_city }}</option>


              </select>
            </div>
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Select Hospital</label>
              <select v-model="selecTHospitalname" class="
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
                <option v-for="item in hospitalsOfCity" :key="item.hospital_name" :value="item.hospital_name">
                  {{ item.hospital_name }}</option>
              </select>
            </div>
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Date</label>
              <input  type="date" name="" id="" min="" v-model="appdate" class="
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
            {{appdate}}
            <div class="form-group mb-6 ">
              <label for="email" class="form-label inline-block mb-2 text-gray-700">Time</label>
              <input type="time" name="limittime" list="limittimeslist" step="0.001" required v-model="apptime" class="
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
              
              <datalist id="limittimeslist"
              >
                <option value="09:00"></option>
                <option value="10:00"></option>
                <option value="10:00"></option>
                <option value="11:00"></option>
                <option value="14:00"></option>
                <option value="15:00"></option>
                <option value="16:00"></option>
                <option value="17:00"></option>
              </datalist>
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

          </form>
        </div>
      </div>
    </div>
    <button @click="gettoken" class="
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
             get token
            </button>
    <div>
      <h1>
       
      </h1>
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
  name: "Donate",
  components: {
    Header,
    Footer,
  },
  data() {
    return {

      cities: [],
      hospitalsOfCity: [],
      selecTCity: "",
      selecTHospitalname: "",
      apptime: "",
      appdate: "",

    };
  },
  methods: {
    async getHospitals(event) {
      this.selecTCity = event.target.value;
      this.$store.dispatch('getHospitals', this.selecTCity);
    },
   async  gettoken(){
       const token  = localStorage.getItem("token");
      await this.$store.dispatch("isTokenExpired",token);
      if(this.$store.state.tokenExpired === true){
        console.log('token expired');
      }else{
        console.log('token not expired expired');
      }
    },
   check(){ 
        if (this.selecTCity == "" || this.selecTHospitalname == "" || this.appdate == "" || this.appdate == "" ) {
          createToast({
            title: 'Error',
            description: 'Please fill all the fields'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'red',
            type: 'warning',
            })
            return false;
        }
        else {
          this.addApp();
        }
    },
    addApp() {
      console.log("")
      const data = {
        hospital_name: this.selecTHospitalname,
        hospital_city: this.selecTCity,
        app_date: this.appdate,
        app_time: this.apptime,
      };
      //  headers: {
      //       Authorization: "Bearer " + localStorage.getItem("token"),
      //     },
      const user  = localStorage.getItem("user");
      const id = JSON.parse (user).user_id;
      axios
        .post("http://127.0.0.1/blood_donation/backendAPI/Appointment/addAppointment/"+id, data, {
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


  },
  computed: {
    hospitalsOfCity() {
      return this.$store.state.hospitalsOfCity;
    },


  },

  async mounted() {
     const token  = localStorage.getItem("token");
    await this.$store.dispatch("isTokenExpired",token);
    console.log('value of state',this.$store.state.tokenExpired);
     if(this.$store.state.tokenExpired ==true){
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      localStorage.removeItem("idProfileDonor");
      this.$router.push("/loginuser");
      console.log(" here token expired");
    }else console.log("token not expired");
    await this.$store.dispatch("getAllCitiesHospitals");
    this.cities = this.$store.state.citiesHospitals;
  },
};
</script>

<style scoped>
</style>
