<template>
  <div id="app">
    <div class="wrapper">
      <nav class="menu">
        <router-link v-if="token" :to="{ name: 'get' }"> Get</router-link>
        <router-link v-if="token" :to="{ name: 'personal' }"> Personal</router-link>
        <router-link v-if="!token" :to="{ name: 'login' }"> Login</router-link>
        <router-link v-if="!token" :to="{ name: 'registration' }"> Registration</router-link>
        <router-link v-if="token" :to="{ name: 'services' }"> Services</router-link>
        <a v-if="token" @click.prevent="logout" href="#">Logout</a>
      </nav>
      <router-view/>

    </div>
  </div>
</template>
<script>
//import axios from "@/api/axios";
import axios from "@/api/axios";
import router from "@/router";
axios.interceptors.response.use({},err => {
  if (err.response.status === 401 || err.response.status === 419) {
    const token = localStorage.getItem('x_xsrf_token');
    if(token){
      localStorage.removeItem('x_xsrf_token')
    }
    router.push({name: 'login'});
  }
})
export default {
    data() {
        return {
            isAuth: false,
            token: null,
        }
    },
  mounted() {
      this.getToken()
  },
  updated() {
      this.getToken()
  },

  methods: {
      getToken(){
        this.token = localStorage.getItem('x_xsrf_token')
      },

      logout(){
        axios.post('/logout')
        .then( res => {
          console.log(res);
          localStorage.removeItem('x_xsrf_token');
          this.$router.push({name: 'login'});
        })
      }
    }
}
</script>

<style lang="scss">
*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    border: 0;
}
a {
    text-decoration: none;
}

ul,
ol,
li {
    list-style: none;
}

html,
body,
#app {
    height: 100%;
    line-height: 1;
    background-color: rgba(255, 255, 255, 0.637);
    font-family: Arial, "Helvetika Neue", Helvetica, sans-serif;
}
.wrapper {
    //margin: 0 calc(50vw - 512px);
    margin: 0 auto;
    max-width: 1200px ;
    min-height: 100%;
    background: #F2ECEC;
    padding: 10px;
}
.menu {
  margin: 10px 5px 5px 0px;
}
</style>
