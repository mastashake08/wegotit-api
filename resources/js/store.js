import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export const store = new Vuex.Store({
  state: {
    venues: [],
    user: {}
  },
  mutations: {
    getVenues(state,venues){
      state.venues = venues
    },
    getVenues(state,user){
      state.user = user
    }
  },
  actions: {
    getVenues(context){
      axios.get('/api/venues').then(data => {
        context.commit('getVenues',data.data)
      })
    },
    getUser(context){
      axios.get('/api/user').then(data => {
        context.commit('getUser',data.data)
      })
    }
  },
  getters: {
    venues: state => {
      return state.venues
    },
    user: state => {
      return state.user
    }
  }
})
