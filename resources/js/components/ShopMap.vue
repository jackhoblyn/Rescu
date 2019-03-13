<template>

  <GmapMap
  :center="center"
  :zoom="zoom"
  style="..."
>
  <GmapMarker
    :key="index"
    v-for="(m, index) in markers"
    :position="m.position"
    :clickable="true"
    :draggable="true"
    @click="center=m.index"
  />

   <gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen" @closeclick="infoWinOpen=false">
      <info-content :content="infoContent"></info-content>
    </gmap-info-window>

  </GmapMap>
</template>

<script>
  export default {
      data () {
      return {
        center: {lat: 10.0, lng: 10.0},
        
        markers: [{
          position: {lat: 10.0, lng: 10.0}
        }, {
          position: {lat:11.0, lng:11.0}
        }]
      }
    }
  }
</script>
          