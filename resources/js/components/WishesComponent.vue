<template>
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
</template>

<script>
export default {
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
    computed:{
      wishes(){
        return this.$store.state.wishes;
      }
    },
    created(){
      // this.setWishes()
    },
    methods:{
      setWishes(){
        // this.$store.state.wishes = this.wishes;
      },
      addPathImage(){
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
