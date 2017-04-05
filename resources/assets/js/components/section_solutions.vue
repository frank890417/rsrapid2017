<template lang='jade'>
section.section_solution
  .container.text-center
    .row
      .col-sm-12
        h3.section_title 專業檢驗方案
    .row.solution_box_row
      .solution_box.col-sm-4
        .box_inner
          .box_info
            h4.solution_title 校園環境健檢<br>檢測計畫
            router-link.btn.btn-default.btn-primary(to="/solution/0") 了解更多
      .solution_box.col-sm-4
        .box_inner
          .box_info
            h4.solution_title 校園食材健檢<br>檢測計畫
            router-link.btn.btn-default.btn-primary(to="/solution/1") 了解更多
      .solution_box.col-sm-4
        .box_inner
          .box_info
            h4.solution_title 農場作物自主管理<br>檢測計畫
            router-link.btn.btn-default.btn-primary(to="/solution/2") 了解更多
    .row.row_else.text-center
      .col-sm-12
        h4.slogan 我們為您制定周全的環境健檢計畫!
        a.btn.btn-default.btn-primary 聯絡我們  
</template>

<script>

    export default {
        props: ["id"],
        mounted() {
            console.log('solutions mounted.')
        },

    }
</script>