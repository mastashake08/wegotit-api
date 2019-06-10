<template>
  <v-card>
   <v-card-title>
     <v-text-field
       v-model="search"
       append-icon="search"
       label="Search"
       single-line
       hide-details
     ></v-text-field>
   </v-card-title>
  <v-data-table
    :headers="headers"
    :items="orders"
    class="elevation-1"
    :search="search"
  >
    <template v-slot:items="props">
      <td>{{ props.item.price }}</td>
      <td>{{ props.item.description }}</td>
      <td>{{ props.item.type }}</td>
      <td>{{ props.item.status }}</td>
      <td>
        <div class="form-group">
          <button class="btn btn-sm btn-primary" @click="completeOrder(props)">Complete</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-info">Take Over</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-danger" @click="deleteOrder(props)">Delete</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-warning" @click="queueOrder(props)">Queue</button>
        </div>
      </td>
    </template>
  </v-data-table>
  </v-card>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data () {
      return {
        search: '',
        headers: [
          {
            text: 'Price',
            align: 'left',
            sortable: false,
            value: 'price'
          },
          {
            text: 'Description',
            align: 'left',
            sortable: false,
            value: 'description'
          },
          {
            text: 'Service Option',
            align: 'left',
            sortable: false,
            value: 'service option'
          },
          {
            text: 'Status',
            align: 'left',
            sortable: false,
            value: 'status'
          },
          {
            text: 'Actions',
            align: 'left',
            sortable: false,
            value: 'actions'
          },
        ],

      }
    },
    created(){
      this.getOrders();
    },
        mounted() {
            console.log('Component mounted.')
        },
        computed:{
          ...mapGetters(['orders'])
        },
        methods: {
          ...mapActions(['getOrders', 'deleteOrder', 'completeOrder', 'queueOrder'])
        }
    }
</script>
