<template lang="jade">
div.page_index
  ul.slide_bullet
    li(data-link=".page_index_main")
    li(data-link=".page_index_grow")
    li(data-link=".page_index_live")
    li(data-link=".page_index_accurate")
    li(data-link=".section_solution")
    li(data-link=".page_index_sponsor")
    li(data-link=".detail_footer" style="display: none")

  section.page_index_main.bg_parallax
    .container
      .row
        .col-sm-12.text-center
          h1 為安全出發 
            span.color_theme 讓生活更美好
          h3.page_header_eng Better health, better life

    .container.news_container
      .news.color_white(v-for='(a_news,id) in news' v-bind:key="a_news" v-if="id==news_id")          
        .col_infos
          .texts
            h4 {{a_news.title}}
            h5 {{a_news.date}}
            p {{a_news.description}}
          .btns
            router-link.btn.btn-default.btn-primary-lighter.btn_more(:to="'/news/'+a_news.id") 了解更多
            a.btn.btn-default.btn-transparent.btn_next(@click="news_delta(1)" ) 下一則  > 
        
        .col_img(:style="'background-image: url('+a_news.cover+')'")
        .timeline
          .value(:style="'width:'+100*(news_time)/news_change_time+'%'")


  section.page_index_grow
    .container.flex
      .col_left
      .col_right
        h3.section_title 孩子成長的生活環境
        p.section_para.text-left 農產品從田間到通路銷售過程需要追蹤農藥殘留狀況。我們藉由農藥測像分析，再產銷供應鏈上執行進出手農殘檢測，可降低風險、保證品質，以確保農產符合法規標準，為守護民眾食安問題。<br><br>消費產品使用狀況趨多，健康風險成為關注焦點。特別是兒童用品，我們提供塑化劑檢測服務，為您所購買的生活日用品進行分析，排除居家安全憂慮，為下一代健康把關
        .percent.text-right(data-target=75) 75

  section.page_index_live
    .container.flex
      .col_left
        h3.section_title 從居家到工作環境
        p.section_para.text-left 農產品從田間到通路銷售過程需要追蹤農藥殘留狀況。我們藉由農藥測像分析，再產銷供應鏈上執行進出手農殘檢測，可降低風險、保證品質，以確保農產符合法規標準，為守護民眾食安問題。<br><br>消費產品使用狀況趨多，健康風險成為關注焦點。特別是兒童用品，我們提供塑化劑檢測服務，為您所購買的生活日用品進行分析，排除居家安全憂慮，為下一代健康把關
        router-link.btn.btn-primary(to='/tech') 了解更多
        .percent.text-right(data-target=42) 42
      .col_right
        

  section.page_index_accurate
    .container.flex
      .col_left
      .col_right
        h3.section_title 睿軒專注精準檢驗
        p.section_para.text-left 農產品從田間到通路銷售過程需要追蹤農藥殘留狀況。我們藉由農藥測像分析，再產銷供應鏈上執行進出手農殘檢測，可降低風險、保證品質，以確保農產符合法規標準，為守護民眾食安問題。
        router-link.btn.btn-transparent(to='tech') 了解更多
    .container.flex.type_container
      .row
        .acc_sm_pic(data-type=1)
          h4 採集樣品
        .acc_sm_pic(data-type=2)
          h4 &nbsp;
      .row
        .acc_sm_pic(data-type=3) 
          h4 進樣分析
        .acc_sm_pic(data-type=4) 
          h4 資料庫比對

  section_solutions

  section.page_index_sponsor
    .container.flex
      img.sponsorlogo(src="/img/homepage/surface-logo.png")
      img.sponsorlogo(src="/img/homepage/surface-logo.png")
      img.sponsorlogo(src="/img/homepage/surface-logo.png")
      img.sponsorlogo(src="/img/homepage/surface-logo.png")


</template>

<script>
    export default {
        data () {
          return {
                  news_id: 0,
                  news_time: 0,
                  news_change_time: 5000
                };
        },
        mounted() {
            console.log('index mounted.');
            setTimeout(function(){
              update_scroll(0);
            },200);
            var vobj=this;
            setInterval(()=>{
              vobj.news_time+=100;
              if (vobj.news_time>vobj.news_change_time){
                  this.news_delta(1);
              }
            },100);
            
            
        },
        methods: {
          news_delta: function(d){
            this.news_id=(this.news.length+d+this.news_id)%this.news.length;
            this.news_time=0;
          }
        },
        computed: Vuex.mapState(['news'])
    }
</script>