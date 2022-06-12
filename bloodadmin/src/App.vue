<template>
  <router-view/>
</template>


<script>
export default {
 
  async mounted(){
    const token  = localStorage.getItem("token");
    await this.$store.dispatch("isTokenExpired",token);
    console.log('value of state',this.$store.state.tokenExpired);
     if(this.$store.state.tokenExpired){
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      localStorage.removeItem("idProfileDonor");
      this.$router.push("/loginuser");
      console.log(" here token expired");
    }else console.log("token not expired");
  }
  ,

}
</script>

<style>
</style>
