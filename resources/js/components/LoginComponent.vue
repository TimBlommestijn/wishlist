<template>
    <v-app dark>
        <div class="app mx-auto mt-5">   
          <v-form dark name="register" method="POST" action="/login"
    ref="form"
    v-model="valid"
    lazy-validation
  >

    <input type="hidden" name="_token" :value="csrfToken">

    <v-text-field
      name= "email"
      v-model="email"
      :rules="emailRules"
      label="E-mail"
      required
    ></v-text-field>

    <v-text-field
    name="password"
      v-model="password"
      :rules="passwordRules"
      label="Password"
      required
      type="password"
    ></v-text-field>
    <v-checkbox
      v-model="checkbox"
      :rules="[v => !!v || 'You must agree to continue!']"
      label="remember me"
      name="remember"
      required
    ></v-checkbox>

    <v-btn
      :disabled="!valid"
      color="success"
      class="mr-4"
      type="submit"
    >
      Login
    </v-btn>
    <v-btn
      color="error"
      class="mr-4"
      @click="reset"
    >
      Reset Form
    </v-btn>
         <v-btn color="orange" @click.stop="goToUrl('/register')" > Sign up  </v-btn>

  </v-form>
    </div>

    </v-app>
</template>

<script>
export default {
    props:{
        csrfToken: String
    },
    data: () => ({
      url: '/register',
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 25) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      password: '',
      passwordRules: [
        v => !!v || 'password is required',
        v => (v && v.length > 3) || 'Password must be more than 3 characters',
      ],
      select: null,
      checkbox: false,
    }),

    methods: {
      reset () {
        this.$refs.form.reset()
      },
      goToUrl(url){
         window.location.href = url;
      }
    },
  }
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
.app{
    font-family: 'Montserrat', sans-serif;
}

</style>
