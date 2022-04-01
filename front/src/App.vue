<template>
    <div id="app">
        <div class="wrapper">
            <router-view />
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            isAuth: true,
        }
    },
    mounted() {
        if(this.isAuth) {
            this.$router.push('/welcomepage')
        }
    },
}
</script>

<style lang="scss">
*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    border: 0;
}
a {
    text-decoration: none;
}

ul,
ol,
li {
    list-style: none;
}

html,
body,
#app {
    height: 100%;
    line-height: 1;
    background-color: rgba(255, 255, 255, 0.637);
    font-family: Arial, "Helvetika Neue", Helvetica, sans-serif;
}
.wrapper {
    margin: 0 calc(50vw - 512px);
    min-height: 100%;
    background: #F2ECEC;
}
</style>
