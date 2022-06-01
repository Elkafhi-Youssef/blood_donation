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
  state: {
    token: localStorage.getItem('token') || '',
    status: '',
  },
  getters: {  },
  mutations: { 
    
   },
  actions: {
    async registeruser({ commit }, user) {
      const data = JSON.stringify(user);

      const config = {
        method: 'post',
        url: 'http://127.0.0.1/BLOOD_DONATION/backendAPI/User/register',
        headers: { 
          'Content-Type': 'application/json'
        },
        data : data
      };

      axios(config)
      .then( (response)=> {
        console.log(response);
      })
      .catch( (error) => {
        console.log(error);
      });

   },
    async loginuser({ commit }, {email,password}) {
      const data = JSON.stringify({email,password});

      const config = {
        method: 'post',
        url: 'http://127.0.0.1/blood_donation/backendAPI/User/login',
        headers: {
          'Content-Type': 'application/json'
        },
        data : data
      };
      axios(config)

  },
  async logoutuser() {
    
}
}
}

export default createStore({
  state: {
    isSidebarOpen: false,
    
  },
  getters: {
    isSidebarOpen: state => state.isOpen,
  },
  mutations: {
    isSidebarOpen: (state, payload) => {
      state.isOpen = payload
    }
  },
  actions: {
    async isSidebarOpen({ commit }, isOpen) {
      commit('isSidebarOpen', isOpen)
    }
  },
  modules: {
    Users,
    Admin
  }
})
