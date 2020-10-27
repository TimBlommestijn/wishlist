<template>
    <v-app>
        <navbar-component :user="user" ></navbar-component>
        <wishes-component></wishes-component>
    </v-app>
</template> 

<script>
import NavBarComponent from '../NavBarComponent';
import wishesComponent from '../WishesComponent';
export default {
    components:{
        'navbar-component': NavBarComponent,
        'wishes-component': wishesComponent,
    },
    props:{
        wishes: Array,
        user: Object,
    },
    data () {
      return {
          images_available: false,
      }
    },
    mounted(){
      if(this.vWishes.length !== 0){
        this.addPathImage();
      }

    },
    computed:{
      vWishes(){
        return this.$store.state.wishes;
      }
    },
    created(){
      this.setWishes()
    },
    methods:{
      setWishes(){
        this.$store.state.wishes = this.wishes;
      },
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
