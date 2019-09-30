<template>
  <div class="text-center">

    <notify v-if="user.is_manager"></notify>
    <br>
    <locations v-if="user.is_manager"></locations>
    <br>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <orders></orders>
          </div>
      </div>
  </div>
  <br>

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <queued-orders></queued-orders>
          </div>
      </div>
  </div>
</div>
</template>
<script>
  import OrderComponent from './OrderComponent'
  import QueuedOrderComponent from './QueuedOrderComponent'
  import {mapGetters, mapActions} from 'vuex'
    export default {
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['getUser'])
      },
      components:{
        OrderComponent,
        QueuedOrderComponent
      }
    }
</script>
