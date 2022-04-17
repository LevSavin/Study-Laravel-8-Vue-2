<template>
<div>Personal
    <div v-if="userInfo">{{userInfo.lastname}} {{userInfo.name}} {{userInfo.patronymic}}</div>
</div>

</template>

<script>
import axios from "@/api/axios";
export default {
  name: "PersonalPage",
  data() {
    return {
      userInfo: null,
    };
  },
  created() {
    axios.get('/sanctum/csrf-cookie').then(() => {
      axios.get('/api/user').then(res => {

        this.userInfo = res.data.user;
        console.log(this.userInfo);
      })
    });
  },
}
</script>

<style scoped>

</style>