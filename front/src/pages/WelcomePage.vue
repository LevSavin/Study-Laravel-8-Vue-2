<template>
    <div class="welcome">
        <img class="welcome_logo" src="../assets/logo.png" alt="" />
        <h5 class="welcome_text">
            Free Beauty - это проект,который позволяет абсолютно бесплатно
            организовать онлайн запись мастерам частной практики, чьи услуги
            завязаны на времени.
        </h5>
        <form class="welcome_form">
            <p class="welcome_form_text">Добро Пожаловать!</p>
            <input
                class="welcome_form_login"
                type="text"
                name="login"
                id="login"
                placeholder="Email / Phone"
                maxlength="30"
                v-model="login"
            />
            <input
                class="welcome_form_pass"
                type="text"
                name="pass"
                id="pass"
                placeholder="Password..."
                maxlength="30"
                v-model="pass"
            />
            <button class="welcome_form_btn" @click.prevent="getResult">
                ВОЙТИ
            </button>
            <p class="welcome_form_regText">
                Если у вас еще нет аккаунта -
                <a class="welcome_form_link" href="№">Зарегистрируйтесь</a>
            </p>
        </form>
    </div>
</template>

<script>
export default {
    name: "WelcomePage",
    data() {
        return {
            login: "",
            pass: "",
            result: "",
        };
    },
    methods: {
        getResult() {
            this.$emit('sign-in', true)
        },
    },
};
</script>

<style lang="scss" scoped>
.welcome {
    background-color: #f2ecec;
    position: relative;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    &_logo {
        position: absolute;
        left: 0;
        top: 0;
        width: 300px;
    }
    &_text {
        width: 640px;
        text-align: center;
        margin: 24px;
        line-height: 32px;
        font-size: 16px;
        color: rgba(111, 110, 110, 1);
        font-family: monospace;
    }
    &_form {
        width: 420px;
        height: 320px;
        background-color: rgba(171, 237, 170, 1);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        &_text {
            margin-bottom: 24px;
            font-weight: 500;
            font-size: 24px;
        }
        &_login,
        &_pass {
            width: 200px;
            height: 40px;
            border-radius: 10px;
            padding: 0 24px;
            margin-bottom: 24px;
            outline: none;
            &:focus {
                font-size: 16px;
                box-shadow: inset 0 0 10px -5px black;
            }
        }
        &_btn {
            width: 100px;
            height: 40px;
            border-radius: 10px;
            background-color: rgba(117, 174, 241, 1);
            color: #ffffff;
            &:hover {
                background-color: rgb(126, 179, 240);
            }
            &:active {
                box-shadow: inset 0 0 10px -5px black;
            }
        }
        &_regText {
            text-align: center;
            font-size: 10px;
            margin-top: 24px;
        }
        &_link {
            text-decoration: underline;
        }
    }
}
</style>
