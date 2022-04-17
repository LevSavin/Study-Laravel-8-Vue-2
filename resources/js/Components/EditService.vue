<template>
    <div>
        <h4 class="text-center">Edit Service</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateService">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="service.name">
                    </div>

                    <div class="form-group">
                        <label>Описание</label>
                        <input type="text" class="form-control" v-model="service.description">
                    </div>

                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text" class="form-control" v-model="service.price">
                    </div>

                    <div class="form-group">
                        <label>Длительность</label>
                        <input type="time" class="form-control" v-model="service.interval">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            service: {}
        }
    },
    created() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get(`/api/services/edit/${this.$route.params.id}`)
                .then(response => {
                    console.log(response.data);
                    this.service = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateService() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post(`/api/services/update/${this.$route.params.id}`, this.service)
                    .then(response => {
                        this.$router.push({name: 'services'});
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
