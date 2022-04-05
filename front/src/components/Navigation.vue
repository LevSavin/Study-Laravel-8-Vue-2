<template>
    <div class="navigation">
        <ul>
            <li>
                <router-link to="/personalpage/bookingtable">Расписание</router-link>
            </li>
            <li>
                <router-link to="/personalpage/preferences">Настройки</router-link>
            </li>
            <li>
                <a href="#">Услуги</a>
            </li>
            <li>
                <a href="#">Клиенты</a>
            </li>
            <li>
                <a href="#">Финансы</a>
            </li>
            <li>
                <a href="#">Обратная связь</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "NavigationComp",
};
</script>

<style lang="scss" scoped>
.navigation {
    font-size: 16px;
    line-height: 21px;
    color: #897e7e;

    ul {
        padding-left: 20px;

        a {
            text-decoration: none;
            color: #897e7e;
        }
    }
}
</style>
