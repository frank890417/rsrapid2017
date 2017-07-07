<template lang='jade'>
  .container-fluid.carousel_editor
    .row(v-for="(c,cid) in now_carousel_data")
      .col-sm-5
        div.preview(:style="css_cover(c.url)")
      .col-sm-7
        h4 {{c.url==""?"請選擇":""}}圖片{{ options.allow_multi?(cid+1):"" }} 
          .btn.btn-default(@click="now_carousel_data.splice(cid,1)") x
        hr
        df_pic_selector(:output.sync="c.url")
        input.form-control(v-model="c.url" @value="set_pic(c,value)")
    .row
      .col-sm-12(v-if="options.allow_multi || now_carousel_data.length<1")
        .ctn.btn.btn-default(@click="now_carousel_data.push({url:''})") 新增圖片
    input(:name=" input_name || 'carousel'" , :value="output_json" hidden)

</template>

<script>
    export default {
        props: ['input_name','carousel_data','allow_multi'],
        name: "carousel_editor",
        data(){
          return {
            // carousel_data: ["/img/homepage/Solution2.jpg","/img/homepage/Post2.jpg"]
            now_carousel_data: [],
            options: {
              allow_multi: true
            }
          }
        },
        // watch: {
        //   carousel_data(){
        //     this.now_carousel_data
        //       =this.carousel_data.map( (t)=>({url: t}) )
        //   }
        // },
        mounted() {
            console.log('example mounted.')
            console.log(this.carousel_data)
            this.options.allow_multi=(typeof this.allow_multi!="undefined")?this.allow_multi:this.options.allow_multi;  
            console.log(this.options.allow_multi)

            if (typeof this.carousel_data == "string"){
              this.now_carousel_data   =[this.carousel_data]
            }else{
              this.now_carousel_data
                =this.carousel_data.map( (t)=>({url: t}) )
            }           
        },
        methods:{
          css_cover(url) {
            return {
              "background-image": `url(${url.replace(" ","%20")})`,
              "background-size": "cover",
              width: "100%",
              height: "200px",
              margin: "10px"
            }
          },
          css_default_block(url){
            return {
              "background-image": `url(${url.replace(" ","%20")})`,
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
            if (!this.options.allow_multi){
              var outdata_single=this.now_carousel_data.map(o=>o.url).filter(o=>o!="")[0];
              this.$emit("update:carousel_data",outdata_single);
              return outdata_single
            }
            this.$emit("update:carousel_data",outdata);
            return JSON.stringify(outdata);
          }
        }
    }
</script>

<style scoped lang="sass?indentedSyntax">
  .carousel_editor
    .preview
      background-color: #eee
</style>