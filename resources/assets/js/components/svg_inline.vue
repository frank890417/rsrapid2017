<template lang="jade">
  div.svg_inline(v-html="svg_html")
</template>


<script>
import axios from 'axios'
  export default {
    props: ["src"],
    data(){
      return {
        svg_html: ""
      }
    },
    mounted(){
      axios.get(this.src).then((r)=>{
        console.log(r)
        this.svg_html=r.data
      })
    }
  }
</script>

<style>
  
</style>