<template>
  <v-card>
   <v-card-title>{{venue.name}}</v-card-title>
   <v-spacer></v-spacer>
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
      :items="venue.items"
      :search="search"
    >
      <template v-slot:items="props">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.description }}</td>
        <td class="text-xs-right">{{ props.item.type }}</td>
        <td class="text-xs-right">{{ props.item.price }}</td>
        <td class="text-xs-right"><v-btn color="green">Add To Cart</v-btn></td>
      </template>
      <template v-slot:no-results>
        <v-alert :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </template>
    </v-data-table>

    </v-card>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      props: ['venue'],
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
          {
            text: 'Action',
            align: 'left',
            sortable: false,
            value: 'action'
          },
        ],

      }
    },
    created(){
      
    },
        mounted() {
            console.log('Component mounted.')
        },
        computed:{
          ...mapGetters(['venues'])
        },
        methods: {
          ...mapActions(['getVenues'])
        }
    }
</script>
