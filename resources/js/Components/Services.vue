<template>
    <div>
        <h4 class="text-center">All Services</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
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
                <td>{{ service.created_at }}</td>
                <td>{{ service.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editservice', params: { id: service.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteService(service.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="$router.push({name:'addservice'})">Add Service</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            services: []
        }
    },
    created() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('/api/services')
                .then(response => {
                    this.services = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteService(id) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.delete(`/api/services/delete/${id}`)
                    .then(response => {
                        let i = this.services.map(item => item.id).indexOf(id); // find index of your object
                        this.services.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
