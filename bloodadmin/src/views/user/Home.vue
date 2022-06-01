<template>
    <div>
        <Header/>
        <MainHome/>
        <FsHome/>
        <SsHome/>
        <Footer/>
    </div>
</template>

<script >
import Header from '../../components/user/Header.vue'
import MainHome from '../../components/user/MainHome.vue'
import FsHome from '../../components/user/FsHome.vue'
import SsHome from '../../components/user/SsHome.vue'
import Footer from '../../components/user/Footer.vue'
export default {
    name: 'Layout',
    components: {
        Header,
        MainHome,
        FsHome,
        SsHome,
        Footer
    },

    methods :{
         logout() {
      console.log("logout");
      localStorage.removeItem("token");
      localStorage.removeItem("user"); 
      this.$router.push("/");
    },
    }
}

</script>

<style  scoped>

</style>