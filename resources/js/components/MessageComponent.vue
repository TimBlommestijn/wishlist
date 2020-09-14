<template>
    <div class="app w-50 mx-auto mt-5">   
        <p class="text-center mt-2" v-if="message">{{message}}</p>
        <p v-else>geen message</p>
    </div>
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
