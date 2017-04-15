<template lang="jade">
div.page_job
  section.section_hero.bg_theme.bg_parallax
    .container.flex.column
      h1 人才招募
          p.description 兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。

  section.section_job

    .container.flex.row.wrap
      .job_box
        .job_box_inner
          h3.title 檢驗研發處 工程師
            i.fa.fa-link
          p 需求人數: 2 人 | 3~5 年以上經驗
          p 1. 熟悉LC / MS /MS儀器操作<br>2. 據檢測實驗室研發工作經驗者佳<br>3. 有儀器分析或食品檢測領域工作經驗<br> 地點：深圳
      .job_box
        .job_box_inner
          h3.title 工程師-1
            i.fa.fa-link
          p 需求人數: 2 人 | 3~5 年以上經驗
          p 1. 熟悉LC / MS /MS儀器操作 (分析方法確效及分析方法開發)<br>2. 有儀器分析或食品檢測領域工作經驗
      .job_box
        .job_box_inner
          h3.title 工程師-2
            i.fa.fa-link
          p 需求人數: 2 人 | 3~5 年以上經驗
          p 1. 熟悉LC / MS /MS儀器操作 <br>2. 有儀器分析或食品檢測領域工作經驗
          
      .row
        .col-sm-12
         
      hr


</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        mounted() {
            console.log('jobs')
        },
    }
</script>