<template>
  <div>
    <div class="text-center">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h2>Delivery Locations</h2>
                <div class="form-group">
                  <input type="text" placeholder="Chosen Areas Near Landmarks" v-model="name" />
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" v-on:click="addDropOffLocation(name)">Add</button>
                </div>
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
                  :items="dropofflocations"
                  class="elevation-1"
                  :search="search"
                >
                  <template v-slot:items="props">
                    <td class="text-xs-left">{{ props.item.location }}</td>
                    <td class="text-xs-left"><button class="btn btn-sm btn-danger" v-on:click="deleteLocation(props)">Delete</button></td>
                  </template>
                </v-data-table>
              </v-card>
            </div>
        </div>
    </div>
  </div>

</div>
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
            text: 'Actions',
            align: 'left',
            sortable: false,
            value: 'actions'
          }
        ],
        name: ''
      }
    },
    created(){
      this.getLocations();
    },
        mounted() {
            console.log('Component mounted.')
        },
        computed:{
          ...mapGetters(['dropofflocations'])
        },
        methods: {
          ...mapActions(['getDropOffLocations', 'deleteDropOffLocation', 'addDropOffLocation'])
        }
    }
</script>
