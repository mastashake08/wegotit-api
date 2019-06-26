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
    :items="venues"
    class="elevation-1"
    :search="search"
  >
    <template v-slot:items="props">
      <td><a :href="'/venues/'+props.item.id">{{ props.item.name }}</a></td>
      <td class="text-xs-right">{{ props.item.city }}</td>
      <td class="text-xs-right">{{ props.item.state }}</td>
      <td class="text-xs-right">{{ props.item.zip }}</td>
      <td class="text-xs-right">{{ props.item.country }}</td>
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
            text: 'City',
            align: 'left',
            sortable: false,
            value: 'city'
          },
          {
            text: 'State',
            align: 'left',
            sortable: false,
            value: 'state'
          },
          {
            text: 'Zip',
            align: 'left',
            sortable: false,
            value: 'zip'
          },
          {
            text: 'Country',
            align: 'left',
            sortable: false,
            value: 'country'
          },
        ],

      }
    },
    created(){
      this.getVenues();
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
