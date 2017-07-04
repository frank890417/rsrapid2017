<template lang='jade'>
section.section_solution(v-if="!( (this.shown instanceof Array) && computed_solutions.length==0 )")
  .container
    h3.section_title 專業檢驗方案
    .container.flex

      .solution_box(v-for="solu in computed_solutions", v-if="solu")
        .box_inner
          .bg(:style="{'background-image':'url('+solu.boxbg+')'}")
          .box_text
            .box_info
              h4.solution_title(v-html="solu.title.replace('檢測計畫','<br>檢測計畫')")
            .box_btn
              router-link.btn.btn-primary(:to="'/solution/n/'+solu.title") 了解更多

    h4.slogan {{ slogan?slogan:"我們為您制定周全的環境健檢計畫" }}
    router-link.btn.btn-primary(to="/contact/-1") 聯絡我們  
</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        props: ["id","slogan","shown","exclude"],
        mounted() {
            console.log('solutions mounted.');
            // if (Ts) Ts.reload();
        },
        computed: {
          ...mapState(['solutions']),
          computed_solutions(){
            let shown_list = [];
            if (this.shown instanceof Array){
              shown_list = this.shown.map(o=>this.solutions.find(s=>""+s.id==""+o)).filter(o=>o!=null)
            }else{
              shown_list = this.solutions
            }
            if (this.exclude instanceof Array){
              return shown_list.filter(o=> this.exclude.indexOf(o.id)==-1 ) 
            }
            return shown_list

          },
          
        }
    }
</script>