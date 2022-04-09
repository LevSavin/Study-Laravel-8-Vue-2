<template>
  <div>
    Get
  </div>
</template>

<script>
 import axios from "@/api/axios";
// import router from "@/router";
// axios.interceptors.response.use({},err => {
//   if (err.response.status === 401 || err.response.status === 419) {
//     router.push({name: 'login'})
//   }
// })
export default {
  name: "GetPage",
  mounted() {
    this.getData()
  },
  methods: {
    getData(){
      axios.get('/api/services')
      .then(res => {
        console.log(res);
      })
    }
  }
}
</script>

<style scoped>

</style>