<template lang="jade">
div.page_contact
  section.section_hero.bg_theme.before_black_mask.bg_parallax
    .container.flex.column
      h1.section_title 聯絡我們
      p.description 我們專注於提供優質的檢驗服務，以前瞻先進科技守護企業與民眾的健康。若您有任何產品疑問、客製化服務需求等，歡迎與我們聯絡，我們將竭誠為您服務。

  section.section_form
    .container.row.top_out
      ul.nav_line_split
        li.active 台灣
      form.container.flex.row
        .col_left
          iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.4484040096263!2d121.53777491497817!3d24.984874983995326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346801fed5f7da89%3A0x7bc696c73a47d7bf!2zMjMx5paw5YyX5biC5paw5bqX5Y2A5YyX5paw6Lev5LiJ5q61MjA36Jmf!5e0!3m2!1szh-TW!2stw!4v1490774552681" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen)
        .col_right
          .form-group
            label 姓名
            input(required name='name')
          .form-group
            label 信箱
            input(required name='email' pattern=".*\@.*\..*")
          .form-group
            label 諮詢
            select#select_contact(required name='ask_item')
              option(value="1") 　　　校園環境健檢檢測計畫
              option(value="2") 　　　校園食材健檢檢測計畫
              option(value="3") 　　　農場作物自主管理檢測計畫

          .form-group
            textarea.form-control(rows=14 placeholder="訊息..." required name='ask_content')
          .form-group.text-right
            button.btn.btn-primary(type="submit") 送出表單
         
      hr.footer_line

  

</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        props: ["selected"],
        mounted() {
            console.log('contact mounted.');
            // if (Ts) Ts.reload();
            
        },
    }
</script>