import { createStore } from 'vuex'
import axios from 'axios'



const Admin = {
  state: {
    // 'Authorization':'Bearer ' + localStorage.getItem('id_token')

  },
  getters: {  },
  mutations: { },
  actions: { },
}

const Users = {
  namespaced: true,
  state: {
    //  token  : localStorage.getItem('token') || '',
    token: '',
    status: '',
    
  },
  getters: {
    getusersshome(state) {
      return state.usersshome
    },
  },
  mutations: { 
   
   
   
   },
  actions: {
    

    async registeruser({ commit }, tt) {
      let data = new FormData();
      for(let key in tt.user) {
        data.append(key, tt.user[key]);
      }
      data.append('image', tt.file);


      const config = {
        method: 'post',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/User/register',
        headers: { 
          'Content-Type': 'multipart/form-data'
        },
        data : data
      };

      axios(config)
      .then( (response)=> {
        console.log(response.data);
      })
      .catch( (error) => {
        console.log(error);
      });

   },
 


}
}


export default createStore({
  state: {
    isSidebarOpen: false,
    usersshome: [],
    typeBlood:[],
    cities:[],
    donors:[],
    data:{blood:'',city:''}
  },
  getters: {
    isSidebarOpen: state => state.isOpen,
  },
  mutations: {
    isSidebarOpen: (state, payload) => {
      state.isOpen = payload
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
      console.log(state.donors);
    },
    SET_DATASEARCH(state, blood,city) {
      state.data.blood = blood;
      state.data.city = city;
      console.log(state.data);
      
    },
  },
  actions: {
    async isSidebarOpen({ commit }, isOpen) {
      commit('isSidebarOpen', isOpen)
    },
    async getusersshome({commit}) {
      const response = await axios.get('http://127.0.0.1/blood_donation/backendAPI/User/getusersshome');
      const data = await response.data;
      commit('SET_USERSSHOME', response.data.data);
    },
    async getBloodTypes({commit}) {
      const response = await axios.get('http://127.0.0.1/blood_donation/backendAPI/User/getBloodTypes');
      const data = await response.data;
      commit('SET_TYPESBLOOD', response.data.data);
    },
    async getAllCities({commit}) {
      const response = await axios.get('http://127.0.0.1/blood_donation/backendAPI/User/getAllCities');
      const data = await response.data;
      commit('SET_CITIES', response.data.data);
    },
    async searchDonor({commit}, CBdata) {
      commit('SET_DATASEARCH', CBdata.blood,CBdata.city);
      const data = JSON.stringify(CBdata);
      const config = {
        method: 'post',
        url: 'http://127.0.0.1/blood_donation/backendAPI/User/getUsersByCityBlood',
        headers: {
          'Content-Type': 'application/json'
        },
        data: data
      };
      axios(config)
      .then( (response)=> {
        if(response.data.message === 'success') {
        console.log(response.data.data);
        commit('SET_DONORS', response.data.data);
      }else{
        console.log('error');
      }
    }
      )
      .catch( (error) => {
        console.log(error);
      }
      );
    },
    async searchDonors({commit,state}) {
      
      const data = JSON.stringify(state.data);
      const config = {
        method: 'post',
        url: 'http://127.0.0.1/blood_donation/backendAPI/User/getUsersByCityBlood',
        headers: {
          'Content-Type': 'application/json'
        },
        data: data
      };
      axios(config)
      .then( (response)=> {
        if(response.data.message === 'success') {
        console.log(response.data.data);
        commit('SET_DONORS', response.data.data);
      }else{
        console.log('error');
      }
    }
      )
      .catch( (error) => {
        console.log(error);
      }
      );
    },
  },
  modules: {
    Users,
    Admin
  }
})
