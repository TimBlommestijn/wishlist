<template>
    <v-app>
        <navbar-component :user="user" ></navbar-component>
        <wish :user="user"></wish>
    </v-app>
</template>

<script>
import NavBarComponent from '../NavBarComponent';
import wishComponent from '../WishComponent';
export default {
    components:{
        'navbar-component': NavBarComponent,
        'wish': wishComponent,
    },
    props:{
        wish: Array,
        user: Object,
    },
    data () {
      return {
          images_available: false
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
      this.setWish()
    },
    methods:{
      setWish(){
        this.$store.state.wish = this.wish;
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
