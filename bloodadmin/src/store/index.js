import { createStore } from "vuex";
import axios from "axios";

const Admin = {
  state: {
    // 'Authorization':'Bearer ' + localStorage.getItem('id_token')
  },
  getters: {},
  mutations: {},
  actions: {},
};

const Users = {
  namespaced: true,
  state: {
    //  token  : localStorage.getItem('token') || '',
    token: "",
    status: "",
  },
  getters: {
    getusersshome(state) {
      return state.usersshome;
    },
  },
  mutations: {},
  actions: {
    async registeruser({ commit }, tt) {
      let data = new FormData();
      for (let key in tt.user) {
        data.append(key, tt.user[key]);
      }
      data.append("image", tt.file);

      const config = {
        method: "post",
        url: "http://127.0.0.1/BLOOD_DONATION/backendAPI/User/register",
        headers: {
          "Content-Type": "multipart/form-data",
        },
        data: data,
      };

      axios(config)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};

export default createStore({
  state: {
    isSidebarOpen: false,
    usersshome: [],
    typeBlood: [],
    cities: [],
    donors: [],
    donor: "",
    hospitalsOfCity: [],
    data: { blood: null, city: null },
    citiesHospitals: [],
    tokenExpired: false,
    profile: {},
  },
  //==============================Getters============================================
  getters: {
    isSidebarOpen: (state) => state.isOpen,
  },
  //===========================Mutations=======================================
  mutations: {
    isSidebarOpen: (state, payload) => {
      state.isOpen = payload;
    },
    SET_USERSSHOME(state, user) {
      state.usersshome = user;
    },
    SET_TYPESBLOOD(state, bloodType) {
      state.typeBlood = bloodType;
    },
    SET_CITIES(state, cities) {
      state.cities = cities;
    },
    SET_DONORS(state, donors) {
      state.donors = donors;
      console.log("data by serch home in nutation", state.donors);
    },
    SET_DATASEARCH(state, blood, city) {
      state.data.blood = blood;
      state.data.city = city;
      // console.log(state.data);
    },
    SET_DONOR(state, donor) {
      state.donor = donor;
      console.log("donor state", state.donor);
    },
    SET_HOSPITALS(state, hospitals) {
      state.hospitalsOfCity = hospitals;
    },
    SET_CITIESHOSPITALS(state, citiesHospitals) {
      state.citiesHospitals = citiesHospitals;
    },
    SET_TOKEN_EXPIRED(state, tokenExpired) {
      state.tokenExpired = tokenExpired;
      console.log("here state", state.tokenExpired);
    },
    SET_PROFILEUSER(state, profile) {
      state.profile = profile;
    },
  },
  //========================Actions==================================
  actions: {
    async isTokenExpired({ commit }, token) {
      console.log("token which came to action is:", token);
      var config = {
        method: "post",
        url: "http://127.0.0.1/BLOOD_DONATION/backendAPI/User/isTokenExpired",
        headers: {
          Authorization: "Bearer " + token,
        },
      };

      axios(config)
        .then(function (response) {
          console.log(response.data);
          if ((response.data.err == true)) {
            commit("SET_TOKEN_EXPIRED", true);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    async profileuser({ commit }, id) {
      const config = {
        headers: {
          "Content-Type": "application/json",
        },
      };
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/profile/" + id,
        config
      );
      const data = response.data;
      if (data.message == "success") {
        commit("SET_PROFILEUSER", response.data.data);
      }
    },
    async isSidebarOpen({ commit }, isOpen) {
      commit("isSidebarOpen", isOpen);
    },
    async registeruser({ commit }, tt) {
      let data = new FormData();
      for (let key in tt.user) {
        data.append(key, tt.user[key]);
      }
      data.append("image", tt.file);
      const config = {
        method: "post",
        url: "http://127.0.0.1/BLOOD_DONATION/backendAPI/User/register",
        headers: {
          "Content-Type": "multipart/form-data",
        },
        data: data,
      };

      axios(config)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async getusersshome({ commit }) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/getusersshome"
      );
      const data = await response.data;
      commit("SET_USERSSHOME", response.data.data);
    },
    async getBloodTypes({ commit }) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/getBloodTypes"
      );
      const data = await response.data;
      commit("SET_TYPESBLOOD", response.data.data);
    },
    async getAllCities({ commit }) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/getAllCities"
      );
      const data = await response.data;
      commit("SET_CITIES", response.data.data);
    },

    async searchDonor({ commit }, CBdata) {
      commit("SET_DATASEARCH", CBdata.blood, CBdata.city);
      console.log(CBdata);
      const dataa = JSON.stringify(CBdata);
      console.log(dataa);
      const config = {
        method: "post",
        url: "http://127.0.0.1/blood_donation/backendAPI/User/getUsersByCityBlood",
        headers: {
          "Content-Type": "application/json",
        },
        data: dataa,
      };
      const response = await axios.post(config.url, CBdata);
      const data = await response.data.data;
      const message = await response.data.message;

      commit("SET_DONORS", response.data.data);

      //   .then( (response)=> {
      //     if(response.data.message === 'success') {
      //     console.log(response.data.data);
      //     commit('SET_DONORS', response.data.data);
      //   }else{
      //     console.log('error');
      //   }
      // }
      //   )
      //   .catch( (error) => {
      //     console.log(error);
      //   }
      //   );
    },
    async searchDonors({ commit, state }) {
      const dataa = JSON.stringify(state.data);
      const config = {
        method: "post",
        url: "http://127.0.0.1/blood_donation/backendAPI/User/getUsersByCityBlood",
        headers: {
          "Content-Type": "application/json",
        },
        data: dataa,
      };
      const response = await axios(config);
      const data = await response.data.data;

      commit("SET_DONORS", response.data.data);
    },
    async donors({ commit }) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/getAllUser"
      );
      const data = await response.data.data;
      commit("SET_DONORS", response.data.data);
    },
    async getProfileDonor({ commit }, id) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/User/getUserById/" + id
      );
      const infodonor = response.data.data;
      console.log(infodonor);
      commit("SET_DONOR", infodonor);
    },
    async getHospitals({ commit }, city) {
      const response = await axios
        .get(
          `http://127.0.0.1/blood_donation/backendAPI/Hospital/getHospitalsByCity/${city}`
        )
        .then((res) => {
          this.hospitalsOfCity = res.data.data;
          commit("SET_HOSPITALS", res.data.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async getAllCitiesHospitals({ commit }) {
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/Hospital/getAllCitiesHospitals"
      );
      const data = await response.data.data;
      commit("SET_CITIESHOSPITALS", response.data.data);
    },
  },
  modules: {
    Users,
    Admin,
  },
});
