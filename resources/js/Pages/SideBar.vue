<template>
    <div class="container">
        <UserInfo></UserInfo>
        <DatePicker></DatePicker>
        <Navigation></Navigation>
        <Authorization></Authorization>
    </div>
</template>

<script>
import UserInfo from '../Components/UserInfo.vue';
import DatePicker from '../Components/DatePicker.vue';
import Navigation from '../Components/Navigation.vue';
import Authorization from '../Components/Authorization.vue'

export default {
    name: 'sidebar',
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
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        padding: 20px;
    }
</style>