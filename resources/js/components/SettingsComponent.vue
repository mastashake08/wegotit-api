<template>
  <v-card>
      <fee v-if="user.is_manager"></fee>
      <business-settings v-if="user.is_manager"></business-settings>
  </v-card>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
  import BusinessSettings from './BusinessSettings'
  import Fee from './FeeComponent'
    export default {
      created(){
        this.getUser()
      },
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['addLocation', 'getUser'])
      },
      components:{
        Fee,
        BusinessSettings
      }
    }
</script>
