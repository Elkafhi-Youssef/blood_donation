<template>
  <div class="flex h-screen bg-gray-200 font-roboto">
    <Sidebar/>

    <div class="flex-1 flex flex-col overflow-hidden">
      <Header/>

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 relative">
        <div class="container mx-auto px-6 py-8">
            <router-view />
        </div>
      </main>
      <Footer/>
    </div>
  </div>
</template>

<script setup >
import Sidebar from '../../components/admin/Sidebar.vue'
import Header from '../../components/admin/Header.vue'
import Footer from '../../components/admin/Footer.vue'
// export default {
//   name: 'Layout',
//   components: {
//     Sidebar,
//     Header,
//     Footer
//   }
// }

</script>
