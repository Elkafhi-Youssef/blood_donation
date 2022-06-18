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
    newRequest: {},
    appointmentRequests:[],
    cancelRequests:[],
    newRequestsPatient:[],
    appointmentRequestsPatient:[],
    cancelRequestsPatient:[],
    isUpdateProfile:true,
    allUsersAdmin:[],
    allHospitalsAdmin:[],
    isUpdateProfileByAdmin:false,
    addHospitalAdmin:false,
    keyword:''
  },
  //==============================Getters============================================
  getters: {
    isSidebarOpen: (state) => state.isOpen,
    getKeyword(state){
      console.log('getters',state.keyword)
      return state.keyword
    }
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
      console.log("profile state for updaet user in dashboard", state.profile);
    },
    SET_NEWREQUEST(state, newRequest) {
      state.newRequest = newRequest;
    },
    SET_NEWREQUESTPATIENT(state, newRequestPatient) {
      state.newRequestsPatient = newRequestPatient;
    },
    SET_APPREQUEST(state,appointment){
      state.appointmentRequests = appointment;
    },
    SET_CANCELREQUEST(state, cancelRequest){
      state.cancelRequests = cancelRequest
    },
    SET_APPREQUESTPATIENT(state,appointmentPatient){
      state.appointmentRequestsPatient = appointmentPatient;
    },
    SET_CANCELREQUESTPATIENT(state,cancelRequestPatient){
      state.cancelRequestsPatient = cancelRequestPatient;
    },
    SET_ISUPDATEPROFILE(state,isupdateProfile){
      state.isUpdateProfile = isupdateProfile;
    },
    SET_ALLUSERSADMIN(state,data){
      state.allUsersAdmin = data;
      console.log("all user in page admin",state.allUsersAdmin);
    },
    SET_ISUPDATEPROFILEADMIN(state, variable){
      state.isUpdateProfileByAdmin = variable
      console.log(state.isUpdateProfileByAdmin)
    },
    SET_ALLHOSPITALSADMIN(state,data){
      state.allHospitalsAdmin  = data 
      console.log(state.allHospitalsAdmin)
    },
    SET_ADDHOSPITALADMIN(state,data){
      state.addHospitalAdmin = data
      console.log(state.addHospitalAdmin);
    },
    SET_SEARCHKEYWORD(state,key){
      state.keyword = key
      console.log(state.keyword)
    }
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

      await axios(config)
        .then(function (response) {
          if ((response.data.err)) {
            commit("SET_TOKEN_EXPIRED", true);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    async profileuser({ commit }, id) {
      console.log("id which came to action is:", id);
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
      }else{
        console.log("error");
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
    async updateProfile({ commit }, tt) {
      let data = new FormData();
      for (let key in tt.user) {
        data.append(key, tt.user[key]);
      }
      data.append("image", tt.file);
      const user  = localStorage.getItem("user");
      const id = JSON.parse (user).user_id;
      const config = {
        method: "post",
        url: "http://127.0.0.1/BLOOD_DONATION/backendAPI/User/updateProfile/"+id,
        headers: {
          "Content-Type": "multipart/form-data",
        },
        data: data,
      };

      axios(config)
        .then((response) => {
          if(response.data.message == "success"){
            commit("SET_ISUPDATEPROFILE",true);
          }
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
    async getNewRequest({ commit }, data) {
      
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getNewRequest/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          // commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_NEWREQUEST",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getAppointmentRequests({ commit }, data) {
      console.log("id",data.id);
      console.log("token",data.token);
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getAppRequest/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_APPREQUEST",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getAppointmentRequestsPatient({ commit }, data) {
      console.log("id",data.id);
      console.log("token",data.token);
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getAppointmentRequestsPatient/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_APPREQUESTPATIENT",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getCancelRequests({ commit }, data) {
      console.log("id",data.id);
      console.log("token",data.token);
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getCancelRequest/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_CANCELREQUEST",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getCancelRequestsPatient({ commit }, data) {
      console.log("id",data.id);
      console.log("token",data.token);
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getCancelRequestsPatient/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_CANCELREQUESTPATIENT",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async acceptRequest({ commit }, id) {
      console.log("id",id);
      
      var config = {
        method: 'post',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/acceptRequest/'+id,
        headers: { 
          "Content-Type": "application/json",
        }
      };
      
     await axios(config)
      .then(function (response) {
        console.log('xof ga3 response',response.data.message);
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async cancelRequest({ commit }, id) {
      console.log("id",id);
      
      var config = {
        method: 'post',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/cancelRequest/'+id,
        headers: { 
          "Content-Type": "application/json",
        }
      };
      
     await axios(config)
      .then(function (response) {
        console.log('xof ga3 response',response.data.message);
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getNewRequestPatient({ commit }, data) {
      console.log("id",data.id);
      console.log("token",data.token);
      var config = {
        method: 'get',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/Request/getNewRequestPatient/'+data.id,
        headers: { 
          'Authorization': `Bearer ${data.token}`
        }
      };
      
     await axios(config)
      .then(function (response) {
        if (response.data.err) {
          // commit("SET_TOKEN_EXPIRED", true);
        }else if(response.data.message == "success"){
          commit("SET_NEWREQUESTPATIENT",(response.data.data));
        }else{
          console.log('no data')
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    async getAllUsersAdmin({commit}){
    const response = await axios.get(
      "http://127.0.0.1/blood_donation/backendAPI/User/getAllUsersAdmin"
    );
    const data = await response.data.data;
    if(response.data.message == "success"){
      console.log("success");
      commit("SET_ALLUSERSADMIN", response.data.data);
    }

    },
    async getAllHospitalsAdmin({commit}){
      const response = await axios.get(
        "http://127.0.0.1/blood_donation/backendAPI/Hospital/getAllHospitalsAdmin"
      );
      const data = await response.data.data;
      if(response.data.message == "success"){
        console.log("success");
        commit("SET_ALLHOSPITALSADMIN", response.data.data);
      }
  
      },
    async updateUserByAdmin({commit},data){
      console.log(data.user_id)
      const config = {
        method: "post",
        url: "http://127.0.0.1/BLOOD_DONATION/backendAPI/User/updateUserByAdmin/"+data.user_id,
        headers: {
          "Content-Type": "multipart/form-data",
        },
        data: data,
      };

      const response = await axios(config)
      const date = await response.data
      if(response.data.message == "success"){
        commit("SET_ISUPDATEPROFILEADMIN",true);
      }else{
        commit("SET_ISUPDATEPROFILEADMIN",false);
      }
    },
    async addHospitalAdmin({commit}, data){
      console.log('data li katmxi',data);

      const response = await axios.post("http://127.0.0.1/BLOOD_DONATION/backendAPI/Hospital/addHospitalAdmin",{
        headers:{
          "Content-Type": "multipart/form-data",
        },
        data: data,
      })
      if(response.data.message == "success"){
        console.log('d5al hna')
       await commit("SET_ADDHOSPITALADMIN",true)
      }else{
       await commit("SET_ADDHOSPITALADMIN",false)
      }
    },
    async searchKeyword({commit},data){
      commit("SET_SEARCHKEYWORD",data);
    }
  },
// modules: {
//   Users,
//   Admin,
// },
});
