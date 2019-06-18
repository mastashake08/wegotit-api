<template>
  <div class="text-xs-center">
    <v-badge
    overlap>
      <template v-slot:badge>1</template>
      <v-icon>mail</v-icon>
    </v-badge>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      created(){
        this.getUser()
      },
      computed: {
        ...mapGetters(['user'])
      },
      methods:{
        ...mapActions(['getUser'])
      },
      components:{

      }
    }
</script>
