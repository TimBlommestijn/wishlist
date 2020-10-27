<template>
    <v-app>
        <navbar-component :user="user" ></navbar-component>
        <welcome-message message="Welcome to the WishList Website"></welcome-message>
        <message-component message="the best wishlist website"></message-component>
    </v-app>
</template>

<script>
import NavBarComponent from '../NavBarComponent';
import wishesComponent from '../WishesComponent';
export default {
    components:{
        'navbar-component': NavBarComponent,
        
    },
    props:{
        user: Object,
    },
    data () {
      return {
          
      }
    },
    mounted(){
    },
    computed:{

    },
    created(){
    },
    methods:{
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
