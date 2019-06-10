import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export const store = new Vuex.Store({
  state: {
    venues: [],
    user: {},
    orders: []
  },
  mutations: {
    getVenues(state,venues){
      state.venues = venues
      console.log(venues)
    },
    getuser(state,user){
      state.user = user
    },
    getOrders(state,orders){
      state.orders = orders
    },
    deleteOrder(state,index){
      state.orders.splice(index,1);
    },
    queueOrder(state, index){
      state.orders[index].is_queued = true
    },
    addLocation(state){

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
    },
    getOrders(context){
      axios.get('/api/orders').then(data => {
        context.commit('getOrders', data.data)
      })
    },
    deleteOrder(context,prop){
      axios.delete('/api/orders/'+prop.item.id).then(data => {
        context.commit('deleteOrder', prop.index)
      })
    },
    completeOrder(context, prop){
      axios.post('/api/orders/complete/'+prop.item.id).then(data => {
        context.commit('deleteOrder', prop.index)
      })
    },
    queueOrder(context,prop){
      axios.post('/api/orders/queue/'+prop.item.id).then(data => {
        context.commit('queueOrder',prop.index)
      })
    },
    addLocation(context){
      context.commit('addLocation')
    }
  },
  getters: {
    venues: state => {
      return state.venues
    },
    user: state => {
      return state.user
    },
    orders: state => {
      return state.orders.filter(order => {
        return order.is_queued == false
      })
    },
    queuedOrders: state => {
      return state.orders.filter(order => {
        return order.is_queued == true
      })
    }
  }
})
