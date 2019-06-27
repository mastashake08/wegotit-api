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
                     v-model="business.name"
                     :rules="businessRules"
                     label="Business Name"
                     required
                   ></v-text-field>
                   <v-text-field
                     v-model="business.city"
                     :rules="businessRules"
                     label="Business City"
                     required
                   ></v-text-field>
                   <v-text-field
                     v-model="business.state"
                     :rules="businessRules"
                     label="Business State"
                     required
                   ></v-text-field>
                   <v-text-field
                     v-model="business.country"
                     :rules="businessRules"
                     label="Business Country"
                     required
                   ></v-text-field>
                   <button class="btn btn-primary" v-on:click="editBusiness(business)">Edit Business Settings</button>
                 </v-flex>
               </v-layout>
             </v-container>
          </div>
      </div>
      <fee v-if="user.is_admin"></fee>
      <business-settings v-if="user.is_admin"></business-settings>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
  import BusinessSettings from './BusinessSettings'
  import Fee from './FeeComponent'
    export default {
      data: () => ({
        valid: false,
        business: '',
        businessRules: [
          v => !!v || 'Location is required',
          ],
      }),
      created(){
        this.business = this.user.business
      },
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['editBusiness'])
      },
      components:{
        Fee,
        BusinessSettings
      }
    }
</script>
