<template lang="jade">
div.page_solution
  div(v-for="solu in [solutions[id]]")
    section.section_hero.default_bg.bg_parallax
      .container-fluid
        .container
          .row
            .col-sm-12.text-center
              h1.section_title(v-text="solu.title") 
    section.section_solution_1
      .ab_center.size_full.bg_color_split
        .block_50_percent.bg_theme
        .block_50_percent(style="position: relative")
          .slick
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Solution2.jpg);background-size: cover; height: 100%;")
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Post2.jpg);background-size: cover; height: 100%;")

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
              router-link.btn.btn-primary(to="/contact") 聯絡我們  
        .col_right
          h3 適用環境

          hr
          h4.envtext(v-html="solu.env")

          h3 方案類型
          hr
          p(v-html="solu.schedule")
    section.section_talk.bg_theme.slick
      .container
        .row.talk_box.active(v-if="solu.talk[0]")
          .item(style='height: 100%')
            h2(v-text="solu.talk[0].title")
            h4.text-right(v-text="solu.talk[0].name")
      .container
        .row.talk_box.active(v-if="solu.talk[0]")    
          .item(style='height: 100%')
            h2(v-text="solu.talk[0].title")
            h4.text-right(v-text="solu.talk[0].name")

    

      

        
    section_solutions

</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        mounted() {
            console.log('solution mounted.')
            $('.slick').slick({
              autoplay: true,
              autoplaySpeed: 5000,
              dots: true,
              easing: 'ease-in'
            });
        },
        props: ['id'],
        computed: mapState(['solutions'])
    }
</script>