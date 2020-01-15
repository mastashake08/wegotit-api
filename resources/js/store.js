import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export const store = new Vuex.Store({
  state: {
    venues: [],
    user: {},
    orders: [],
    locations: [],
    dropofflocations: []
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
    addOrder(state, order){
      alert('Order on the way!')
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
    addDropOffLocation(state, location){
      state.dropofflocations.push(location)
    },
    getDropOffLocations(state, locations){
      state.dropofflocations = locations;
    },
    deleteDropOffLocation(state, index){
      state.dropofflocations.splice(index, 1)
    },
    updateFees(state, fees){
      state.user.fees.seat_fee = fees.seat_fee
      state.user.fees.delivery_location_fee = fees.delivery_location_fee
      alert('Fees Updated!')
    },
    addItem(state, item){
      state.user.business.items.push(item)
    },
    editBusiness(state, business){
      state.user.business = business
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
    addOrder(context, order){
      //axios.post('/api/orders', order).then(data => {
        context.commit('addOrder', "data.data")
      //})
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
    addDropOffLocation(context, name){
      axios.post('/api/dropofflocations', {business_id: 1, name: name}).then(data => {
        context.commit('addDropOffLocation', data.data);
      });
    },
    getLocations(context){
      axios.get('/api/locations').then(data => {
        context.commit('getLocations', data.data)
      });
    },
    getDropOffLocations(context){
      axios.get('/api/dropofflocations').then(data => {
        context.commit('getDropOffLocations', data.data)
      });
    },
    deleteLocation(context, prop){
      axios.delete('/api/locations/'+ prop.item.id).then(data => {
        context.commit('deleteLocation', prop.index)
      })
    },
    deleteDropOffLocation(context, prop){
      axios.delete('/api/dropofflocations/'+ prop.item.id).then(data => {
        context.commit('deleteDropOffLocation', prop.index)
      })
    },
    updateFees(context, fees){
      axios.post('/api/fee', {fees:fees}).then(data => {
        context.commit('updateFees',data.data)
      })
    },
    addItem(context, item){
      axios.post('/api/item', item).then(data => {
        context.commit('addItem', data.data)
      })
    },
    editBusiness(context, business){
      axios.put('/api/venues/' + business.id, business).then(data => {
        context.commit('editBusiness', data.data)
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
    dropofflocations: state => {
      return state.dropofflocations
    },
    fees: state => {
      return state.user.fees
    },

  }
})
