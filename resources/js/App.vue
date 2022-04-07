<template>
    <div class="app">
        <SideBar></SideBar>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import SideBar from '../../front/src/components/SideBar.vue';
import MainTable from './Pages/MainTable.vue';

export default {
    name: 'app',
    components: {
        SideBar,
        MainTable
    },
}
</script>

<style lang="scss" scoped>
.app {
    height: 100%;
    background: rgb(242, 236, 236, 0.49);

    .content {
        margin-left: 256px;
    }
}
</style>
