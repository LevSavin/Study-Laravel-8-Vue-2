<template>
  <div>

    <h4 class="text-center" v-if="user">Услуги мастера: {{user.name}} </h4><br/>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Interval</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="service in services" :key="service.id">
        <td>{{ service.id }}</td>
        <td>{{ service.name }}</td>
        <td>{{ service.description }}</td>
        <td>{{ service.price }}</td>
        <td>{{ service.interval }}</td>
        <td>{{ service.created_at }}</td>
        <td>{{ service.updated_at }}</td>

        <td>
          <!--<div class="btn-group" role="group">
            <router-link :to="{name: 'editservice', params: { id: service.id }}" class="btn btn-primary">Edit
            </router-link>
            <button class="btn btn-danger" @click="deleteService(service.id)">Delete</button>
          </div>-->
        </td>
      </tr>
      </tbody>
    </table>

    <button type="button" class="btn btn-info" @click="$router.push({name:'addservice'})">Add Service</button>
  </div>
</template>

<script>
import axios from "@/api/axios";

axios.defaults.withCredentials = true;

export default {
  name: "MasterServices",
  data() {
    return {
      services: [],
      user: null,
    }
  },
  created() {

    axios.get('http://localhost:8000/sanctum/csrf-cookie').then(response => {
      console.log(response);
      axios.get('http://localhost:8000/api/services')

          .then(response => {
            console.log(response.data);
            this.services = response.data.services;
            this.user = response.data.user[0];
          })
          .catch(function (error) {
            console.error(error);
          });
    })
  },
  methods: {
    deleteService(id) {
      axios.get('http://localhost:8000/sanctum/csrf-cookie').then(response => {
        console.log(response);
        axios.delete(`http://localhost:8000/api/services/delete/${id}`)
            .then(response => {
              console.log(response);
              let i = this.services.map(item => item.id).indexOf(id); // find index of your object
              this.services.splice(i, 1)
            })
            .catch(function (error) {
              console.error(error);
            });
      })
    }
  },
}
</script>

<style scoped>

</style>