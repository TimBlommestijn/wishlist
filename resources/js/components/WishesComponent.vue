<template>
    <v-app>
      <div class="app mx-auto d-flex">
        <v-card v-for="wish in wishes" :key="wish.id"
          max-width="344"
          class="m-2"
          @click="goToLink(wish.id)"
        >
          <v-list-item>
            <v-list-item-avatar color="grey"></v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title class="headline">{{wish.wish_name}}</v-list-item-title>
              <v-list-item-subtitle>by {{wish.name}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-img
            :src="wish.wish_image"
            height="194"
            v-if="images_available"
          ></v-img>

          <v-card-text>
            {{wish.description}}
          </v-card-text>
        </v-card>
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
