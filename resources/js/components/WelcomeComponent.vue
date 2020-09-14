<template>
    <v-content dark>
        <div class="app">   
        <h1 class="text-center mt-5" v-if="message">{{message}}</h1>
        <h1 v-else>geen message</h1>
    </div>
    </v-content>

</template>

<script>
export default {
    props:{
        message: String,
    },
    data () {
      return {
          
      }
    },
    mounted(){
    },
    methods:{
     
    }
}
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
.app{
    width: 100%;
    font-family: 'Montserrat', sans-serif;
}
</style>
