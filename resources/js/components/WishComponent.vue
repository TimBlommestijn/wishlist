<template>
    <v-app>
      <div class="app mx-auto">
        <v-card class="mt-5">
            <v-img class="white--text align-end" height="200" :src="wish[0].wish_image" v-if="images_available">
                <v-card-title class="justify-content-center"><h3 class="stroke"><strong>{{wish[0].wish_name}}</strong></h3></v-card-title>
            </v-img>
            <v-card-subtitle class="pb-0">Wish from {{wish[0].name}}</v-card-subtitle>
            <br>
            <v-card-text class="text--primary">
              <div>{{wish[0].description}}</div>
            </v-card-text>
            <v-card-actions>
              <v-btn color="orange" @click.stop="goToUrl(wish[0].url, true)"  text> Get it </v-btn>
              <v-spacer></v-spacer>
              <v-btn color="orange" v-if="editable" @click.stop="goToUrl('/wish/'+wish[0].id+'/edit', false)" text>
                <v-icon>edit</v-icon>
              </v-btn>
              <v-btn color="red" v-if="editable" @click.stop="deletThis('/wish/'+wish[0].id, {id:wish[0].id})" text><v-icon>delete</v-icon></v-btn>
            </v-card-actions>
        </v-card>
      </div>
    </v-app>
</template>

<script>
export default {
    computed:{
      wish(){
        return this.$store.state.wish;
      }
    },
    props:{
      user: Object,
    },
    data () {
      return {
          images_available: false,
          editable: false,
      }
    },
    mounted(){
      if(this.wish.length !== 0){
        this.addPathImage();
      }
    },
    created(){
      if((typeof this.user === "object" || typeof this.user === 'function') && (this.user !== null)){
        if(this.user.id == this.wish[0].uuid || this.user.admin){
          this.editable = true
        }else this.editable = false
      }else this.editable = false
    },
    methods:{
      addPathImage(){
        for (let i = 0; i < this.wish.length; i++) {
          const wish = this.wish[i];
          wish.wish_image = "/storage/wish_images/"+wish.wish_image;
        }
        this.images_available = true;
      },
      goToUrl(url, external){
         if(external){
           window.open(url, '_blank');
         }else{
           window.location.href = url
         }
      },
      deletThis(url, data){
        if (confirm('You want to delete this wish?')) {
          // delete it
          axios.delete(url, data).finally(()=> window.location.href = "/wish");
        } else {
          // dont delete it
          console.log('it was not deleted');
        }
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
/* no context */
.stroke{
font-size: 2.5rem;
color: black;
  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 3px;
  -webkit-text-stroke-color: black;
}
/* scripting at its finnest  */
</style>
