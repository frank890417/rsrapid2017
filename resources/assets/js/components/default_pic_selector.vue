<template lang='jade'>
  div.default_pic_selector
    .btn-groups
      .btn.btn-default(@click="status.default_open=!status.default_open") 選擇預設圖庫
      .btn.btn-default 上傳圖片
    .panel(v-show="status.default_open")
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
              default_open: false
            },
            now_index: 0
            
          }
        },
        mounted() {
            console.log('example mounted.')
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
            this.status.default_open=false
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
