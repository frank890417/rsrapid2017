<template lang='jade'>
  div.default_pic_selector
    .btn-groups
      .btn.btn-default(@click="status.open=!status.open") 選擇預設圖庫 {{status.open?'▲':'▼'}}
      .btn.btn-default.btn-dropzone(:data-hash="hash") 上傳圖片
    .panel(v-show="status.open")
      .panel_body
        div(v-for="pic in default_set.slice(now_index*16,(now_index+1)*16)",:style="css_default_block('/img/default/icon/'+pic)", @click="output_result('/img/default/'+pic)")
        div
          .btn.pull_left(@click="delta(-1)") <
          .btn.pull_right(@click="delta(1)") >
    

</template>

<script>
    export default {
        props: ['output'],
        name: "default_pic_selector",
        data(){
          return {
            // carousel_data: ["/img/homepage/Solution2.jpg","/img/homepage/Post2.jpg"]
            default_set: ["siteimage1.jpg","siteimage10.jpg","siteimage11.jpg","siteimage12.jpg","siteimage13.jpg","siteimage14.jpg","siteimage15.jpg","siteimage16.jpg","siteimage17.jpg","siteimage18.jpg","siteimage19.jpg","siteimage2.jpg","siteimage20.jpg","siteimage21.jpg","siteimage22.jpg","siteimage23.jpg","siteimage24.jpg","siteimage25.jpg","siteimage26.jpg","siteimage27.jpg","siteimage28.jpg","siteimage29.jpg","siteimage3.jpg","siteimage4.jpg","siteimage5.jpg","siteimage6.jpg","siteimage7.jpg","siteimage8.jpg","siteimage9.jpg"],
            status: {
              open: false
            },
            now_index: 0,
            hash: parseInt(Math.random()*1000000)
          }
        },
        mounted() {
          let vobj=this;
           console.log('picture picker mounted.')
          function gen_dz(classname,callback){  
            console.log(classname);
            var myDropzone = new Dropzone(classname, {
              url: "/api/upload",maxFiles: 1
              ,sending: function(){
               
              }
              ,success: function(evt,res){
                callback(evt,res);
              }
            });
         
            myDropzone.on("complete", function(file) {
              myDropzone.removeFile(file);              
            });
          }

          gen_dz(`.btn-dropzone[data-hash='${this.hash}']`,function(evt,res){
             console.log(res);
             var imgurl=res;
             console.log(imgurl);
             vobj.$emit("update:output",imgurl)
          });
        },
        methods:{
          css_default_block(url){
            return {
              "background-image": `url(${url})`,
              "background-size": "cover",
              width: "100px",
              height: "100px",
              margin: "5px",
              display: "inline-block",
              cursor: "pointer"
            }
          },
          output_result(url){
            // this.output.data=url
            this.status.open=false
            this.$emit("update:output",url)
            console.log(url)
          },
          delta(d){
            if (d> 0 && this.now_index<1){
              this.now_index+=d
            }else if (d< 0 && this.now_index>0){
              this.now_index+=d
            }
          }
        }
    }
</script>
