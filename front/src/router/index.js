import Vue from "vue";
import VueRouter from "vue-router";
import WelcomePage from "@/pages/WelcomePage.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/welcomepage",
        name: "welcomepage",
        component: WelcomePage,
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

export default router;
