<template lang="jade">
div.page_solution
  div(v-for="solu in [solutions[id]]")
    section.section_hero.default_bg.bg_parallax(v-if="solu.title")
      .container
        h1.section_title {{solu.title}}
    section.section_solution_1
      .ab_center.size_full.bg_color_split
        .block_50_percent.bg_theme
        .block_50_percent(style="position: relative")
          .slick(data-timelime=".tl_s1")
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Solution2.jpg);background-size: cover; height: 100%;")
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Post2.jpg);background-size: cover; height: 100%;")
          .timeline.tl_s1
              .value

      .container.flex
        .bg_theme.col_left
          h4.section_title(v-text="solu.sub_title")
          p.section_para(v-text="solu.sub_content")
        .col-sm-6.bg_parallax
    section.section_solution_2.default_bg
      .container.flex
        .col_left
          h3 檢驗項目
          hr
          p(v-html="solu.test_item")
          div
            br
            br
            p 詳細檢驗項目歡迎與我聯絡&nbsp;&nbsp;&nbsp;&nbsp;
              router-link.btn.btn-primary(:to="'/contact/'+solu.id") 聯絡我們  
        .col_right
          .area_env
            h3 適用環境

            hr
            h4.envtext(v-html="solu.env")
          .area_type
            h3 方案類型
            hr
            p(v-html="solu.schedule")
    section.section_talk.bg_theme
      .container.flex.center
        .slick
          .talk_box(v-if="solu.talk[0]" style='height: 100%')
            .item(style='height: 100%')
              h2(v-text="solu.talk[0].title")
              h4.text-right(v-text="solu.talk[0].name")

          .talk_box(v-if="solu.talk[0]" style='height: 100%')
            .item(style='height: 100%')
              h2(v-text="solu.talk[0].title")
              h4.text-right(v-text="solu.talk[0].name")

    section_solutions(:slogan="solu.solution_area_slogan")

</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        data(){
          return {
            timer_list: []
          }
        },
        mounted() {
            console.log('solution mounted.')
            document.title=this.solutions[0].title+" - 睿軒檢驗科技";
            var vobj=this;
            $('.slick').each(function(index,obj){
              var tl=$($(obj).attr("data-timelime") + " .value");
              $(obj).slick({
                autoplay: false,
                autoplaySpeed: 4000,
                dots: true,
                fade: true,
                speed: 700,
                arrows: false,
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
            // if (Ts) Ts.reload();
        },beforeDestroy() {
          this.timer_list.map(obj=>clearInterval(obj));
          this.timer_list=[];
        },
        props: ['id'],
        computed: mapState(['solutions'])
    }
</script>