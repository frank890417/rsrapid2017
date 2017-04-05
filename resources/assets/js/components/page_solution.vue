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
        .block_50_percent.bg_theme(data-image="1")
      .container
        .row
          .col-sm-5.bg_theme
            h4.section_title(v-text="solu.sub_title")
            p.section_para(v-text="solu.sub_content")
          .col-sm-6.bg_parallax
    section.section_solution_2.default_bg
      .container
        .row
          .col-sm-6
            h3 檢驗項目
            hr
            p(v-text="solu.test_item")
            div
              br
              br
              p 詳細檢驗項目歡迎與我聯絡&nbsp;&nbsp;&nbsp;&nbsp;
                router-link.btn.btn-primary(to="/contact") 聯絡我們  
          .col-sm-6
            h3 適用環境

            hr
            h4.envtext(v-text="solu.env")

            h3 方案類型
            hr
            p(v-text="solu.schedule")
    section.section_talk.bg_theme
      .container
        i.lr_btn.btn_pre
          .fa.fa-chevron-left
        i.lr_btn.btn.btn_post
          .fa.fa-chevron-right
        .row.talk_box.active(v-if="solu.talk[0]")
          .col-sm-8.col-sm-offset-2
            h2(v-text="solu.talk[0].title")
            h4.text-right(v-text="solu.talk[0].name")
        
    section_solutions

</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        mounted() {
            console.log('solution mounted.')
        },
        props: ['id'],
        computed: mapState(['solutions'])
    }
</script>