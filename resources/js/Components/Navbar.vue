<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img :src="img.logo" :alt="labels.APP_NAME" width="100">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto nav-pills">

                    <!--                        <li class="nav-item mx-2">-->
                    <!--                            <router-link class="nav-link px-3" to="/ru/client/profile">Профиль</router-link>-->
                    <!--                        </li>-->

                </ul>

                <!-- Right Side Of Navbar -->
                <!--                    <ul class="navbar-nav ml-auto">-->
                <!--                        <li class="nav-item dropdown">-->
                <!--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                                {{ user.first_name }} {{ user.last_name }} <span class="caret"></span>-->
                <!--                            </a>-->

                <!--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
                <!--                                <a class="dropdown-item" href="#" @click.prevent="logout()">-->
                <!--                                    Выйти-->
                <!--                                </a>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                    </ul>-->
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'navbar',
    data() {
        return {
            img: {
                logo: '/img/logo2.png'
            },
            labels: {
                APP_NAME: process.env.MIX_APP_NAME
            },
        };
    },
}
</script>

<style scoped>

</style>
