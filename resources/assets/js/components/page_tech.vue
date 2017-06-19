<template lang="jade">
div.page_tech(v-if="now_tech")
  section.section_hero.default_bg
    .container
      .col_hero
        h1.section_title.text-center {{now_tech.title}}
        p {{now_tech.description}}
        hr
        .conpany_logos
          img.company_logo(alt="永齡logo" src="/img/Rapid.png")
          img.company_logo(alt="中山大學logo" src="/img/homepage/tech_company_logo2.png")

  section.section_tech

    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl1")
          .item(style='height: 100%')
            .img(style="background-image:url(/img/homepage/Tech2.jpg);background-size: cover; height: 100%;")
          .item(style='height: 100%')
            .img(style="background-image:url(/img/homepage/Home1.jpg);background-size: cover; height: 100%;")
        .timeline.tl1
            .value
      .block_50_percent
    .container.flex
      .col_left
      .col_right.col_content
        h3.section_title 五秒高效快篩
        svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_count.svg")
        p.section_para.text-left 不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。
        a.btn.btn-primary 了解更多

  section.section_tech.section_manhead

    .ab_center.size_full.bg_color_split
      .block_50_percent
      .block_50_percent
        img.man_head_ab(src="/img/homepage/Tech3.png" alt="")
    .container.flex
      .col_left.col_content
        h3.section_title 獨家探針，多樣檢測
        svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_tube.svg")
        p.section_para.text-left 獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。
        a.btn.btn-primary 了解更多
      .col_right
      //.col_right

  section.section_tech

    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl2")
          .item(style='height: 100%;width: 100%')
            .img(style="background-image:url(/img/homepage/Tech4.jpg);background-size: cover; height: 100%;")
        .timeline.tl2
          .value
      .block_50_percent
    .container
      .container.flex
        .col_left
        .col_right.col_content
          h3.section_title 雲端即時報告
          svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_cloud.svg")
          p.section_para.text-left 同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。
          a.btn.btn-primary 了解更多
  section_solutions

</template>

<script>
import {mapState} from 'vuex'
import svg_inline from './svg_inline'
export default {
    props: ['id'],
    data(){
      return {
        timer_list: []
      }
    },
    mounted() {
      var vobj=this;
      console.log('tech mounted.');
      $('.slick').each(function(index,obj){
        var tl=$($(obj).attr("data-timelime") + " .value");
        $(obj).slick({
          autoplay: false,
          autoplaySpeed: 4000,
          dots: true,
          fade: true,
          arrows: false,
          speed: 700,
          easing: 'linear'
        });
        function delta(){

          $(obj).slick("slickNext");
          tl.stop();
          tl.animate({"width":"0%"},0);
          tl.animate({"width":"100%"},4000);
        
        }
        delta();
        
        var timer=setInterval(delta,4000);
        vobj.timer_list.push(timer);
      });
    },beforeDestroy() {
      this.timer_list.map(obj=>clearInterval(obj));
      this.timer_list=[];
    },
    components: {
      svg_inline
    },
    computed: {
      ...mapState(['techs']),
      now_tech(){
        if (this.techs[this.id]){
          return this.techs[this.id]
        }else{
          return null
        }
      }
    }
}
</script>