<template>
    <v-app>
      <div class="app mx-auto">
         <v-list>
      <v-list-item
            v-for="wish in wishes"
            :key="wish.id"
            link
          @click.stop="goToLink(wish.id)">
            <v-row>
            <v-col>
              <v-list-item-content>
              <v-list-item-title><h3><strong>{{wish.wish_name}} / {{wish.price}}</strong></h3></v-list-item-title>
              <v-list-item-subtitle> <h5>{{wish.description}}</h5></v-list-item-subtitle>
              <v-list-item-subtitle>Wish from: {{ wish.name }}</v-list-item-subtitle>
            </v-list-item-content>
            </v-col>
            <v-col>
              <div class="">
              <v-img class="picture" :src="wish.wish_image" v-if="images_available" ></v-img>
            </div>
            </v-col>
            </v-row>
          </v-list-item>
        </v-list>
      </div>
    </v-app>
</template>

<script>
export default {
    props:{
        wishes: Array
    },
    data () {
      return {
          images_available: false,
      }
    },
    mounted(){
        s
      if(this.wishes.length !== 0){
        this.addPathImage();
      }
    },
    created(){

    },
    methods:{
      addPathImage(){
        for (let i = 0; i < this.wishes.length; i++) {
          const wish = this.wishes[i];
          wish.wish_image = "/storage/wish_images/"+wish.wish_image;
        }
        this.images_available = true;
      },
      goToLink(id){
        window.location.href = "/wish/"+id
      }
    }
}
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
.app{
    width: 75%;
    font-family: 'Montserrat', sans-serif;
}
.picture{
  width: 25%;
}
</style>
