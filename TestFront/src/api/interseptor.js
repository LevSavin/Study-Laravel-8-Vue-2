import axios from "@/api/axios";
import router from "@/router";
axios.interceptors.response.use({},err => {
    if (err.response.status === 401 || err.response.status === 419) {
        router.push({name: 'login'})
    }
})