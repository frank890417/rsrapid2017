<template lang='jade'>
section.section_solution
  .container
    h3.section_title 專業檢驗方案
    .container.flex
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 校園環境健檢<br>檢測計畫
            .box_btn
              router-link.btn.btn-primary(to="/solution/0") 了解更多
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 校園食材健檢<br>檢測計畫
            .box_btn 
              router-link.btn.btn-primary(to="/solution/1") 了解更多
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 農場作物自主管理<br>檢測計畫
            .box_btn  
              router-link.btn.btn-primary(to="/solution/2") 了解更多
    h4.slogan {{ slogan?slogan:"我們為您制定周全的環境健檢計畫" }}
    router-link.btn.btn-primary(to="/contact") 聯絡我們  
</template>

<script>

    export default {
        props: ["id","slogan"],
        mounted() {
            console.log('solutions mounted.')
        },

    }
</script>