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
    items-per-page="6"
    :expand="expand"
  >
    <template v-slot:items="props">
      <tr @click="props.expanded = !props.expanded">
      <td>{{ props.item.price }}</td>
      <td>{{ props.item.description }}</td>
      <td>{{ props.item.type }}</td>
      <td><v-chip color="yellow" dark></v-chip></td>
      <td>
        <div class="form-group">
          <button class="btn btn-sm btn-primary" @click="completeOrder(props)">Complete</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-info" v-if="user.is_manager">Take Over</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-danger" v-if="user.is_manager" @click="deleteOrder(props)">Refund</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-warning" @click="queueOrder(props)">Queue</button>
        </div>
      </td>
    </tr>
    </template>
    <template v-slot:expand="props">
      <v-card flat>
        <v-card-text>Peek-a-boo!</v-card-text>
      </v-card>
      <v-card flat>
        <v-card-text>Peek-a-boo!</v-card-text>
      </v-card>
    </template>
  </v-data-table>
  </v-card>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data () {
      return {
        expand: false,
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
          ...mapGetters(['orders', 'user'])
        },
        methods: {
          ...mapActions(['getOrders', 'deleteOrder', 'completeOrder', 'queueOrder'])
        }
    }
</script>
