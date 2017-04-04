<template lang="jade">
div.page_solution
  section.section_hero.default_bg.bg_parallax
    .container-fluid
      .container
        .row
          .col-sm-12.text-center
            h1.section_title 校園環境健檢檢測計畫 
  section.section_solution_1
    .ab_center.size_full.bg_color_split
      .block_50_percent.bg_theme
      .block_50_percent.bg_theme(data-image="1")
    .container
      .row
        .col-sm-5.bg_theme
          h4.section_title 健康安全的成長環境
          p.section_para 塑膠產品使用狀況趨多，學子成長環境隱藏潛在風險，特別是常用的文玩具。我們提供塑化劑檢測服務，為各式塑膠類生活用品進行檢測分析，排除幼兒與兒童成長環境安全憂慮，為下一代健康把關。
        .col-sm-6.bg_parallax
  section.section_solution_2.default_bg
    .container
      .row
        .col-sm-6
          h3 檢驗項目
          hr
          p 塑化劑：8種鄰苯二甲酸酯類塑化劑(DEHP、DNOP、BBP、DINP、DIDP、DEP、DMP、DBP)
          div
            br
            br
            p 詳細檢驗項目歡迎與我聯絡&nbsp;&nbsp;&nbsp;&nbsp;
              a.btn.btn-primary(href="contact.html#1") 聯絡我們  
        .col-sm-6
          h3 適用環境

          hr
          h4.envtext 各級學校、補習班、幼兒園、托育中心等孩童活動空間。

          h3 方案類型
          hr
          p 單次方案: 一次性檢驗環境空間 
          p 週期方案:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12 (月)
  section.section_talk.bg_theme
    .container
      i.lr_btn.btn_pre
        .fa.fa-chevron-left
      i.lr_btn.btn.btn_post
        .fa.fa-chevron-right
      .row.talk_box.active
        .col-sm-8.col-sm-offset-2
          h2 針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。
          h4.text-right -阿里巴巴集團主席 馬雲
      .row.talk_box
        .col-sm-8.col-sm-offset-2
          h2 針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。
          h4.text-right -阿里巴巴集團主席 馬雲
  section_solutions

</template>

<script>
    export default {
        mounted() {
            console.log('solution mounted.')
        }
    }
</script>