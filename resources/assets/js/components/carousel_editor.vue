<template lang='jade'>
  .container-fluid
    .row(v-for="(c,cid) in now_carousel_data")
      .col-sm-5
        div(:style="css_cover(c.url)")
      .col-sm-7
        h4 圖片{{cid+1}} 
          .btn.btn-default(@click="now_carousel_data.splice(cid,1)") x
        hr
        df_pic_selector(:output.sync="c.url")
        input.form-control(v-model="c.url" @value="set_pic(c,value)")
    .row
      .col-sm-12
        .ctn.btn.btn-default(@click="now_carousel_data.push({url:''})") 新增輪播圖
    input(:name=" input_name || 'carousel'" , :value="output_json" hidden)

</template>

<script>
    export default {
        props: ['input_name','carousel_data'],
        name: "carousel_editor",
        data(){
          return {
            // carousel_data: ["/img/homepage/Solution2.jpg","/img/homepage/Post2.jpg"]
            now_carousel_data: []
          }
        },
        watch: {
          carousel_data(){
            this.now_carousel_data
              =this.carousel_data.map( (t)=>({url: t}) )
          }
        },
        mounted() {
            console.log('example mounted.')
            this.now_carousel_data
              =this.carousel_data.map( (t)=>({url: t}) )
        },
        methods:{
          css_cover(url) {
            return {
              "background-image": `url(${url})`,
              "background-size": "cover",
              width: "100%",
              height: "200px",
              margin: "10px"
            }
          },
          css_default_block(url){
            return {
              "background-image": `url(${url})`,
              "background-size": "cover",
              width: "100px",
              height: "100px",
              margin: "5px",
              display: "inline-block"
            }
          },
          set_pic(obj,val){
            obj.url=val;
          }
        },
        computed: {
          output_json(){
            let outdata=this.now_carousel_data.map(o=>o.url).filter(o=>o!="");
            
            return JSON.stringify(outdata);
          }
        }
    }
</script>
