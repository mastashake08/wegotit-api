<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <v-form v-model="valid">
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
                   <button class="btn btn-primary" v-on:click="addLocation()">Add Location</button>
                 </v-flex>
               </v-layout>
             </v-container>
           </v-form>
          </div>
      </div>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
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
      components:{}
    }
</script>
