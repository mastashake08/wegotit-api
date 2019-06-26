<template>
  <v-card>
   <v-card-title>venue.name</v-card-title>

    </v-card>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      props: ['venue'],
      data () {
      return {

      }
    },
    created(){
    },
        mounted() {
            console.log('Component mounted.')
        },
        computed:{
          ...mapGetters(['venues'])
        },
        methods: {
          ...mapActions(['getVenues'])
        }
    }
</script>
