<template>
    <v-app>
      <div class="app mx-auto mt-5">   
        <v-form name="wish" method="POST" :action="form.formAction" ref="form" lazy-validation enctype="multipart/form-data">
          <input type="hidden" name="_token" :value="csrfToken">
          <div v-if="editable == true">
            <input type="hidden"  name="_method" value="PUT">
          </div>
          <v-text-field name="name" v-model="form.name" label="Name" required></v-text-field>

          <v-text-field name= "description" v-model="form.description" label="Description" required></v-text-field>

          <v-text-field name="price" label="Prijs" v-model="form.price" required type="text"></v-text-field>

          <v-text-field name="url" label="link" v-model="form.url" requiredtype="text"></v-text-field>

          <v-file-input  accept="image/*" multiple label="Upload image" name="wish_image"></v-file-input>
   
          <v-btn color="success" class="mr-4" type="submit">
            Signup
          </v-btn>
        </v-form>
      </div>
    </v-app>
</template>

<script>
export default {
    props:{
         csrfToken: String,
         wish: Object,
         editable: {
           type: Boolean,
           default: false
         } 
    },
    data () {
      return {
        link: '',
        form: {
          name: '',
          description: '',
          price: '',
          url: '',
          formAction: '/wish',
        }
      }
    },
    created(){
        if(this.editable){
          this.form.name = this.wish.wish_name;
          this.form.description = this.wish.description;
          this.form.price = this.wish.price;
          this.form.url = this.wish.url;
          this.form.formAction = "/wish/"+this.wish.id;
        }
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
</style>
