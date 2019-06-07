<template>
  <v-data-table
    :headers="headers"
    :items="orders"
    class="elevation-1"
  >
    <template v-slot:items="props">
      <td>{{ props.item.price }}</td>
      <td>{{ props.item.description }}</td>
      <td>{{ props.item.type }}</td>
      <td>
        <div class="form-group">
          <button class="btn btn-sm btn-primary">Complete</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-info">Take Over</button>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-danger" @click="deleteOrder(props)">Delete</button>
        </div>
      </td>
    </template>
  </v-data-table>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data () {
      return {
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
            text: 'Type',
            align: 'left',
            sortable: false,
            value: 'type'
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
          ...mapActions(['getOrders','deleteOrder'])
        }
    }
</script>
