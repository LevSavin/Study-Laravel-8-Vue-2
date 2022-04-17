<template>
  <div>
    <p class="title h3">Free Beauty - это проект,который позволяет абсолютно
      бесплатно организовать онлайн запись мастерам частной практики,
      чьи услуги завязаны на времени.</p>

      <div class="card card-default">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control" v-model="email" required
                     autofocus autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control" v-model="password"
                     required autocomplete="off">
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">

              <input @click.prevent="login" type="button" value="login" class="btn btn-primary">
            </div>

            <div v-if="error">{{error}}</div>
          </div>
        </form>
      </div>
    </div>


  </div>
</template>

<script>
//import axios from "axios";
import axios from '@/api/axios'

export default {
  name: "WelcomePage",
  data() {
    return {
      email: "",
      password: "",
      error: null,
    }
  },

  methods: {
    login(){
      axios.get('/sanctum/csrf-cookie')
          .then(response => {
            console.log(response);
        axios.post('api/login', {email: this.email, password: this.password})
            .then(response => {
              if(response.data.success == true) {
                console.log('true');
                localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'] );
                this.$router.push({name: 'personal'});
              } else {
                this.error = response.data.message
              }
            })
            .catch(err => {
              console.log(err.response);
            })
      })
    },


    handleSubmit(e) {
      e.preventDefault()
      if (this.password.length > 0) {

        axios.get('http://localhost:8000/sanctum/csrf-cookie')
            .then(response => {
              console.log(response);
              axios.post('http://localhost:8000/api/login', {
                email: this.email,
                password: this.password
              })
                  .then(response => {

                    if (response.data.success) {
                      console.log(response.data.success);
                      this.$router.push('/services')
                    } else {
                      this.error = response.data.message
                    }
                  })
                  .catch(function (error) {
                    console.log(error);
                  });

            })

            .catch(function (error) {
              // handle error
              console.log(error);
            })
            .then(function () {
              // always executed
            });

      }
    },

    async testApi() {
      const res = await axios.get('http://localhost:8000/api/test');
      console.log(res.data);
    }

  }


}
</script>

<style>


</style>
