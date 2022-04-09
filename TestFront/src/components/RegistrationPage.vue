<template>
  <div>
    <div class="card card-default">
      <div class="card-header">Registration</div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-md-right">name</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" v-model="name" required
                     autofocus autocomplete="off">
            </div>
          </div>


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

          <div class="form-group row">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
            <div class="col-md-6">
              <input id="password_confirmation" type="password" class="form-control" v-model="password_confirmation"
                     required autocomplete="off">
            </div>
          </div>



          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <input @click.prevent="register" type="button" value="register" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "@/api/axios";
export default {
  name: "RegistrationPage",
  data() {
    return {
      name:"",
      email: "",
      password: "",
      password_confirmation: "",
    }
  },
  methods: {
    register(){
      axios.get('/sanctum/csrf-cookie')
          .then(response => {
            console.log(response);
            axios.post('/register', {
              name: this.name,
              email: this.email,
              password: this.password,
              password_confirmation: this.password_confirmation,
            })
            .then(response => {
              localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'] );
              this.$router.push({name: 'personal'});

            })
          })
    }
  }
}
</script>

<style scoped>

</style>