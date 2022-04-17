<template>
  <div>
    <div class="card card-default">
      <div class="card-header">Registration</div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="firstname" class="col-sm-4 col-form-label text-md-right">firstname</label>
            <div class="col-md-6">
              <input id="firstname" type="text" class="form-control" v-model="firstname" required
                     autofocus autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label for="lastname" class="col-sm-4 col-form-label text-md-right">lastname</label>
            <div class="col-md-6">
              <input id="lastname" type="text" class="form-control" v-model="lastname" required
                     autofocus autocomplete="off">
            </div>
          </div><div class="form-group row">
            <label for="patronymic" class="col-sm-4 col-form-label text-md-right">patronymic</label>
            <div class="col-md-6">
              <input id="patronymic" type="text" class="form-control" v-model="patronymic" required
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
            <label for="profession" class="col-sm-4 col-form-label text-md-right">Profession</label>
            <div class="col-md-6">
              <input id="profession" type="text" class="form-control" v-model="profession" required
                     autofocus autocomplete="off">
            </div>


          </div> <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label text-md-right">Phone</label>
            <div class="col-md-6">
              <input id="phone" type="text" class="form-control" v-model="phone" required
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
      firstname:null,
      lastname:null,
      patronymic:null,
      profession:null,
      email: null,
      phone: null,
      password: null,
      password_confirmation: null,
    }
  },
  methods: {
    register(){
      axios.get('/sanctum/csrf-cookie')
          .then(response => {
            console.log(response);
            axios.post('/register', {
              name: this.firstname,
              lastname: this.lastname,
              patronymic: this.patronymic,
              profession: this.profession,
              email: this.email,
              phone: this.phone,
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