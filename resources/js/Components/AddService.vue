<template>
    <div>
        <h4 class="text-center">Add Service</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addService">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="service.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="service.description">
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text" class="form-control" v-model="service.price">
                    </div>

                    <div class="form-group">
                        <label>Интервал</label>
                        <input type="time" class="form-control" v-model="service.interval">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Service</button>
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
    methods: {
        addService() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/services/add', this.service)
                    .then(response => {
                        this.$router.push({name: 'services'})
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
