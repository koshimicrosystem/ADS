<template>
  <div v-if="loading" id="overlay">
    <!-- <div id="text">Overlay Text</div> -->
    <img id="text" src="/media/spinner/loading.gif" alt="loading">
  </div>
</template>
<script>
export default {
    mounted() {
    console.log("Component Overlay.");
  },
    props: ['loading']
};
</script>
<style>
#overlay {
  position: fixed;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 99999;
  cursor: pointer;
}
/* 9939644743  mira balahata */ 
#text {
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
</style>