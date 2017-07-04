<template lang='jade'>
section.section_solution
  .container
    h3.section_title 專業檢驗方案
    .container.flex
      //.solution_box(v-for="solu in solutions")
        .box_inner
          .box_text
            .box_info
              h4.solution_title(v-html="solu.title.replace('檢測計畫','<br>檢測計畫')")
            .box_btn
              router-link.btn.btn-primary(to="/solution/n/校園環境健檢檢測計畫") 了解更多
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 校園環境健檢<br>檢測計畫
            .box_btn
              router-link.btn.btn-primary(to="/solution/n/校園環境健檢檢測計畫") 了解更多
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 校園食材健檢<br>檢測計畫
            .box_btn 
              router-link.btn.btn-primary(to="/solution/n/校園食材健檢檢測計畫") 了解更多
      .solution_box
        .box_inner
          .box_text
            .box_info
              h4.solution_title 農場作物自主管理<br>檢測計畫
            .box_btn  
              router-link.btn.btn-primary(to="/solution/n/農場作物自主管理檢測計畫") 了解更多
    h4.slogan {{ slogan?slogan:"我們為您制定周全的環境健檢計畫" }}
    router-link.btn.btn-primary(to="/contact/-1") 聯絡我們  
</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        props: ["id","slogan"],
        mounted() {
            console.log('solutions mounted.');
            // if (Ts) Ts.reload();
        },
        computed: {
          ...mapState(['solutions']),
        }
    }
</script>