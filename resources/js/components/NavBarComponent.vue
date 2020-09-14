<template>
    <div>
      <v-toolbar flat dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-spacer></v-spacer>

        <v-toolbar-title>WishList</v-toolbar-title>
      </v-toolbar>

      <v-navigation-drawer v-model="drawer" absolute temporary>
        <v-list-item >
          <v-list-item-content>
            <v-list-item-title> {{user.email ? user.email : "not logged in"}} </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

        <v-list dense>

          <v-list-item
            v-for="item in items"
            :key="item.title"
            link
          >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content @click.stop="GoTo(item.link)">
            <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <template v-slot:append>
          <div class="pa-2">
            <v-btn block @click.stop="drawer= !drawer">close</v-btn>
          </div>
        </template>
      </v-navigation-drawer>
    </div>
</template>

<script>
export default {
 props:{
      user: {
        default: null
      }
    },
 data () {
      return {
          drawer: false,
           items: [
          { title: 'home', icon: 'dashboard', link: '/' },
          { title: 'About', icon: 'question_answer', link:'/about' },
          { title: 'Wishes', icon: 'list', link:'/wish'}
        ],
      }
    },
    created(){
      this.checkLogin()
      console.log(this.user)
    },
    methods:{
      GoTo(url){
        window.location.href = url;
      },
      checkLogin(){
        if(this.user.email == undefined){
          this.items.push({title: 'Login / Sign Up', icon: 'login', link:'/login'})
        }else{
           this.items.push({title: 'add wish', icon: 'control_point', link:'/wish/create'})
           this.items.push({title: 'Logout', icon: 'logout', link:'/logout'})
        }
      }
    }
}
</script>
<style scoped>
.app{
    width: 100%;
}
</style>