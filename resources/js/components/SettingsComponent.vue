<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
             <v-container>
               <v-layout>
                 <v-flex
                   xs12
                   md4
                 >
                   <v-text-field
                     v-model="location"
                     :rules="locationRules"
                     label="Location"
                     required
                   ></v-text-field>
                   <button class="btn btn-primary" v-on:click="addLocation(location)">Add Location</button>
                 </v-flex>
               </v-layout>
             </v-container>
           </div>
      </div>
      <fee v-if="user.is_manager"></fee>
      <business-settings v-if="user.is_manager"></business-settings>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
  import BusinessSettings from './BusinessSettings'
  import Fee from './FeeComponent'
    export default {
      data: () => ({
        valid: false,
        location: '',
        locationRules: [
          v => !!v || 'Location is required',
          ],
      }),
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['addLocation'])
      },
      components:{
        Fee,
        BusinessSettings
      }
    }
</script>
