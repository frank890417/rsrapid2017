<template lang="jade">
div.page_tech(v-if="now_tech")
  section.section_hero.default_bg
    .container
      .col_hero
        h1.section_title.text-center {{now_tech.title}}
        p(v-html="now_tech.description")
        hr
        .conpany_logos(v-if="now_tech.id==1")
          img.company_logo(alt="永齡logo" src="/img/Rapid.png")
          img.company_logo(alt="中山大學logo" src="/img/homepage/tech_company_logo2.png")

  section.section_tech(v-if="now_tech.id==1")
    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl1",v-if="")
          .item(style='height: 100%' v-for='cover in now_tech.sections[0].slides')
            .img(:style="`background-image:url(${cover});background-size: cover; height: 100%;`")
        
        .timeline.tl1
            .value
      .block_50_percent
    .container.flex
      .col_left
      .col_right.col_content
        h3.section_title {{now_tech.sections[0].title}}
        svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_count.svg")
        p.section_para.text-left {{now_tech.sections[0].content}}
        a.btn.btn-primary 了解更多

  section.section_tech.section_manhead(v-if="now_tech.id==1")

    .ab_center.size_full.bg_color_split
      .block_50_percent
      .block_50_percent
        img.man_head_ab(src="/img/homepage/Tech3.png" alt="")
    .container.flex
      .col_left.col_content
        h3.section_title {{now_tech.sections[1].title}}
        svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_tube.svg")
        p.section_para.text-left(v-html='now_tech.sections[1].content')
        a.btn.btn-primary 了解更多
      .col_right
      //.col_right

  section.section_tech(v-if="now_tech.id==1")

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
          h3.section_title {{$t("page_tech.techs")[0].sections[2].title}}
          svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_cloud.svg")
          p.section_para.text-left(v-html="$t('page_tech.techs')[0].sections[2].content")
          a.btn.btn-primary 了解更多


  //else not not default tech
  section.section_tech(v-if="now_tech.id!=1")
    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl1")
          .item(style='height: 100%' v-for='cover in now_tech.sections[0].slides')
            .img(:style="`background-image:url(${cover});background-size: cover; height: 100%;`")
        .timeline.tl1
            .value
      .block_50_percent
    .container.flex
      .col_left
      .col_right.col_content
        h3.section_title {{now_tech.sections[0].title}}
        //svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_count.svg")
        p.section_para.text-left(v-html="now_tech.sections[0].content")
        a.btn.btn-primary 了解更多

  section.section_tech(v-if="now_tech.id!=1")

    .ab_center.size_full.bg_color_split
      .block_50_percent
      .block_50_percent
        
        .slick(data-timelime=".tl1")
          .item(style='height: 100%' v-for='cover in now_tech.sections[1].slides')
            .img(:style="`background-image:url(${cover});background-size: cover; height: 100%;`")
        .timeline.tl1
            .value

    .container.flex
      .col_left.col_content
        h3.section_title {{now_tech.sections[1].title}}
        //svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_tube.svg")
        p.section_para.text-left(v-html="now_tech.sections[1].content")
        a.btn.btn-primary 了解更多
      .col_right
      //.col_right

  section.section_tech(v-if="now_tech.id!=1")

    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl2")
          .item(style='height: 100%' v-for='cover in now_tech.sections[2].slides')
            .img(:style="`background-image:url(${cover});background-size: cover; height: 100%;`")
        .timeline.tl2
          .value
      .block_50_percent
    .container
      .container.flex
        .col_left
        .col_right.col_content
          h3.section_title {{now_tech.sections[2].title}}
          //svg_inline.dynamic_icon(src="/img/tech_icons/tech_icon_cloud.svg")
          p.section_para.text-left(v-html="now_tech.sections[2].content")
          a.btn.btn-primary 了解更多
  section_solutions(:shown="now_tech.section_solution?now_tech.section_solution.solutions:null")

</template>

<script>
import {mapState} from 'vuex'
import svg_inline from './svg_inline'
export default {
    props: ['id','title'],
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
        // console.log("TECH",this.$t("page_tech.techs").find(o=>o.title==this.title))
        
        if (this.id)
          return this.$t("page_tech.techs")[this.id]
        else
          return this.$t("page_tech.techs").find(o=>o.title==this.title)

      }
    }
}
</script>