<template>
  <div class="text-center">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="form-group">
                <input type="text" placeholder="Enter Message For Runners" v-model="message" />
              </div>
              <div class="form-group">
                <button class="btn btn-info" v-on:click="sendNotification">Send</button>
              </div>
          </div>
      </div>
  </div>
</div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data(){
        return {
          message: ''
        }
      },
      computed: {
        ...mapGetters([])
      },
      methods:{
        ...mapActions(['sendNotification'])
      },
      components:{

      }
    }
</script>
