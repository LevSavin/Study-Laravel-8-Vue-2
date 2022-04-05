<template>
    <div class="lk">
        <SideBar></SideBar>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import SideBar from '@/components/SideBar.vue'


export default {
    name: "PersonalCabinet",
        components: {
        SideBar,
    },
    mounted() {
        this.$router.push("/personalpage/bookingtable").catch(() => {});
    },
};
</script>

<style lang="scss" scoped>
.lk {
    height: 100%;
    background: rgb(242, 236, 236, 0.49);
    display: flex;
    .content {
        width: 100%;
    }

}
</style>
