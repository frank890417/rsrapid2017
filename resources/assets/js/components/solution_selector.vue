<template lang='jade'>
  .form-group
    h4 顯示方案
    div(v-if="part.section_solution")
      .form-inline
        label 第一則
        select.form-control(v-model="part.section_solution.solutions[0]")
          option(value="-1") 未選擇
          option(v-for="solu in solutions",:value="solu.id") {{solu.title}}
      .form-inline
        label 第二則
        select.form-control(v-model="part.section_solution.solutions[1]")
          option(value="-1") 未選擇
          option(v-for="solu in solutions",:value="solu.id") {{solu.title}}

      .form-inline
        label 第三則
        select.form-control(v-model="part.section_solution.solutions[2]")
          option(value="-1") 未選擇
          option(v-for="solu in solutions",:value="solu.id") {{solu.title}}
    div(v-else)
      .btn.btn-default(@click="part.section_solution={solutions: [-1,-1,-1]};$forceUpdate()") 初始化
    input(type="hidden" name="section_solution" ,:value="JSON.stringify({solutions: part.section_solution.solutions})", v-if="part.section_solution")
</template>

<script>
    export default {
        props: ['part'],
        name: "solution_selector",
        data(){
          return {
            solutions: []
          }
        },
        mounted() {
         axios.get("/api/solutions").then((res)=>{
          this.solutions=res.data
         })
        }
    }
</script>
