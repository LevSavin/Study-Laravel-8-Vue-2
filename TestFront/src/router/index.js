import Vue from "vue";
import VueRouter from "vue-router";
import MasterServices from "@/components/MasterServices";
import LoginPage from "@/components/LoginPage";
import IndexPage from "@/components/IndexPage";


Vue.use(VueRouter);

const routes = [
    {
        path: "/login",
        name: "login",
        component: LoginPage,
    },

    {
        path: "/",
        name: "IndexPage",
        component: IndexPage,
    },

    {
        path: "/services",
        name: "services",
        component: MasterServices,
    },

    {
        path: '/get',
        component: () =>import('../components/GetPage'),
        name: "get"
    },

    {
        path: '/registration',
        component: () =>import('../components/RegistrationPage'),
        name: "registration"
    },

    {
        path: '/user/personal',
        component: () =>import('../components/PersonalPage'),
        name: "personal"
    },

];



const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next)=>{
    const token = localStorage.getItem('x_xsrf_token');

    //не авторизован: нет токена
    if(!token) {
        //если пользователь хочет пойти на страницы
        if(to.name === 'login' || to.name === 'registration'){
            return next();
        } else  {
            //пользователь хочет пойти на другие страницы
            return next({
                name: 'login'
            })
        }
    }
    //  авторизован: есть токен
    if(token && to.name === 'login' || to.name === 'registration' ){
        return next({
            name: 'personal'
        })
    }
    next();
})
export default router;
