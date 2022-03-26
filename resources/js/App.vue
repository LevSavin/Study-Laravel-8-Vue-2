<template>
    <div class="app">
        <Navbar></Navbar>
        <router-view></router-view>
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
}
</script>

<style scoped>

</style>
