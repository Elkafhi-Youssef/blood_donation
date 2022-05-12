import { createStore } from 'vuex'

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
  }
})
