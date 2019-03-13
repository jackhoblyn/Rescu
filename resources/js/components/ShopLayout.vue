<template>
  <app id="inspire">
            
         <shop-map></shop-map>

  </app>
</template>

<script>
export default {
  props: {
    source: String
  },
  mounted() {
   
  }
};
</script>

<style scoped>
#keep main .container {
  height: 660px;
}
.navigation-drawer__border {
  display: none;
}
.text {
  font-weight: 400;
}
.autocomplete {
  width: 200px;
}
</style>