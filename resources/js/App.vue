<template>
    <div class="app">
        <Navbar></Navbar>
        <div class="container">
            <div class="text-center" style="margin: 20px 0px 20px 0px;">

                <span class="text-secondary">Laravel SPA with Vue , Auth (Sanctum), CURD Example</span>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <!-- for logged-in user-->
                    <div class="navbar-nav" v-if="isLoggedIn">
                        <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                        <router-link to="/services" class="nav-item nav-link">Services</router-link>
                        <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                    </div>
                    <!-- for non-logged user-->
                    <div class="navbar-nav" v-else>
                        <router-link to="/" class="nav-item nav-link">Home</router-link>
                        <router-link to="/login" class="nav-item nav-link">login</router-link>
                        <router-link to="/register" class="nav-item nav-link">Register
                        </router-link>
                        <router-link to="/about" class="nav-item nav-link">About</router-link>
                    </div>
                </div>
            </nav>
            <br/>
            <router-view></router-view>
        </div>





        <MainFooter :homeUrl="'/'"></MainFooter>
    </div>
</template>

<script>
import Navbar from './Components/Navbar.vue';
import MainFooter from './Components/MainFooter.vue';

export default {
    name: 'app',
    components: {
        Navbar,
        MainFooter,
    },
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
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
