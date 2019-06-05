<template>
  <v-data-table
    :headers="headers"
    :items="orders"
    class="elevation-1"
  >
    <template v-slot:items="props">
      <td><a :href="'/venues/'+props.item.id">{{ props.item.name }}</a></td>
    </template>
  </v-data-table>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      data () {
      return {
        headers: [
          {
            text: 'Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
        ],

      }
    },
    created(){
      this.getVenues();
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
