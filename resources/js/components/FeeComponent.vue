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
                     v-model="fees.delivery_location_fee"
                     :rules="feeRules"
                     :label="`Delivery Location Fee - ${user.fees.delivery_location_fee}`"
                     required
                   ></v-text-field>
                   <v-text-field
                     v-model="fees.seat_fee"
                     :rules="feeRules"
                     :label="`Seat Fee - ${user.fees.seat_fee}`"
                     required
                   ></v-text-field>
                   <button class="btn btn-primary" type="button" v-on:click="updateFees(fees)">Update Fee</button>

                 </v-flex>
               </v-layout>
             </v-container>
           </div>
         </div>
       </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data: () => ({
        valid: false,
        fees: {},
        feeRules: [
          v => !!v || 'Fee is required',
          ],
      }),
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['updateFees'])
      },
      components:{}
    }
</script>
