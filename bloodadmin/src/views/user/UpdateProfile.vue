<template>
  <div>
    <Header />
    <div class="bg-gray-100  flex justify-center items-center py-16">
      <div class="bg-white rounded-lg sm:shadow-lg md:max-w-3xl sm:w-[32rem] md:w-[768px]"
      >
        <div class="bg-white flex flex-col py-2 m-0 sm:m-3">
          <!-- <div class="  md:w-1/2  hidden md:flex ">
            <img src="@/assets/img/imglogin.png" alt="">
        </div> -->
          <div class="flex justify-center mb-10">
            <h1 class="text-lg sm:text-2xl md:text-4xl">Update Profile</h1>
          </div>
          <form @submit.prevent="check" enctype="multipart/form-data">
            <div class="flex flex-wrap justify-center gap-4 sm:mx-0">
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="fullname"
                  class="form-label inline-block mb-2 text-gray-700"
                  >FullNmae</label
                >
                <input
                  type="text"
                  v-model="user.fullname"
                  name="fullname"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="fullname"
                  aria-describedby="fullname"
                  placeholder="Enter FullName"
                />
              </div>

              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="email"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Email
                </label>
                <input
                  type="email"
                  v-model="user.email"
                  name="email"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="email"
                  aria-describedby="email"
                  placeholder="Enter Email"
                />
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="phone"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Phone number</label
                >
                <input
                  type="tel"
                  v-model="user.phone"
                  name="phone"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="phone"
                  aria-describedby="phone"
                  placeholder="Enter Phone number"
                />
                
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="city"
                  class="form-label inline-block mb-2 text-gray-700"
                  >City</label
                >
                <input
                  type="text"
                  v-model="user.city"
                  name="city"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="city"
                  aria-describedby="city"
                  placeholder="Enter City"
                />
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="age"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Age</label
                >
                <input
                  type="number"
                  v-model="user.age"
                  name="age"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                  id="age"
                  aria-describedby="age"
                  placeholder="Enter Age"
                />
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="role"
                  class="form-label inline-block mb-2 text-gray-700"
                  >User Type</label
                >
                <select
                  v-model="user.role"
                  name="role"
                  id="role"
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                >
                  <option value="">Select</option>
                  <option value="donor">Donor</option>
                  <option value="patient">Patient</option>
                </select>
              </div>
              <div class="form-group mb-0 min-w-[360px]">
                <label
                  for="bl"
                  class="form-label inline-block mb-2 text-gray-700"
                  >Blood Type</label
                >
                <select
                  v-model="user.blood_id"
                  name="blood_id"
                  id=""
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-third_col rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-second_col focus:outline-none"
                >
                  <option value="1">Select your blood type</option>
                  <option value="2">A+</option>
                  <option value="3">A-</option>
                  <option value="4">B+</option>
                  <option value="5">B-</option>
                  <option value="6">AB+</option>
                  <option value="7">AB-</option>
                  <option value="8">O+</option>
                  <option value="9">O-</option>
                </select>
              </div>
             
              <div class="form-group mb-0 min-w-[360px]">
              <label for="imge" class="form-label inline-block mb-2 text-gray-700">Image</label>
              <input 

              class="form-control
              block
              w-full
              px-2
              py-1
              text-sm
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="image" type="file"
              name="image"
              @change = "imageChage">
            </div>
            </div>

            <!-- <div class="flex justify-between items-center mb-6">
          <a
            href="#!"
            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
            >Forgot password?</a
          >
        </div> -->
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
                mt-4
                " 
            >
              Update
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
        fullname: "",
        phone: "",
        email: "",
        city: "",
        role: "",
        blood_id: "",
        age: "",
        image: "",
      },
      file: null
    };
  },
  methods: {
    imageChage(e) {
      this.file = e.target.files[0];
      this.user.image = this.file.name;
    },
    check() {
      const { fullname, phone, email, city, role, blood_id, age ,image} =
        this.user;
        
        
        if (fullname == "" || phone == "" || email == "" || city == ""  || role == "" || blood_id == "" || age == "",image == "") {
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
          this.updateProfile();
        }
    },
    async updateProfile() {
      console.log(this.user);
      await this.$store.dispatch("updateProfile", {user :this.user,file : this.file}).then(() => {
        if(this.$store.state.isUpdateProfile){ 

        const user  = localStorage.getItem("user");
      const id = JSON.parse (user).user_id;
      const role = JSON.parse (user).role;
       if(role == "donor"){
         this.$store.dispatch("profileuser",id)
       this.$router.push("/profileuser/newrequests");
      }else if(role == "patient"){
         this.$store.dispatch("profileuser",id)
       this.$router.push("/profilepatient/newrequestspatient");
      }
        createToast({
            title: 'Success',
            description: 'Update done  Successful'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'green',
            type: 'success',
            })
        }
        else{
          createToast({
            title: 'Error',
            description: 'Update failed'
            },
            {
            showIcon: 'true',
            showCloseButton: 'true',
            swipeClose: 'true',
            toastBackgroundColor: 'red',
            type: 'warning',
            })
        }
      });
    },
  },
  mounted(){
    const { fullname, phone, email, city, password, role, blood_id, age ,image} =
      this.user;
    this.$store.dispatch("profileuser",this.$route.params.id).then(() => {
        this.user.fullname = this.$store.state.profile.fullname
        this.user.phone = this.$store.state.profile.phone;
        this.user.email = this.$store.state.profile.email;
        this.user.city = this.$store.state.profile.city;
        this.user.role = this.$store.state.profile.role;
        this.user.blood_id = this.$store.state.profile.blood_id;
        this.user.age = this.$store.state.profile.age;
        this.user.image = this.$store.state.profile.image;
        this.user.password = this.$store.state.profile.password;
        console.log(this.$store.state.profile);

    });
  }
};
</script>

<style scoped></style>
