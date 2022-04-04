<template>
    <div class="navigation">
        <ul>
            <li>
                <a href="#">Настройки</a>
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
    name: 'navigation',
}
</script>

<style lang="scss" scoped>
    .navigation{
        font-size: 16px;
        line-height: 21px;
        color: #897E7E;

        ul{
            padding-left: 20px;

            a{
                text-decoration: none;
                color: #897E7E;
            }
        }
    }
</style>