<template>
    <div class="container">
        <UserInfo></UserInfo>
        <DatePicker></DatePicker>
        <Navigation></Navigation>
        <Authorization></Authorization>
    </div>
</template>

<script>
import UserInfo from '@/components/UserInfo.vue';
import DatePicker from '@/components/DatePicker.vue';
import Navigation from '@/components/Navigation.vue';
import Authorization from '@/components/Authorization.vue'

export default {
    name: 'SideBar',
    components: {
        UserInfo,
        DatePicker,
        Navigation,
        Authorization
    },
}
</script>

<style lang="scss" scoped>
    .container{
        background: #ABEDAA;
        width: 256px;
        position: fixeabd;
        top: 0;
        left: 0;
        height: 100vh;
        padding: 20px;
    }
</style>
