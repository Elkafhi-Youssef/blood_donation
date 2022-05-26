<template>
    <div>
        <Header/>
        <MainDonors/>
        <SsHome/>
        <Footer/>
    </div>
</template>

<script >
import Header from '../../components/user/Header.vue'
import MainDonors from '../../components/user/MainDonors.vue'
import FsHome from '../../components/user/FsHome.vue'
import SsHome from '../../components/user/SsHome.vue'
import Footer from '../../components/user/Footer.vue'
export default {
    name: 'Donors',
    components: {
        Header,
        MainDonors,
        FsHome,
        SsHome,
        Footer
    }
}

</script>

<style  scoped>

</style>