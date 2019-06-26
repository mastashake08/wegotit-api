import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export const store = new Vuex.Store({
  state: {
    venues: [],
    user: {},
    orders: [],
    locations: []
  },
  mutations: {
    getVenues(state,venues){
      state.venues = venues
      console.log(venues)
    },
    getUser(state,user){
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
    sendNotification(state){
      alert('Notification Sent')
    },
    addLocation(state, location){
      state.locations.push(location)
    },
    getLocations(state, locations){
      state.locations = locations;
    },
    deleteLocation(state, index){
      state.locations.splice(index, 1)
    },
    updateFee(state, fee){
      state.user.fee
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
    sendNotification(context, message){
      axios.post('/api/notifications', {message: message}).then(data => {
        context.commit('sendNotification', data.data)
      });
    },
    addLocation(context, name){
      axios.post('/api/locations', {business_id: 1, name: name}).then(data => {
        context.commit('addLocation', data.data);
      });
    },
    getLocations(context){
      axios.get('/api/locations').then(data => {
        context.commit('getLocations', data.data)
      });
    },
    deleteLocation(context, prop){
      axios.delete('/api/locations/'+ prop.item.id).then(data => {
        context.commit('deleteLocation', prop.index)
      })
    },
    updateFee(context, fee){
      axios.post('/api/fee', {fee:fee}).then(data => {
        context.commit('updateFee',data.data)
      })
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
    },
    locations: state => {
      return state.locations
    },
    fee: state => {
      return state.user.fee
    }
  }
})
