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
                     v-model="fee"
                     :rules="feeRules"
                     :label="user.fee"
                     required
                   ></v-text-field>
                   <button class="btn btn-primary" type="button" v-on:click="updateFee(fee)">Update Fee</button>
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
        fee: '',
        feeRules: [
          v => !!v || 'Fee is required',
          ],
      }),
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['updateFee'])
      },
      components:{}
    }
</script>
