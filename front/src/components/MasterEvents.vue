<template>
  <div>

    <h4 class="text-center" v-if="user">Услуги мастера: {{user.name}} </h4><br/>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Datetime</th>
        <th>Service</th>
        <th>Name</th>
        <th>LastName</th>
        <th>Phone</th>
        <th>Status</th>


      </tr>
      </thead>
      <tbody>
      <tr v-for="event in events" :key="event.id">
        <td>{{ event.id }}</td>
        <td>{{ event.datetime }}</td>
        <td>{{ event.service.name }}</td>
        <td>{{ event.name }}</td>
        <td>{{ event.lastname }}</td>
        <td>{{ event.phone }}</td>
        <td>{{ event.status }}</td>

        <td>

        </td>
      </tr>
      </tbody>
    </table>


  </div>
</template>

<script>
import axios from "@/api/axios";

axios.defaults.withCredentials = true;

export default {
  name: "MasterServices",
  data() {
    return {
      events: [],
      user: null,

    }
  },
  created() {

    axios.get('http://localhost:8000/sanctum/csrf-cookie').then(response => {
      console.log(response);
      axios.get('http://localhost:8000/api/master/events')

          .then(response => {
            console.log(response.data.events);
            this.events = response.data.events;

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