<template lang="jade">
div.page_solution(v-if="solu")
  section.section_hero.default_bg.bg_parallax(v-if="solu.title")
    .container
      h1.section_title {{solu.title}}
  section.section_solution_1
    .ab_center.size_full.bg_color_split
      .block_50_percent.bg_theme
      .block_50_percent(style="position: relative")
        .slick(data-timelime=".tl_s1",style="height: 100%")
          .item(style='height: 100%' v-for="item in JSON.parse(solu.carousel)")
            .img(:style="css_carousel(item)")
        .timeline.tl_s1
            .value

    .container.flex
      .bg_theme.col_left
        h4.section_title(v-text="solu.sub_title")
        p.section_para(v-html="solu.sub_content")
      .col_right
  section.section_solution_2.default_bg
    .container.flex
      .col_left
        h3 {{solu.test_item_title}}
        hr
        p(v-html="solu.test_item")
        div
          br
          br
          p 詳細檢驗項目歡迎與我聯絡&nbsp;&nbsp;&nbsp;&nbsp;
            router-link.btn.btn-primary(:to="'/contact/'+solu.id") {{$t("common.btn_contact_us")}}  
      .col_right
        .area_env
          h3 {{solu.env_title}}

          hr
          h4.envtext(v-html="solu.env")
        .area_type
          h3  {{solu.schedule_title}}
          hr
          p(v-html="solu.schedule")
  section.section_talk.bg_theme
    .container.flex.center
      .slick
        .talk_box(v-for="talk in solu.talk" style='height: 100%')
          .item(style='height: 100%')
            h2(v-text="talk.title")
            h4.text-right(v-text="talk.name")


  section_solutions(:slogan="solu.solution_area_slogan",:shown="solu.section_solution?JSON.parse(solu.section_solution).solutions:null",:exclude="[solu.id]")

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
            // document.title=this.solutions[0].title+" - 睿軒檢驗科技";
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
        props: ['id','title'],
        computed: {
          ...mapState(['solutions']),
          solu(){
            var target=this.solutions.filter((o)=>(o.id==this.id))[0];
            if (this.title)
              target=this.solutions.filter((o)=>(o.title==this.title))[0];
            return target?target:null

          },
          computed_shown_solution(){
           let original = this.$t('page_index.section_solution.solutions')
           if (original instanceof Array){
             return original.concat([this.solu.id])
           }else{
             return original
           }
            
         }
        },
        methods: {
          css_carousel(url){
            return {
              "background-image" : `url(${url})`,
              "background-size" : "cover",
              "height" : "100%"
            }
          }
        }
    }
</script>