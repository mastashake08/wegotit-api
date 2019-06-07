<template>
  <div>
  <venues></venues>
</div>
</template>
<script>
  import VenueComponent from './VenueComponent'
  import OrderComponent from './OrderComponent'
  import {mapGetters, mapActions} from 'vuex'
    export default {
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['getUser'])
      },
      components:{
        VenueComponent,
        OrderComponent
      }
    }
</script>
