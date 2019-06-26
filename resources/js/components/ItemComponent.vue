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
    :items="user.business.items"
    class="elevation-1"
    :search="search"
  >
    <template v-slot:items="props">
      <td>{{ props.item.name }}</td>
      <td class="text-xs-right">{{ props.item.description }}</td>
      <td class="text-xs-right">{{ props.item.type }}</td>
      <td class="text-xs-right">{{ props.item.price }}</td>
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
            text: 'Name',
            align: 'left',
            sortable: false,
            value: 'name'
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
            text: 'Price',
            align: 'left',
            sortable: false,
            value: 'price'
          },
        ],

      }
    },
    created(){

    },
        mounted() {

        },
        computed:{
          ...mapGetters(['user'])
        },
        methods: {
          ...mapActions([])
        }
    }
</script>
