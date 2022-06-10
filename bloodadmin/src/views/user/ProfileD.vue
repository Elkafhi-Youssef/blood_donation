<template>
    <div>
        <Header/>
        <profileD/>
        <Footer/>
    </div>
</template>

<script >
import Header from '../../components/user/Header.vue'
import ProfileD from '../../components/user/ProfileD.vue'
import Footer from '../../components/user/Footer.vue'
export default {
    name: 'Layout',
    components: {
        Header,
        ProfileD,
        Footer
    },
    
}

</script>

<style  scoped>

</style>