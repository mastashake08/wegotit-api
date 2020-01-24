<template>
  <div class="text-center">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="form-group">
                <v-card>
                <v-form v-model="valid" onSubmit="return false;">
                 <v-container>
                   <v-layout>
                     <v-flex
                       xs12
                       md4
                       >
                       <v-text-field
                         v-model="item.name"
                         :rules="itemRules"
                         label="Name"
                         required
                       ></v-text-field>
                       <v-text-field
                         v-model="item.description"
                         :rules="itemRules"
                         label="Short Description"
                         required
                       ></v-text-field>
                       <v-text-field
                         v-model="item.price"
                         :rules="itemRules"
                         label="Price"
                         required
                       ></v-text-field>
                       <v-radio-group v-model="item.type">
                        <v-radio
                          label="Food"
                          value="food"
                        ></v-radio>
                        <v-radio
                          label="Drink"
                          value="drink"
                        ></v-radio>
                      </v-radio-group>
                      <v-file-input accept="image/*" label="File input"></v-file-input>
                       <button class="btn btn-primary" v-on:click="addItem(item)">Add Item</button>
                     </v-flex>
                   </v-layout>
                 </v-container>
               </v-form>
               </v-card>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
    export default {
      name: 'add-item',
      data () {
      return {
        item: {},
        itemRules: {},
        valid: false,
        itemRules: [
          v => !!v || 'required',
          ],
      }
    },
    created(){
      this.getUser()
    },
    computed:{
      ...mapGetters(['user'])
    },
    methods: {
          ...mapActions(['addItem', 'getUser'])
        }
    }
</script>
