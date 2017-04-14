<template lang="jade">
div.page_contact
  section.section_hero.bg_theme.before_black_mask.bg_parallax
    .container.flex.column
      h1 聯絡我們
      p.description 兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。

  section.section_form
    .container
      ul.nav_line_split
        li.active 台灣
      .row.container.flex.row
        .col_left
          iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.4484040096263!2d121.53777491497817!3d24.984874983995326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346801fed5f7da89%3A0x7bc696c73a47d7bf!2zMjMx5paw5YyX5biC5paw5bqX5Y2A5YyX5paw6Lev5LiJ5q61MjA36Jmf!5e0!3m2!1szh-TW!2stw!4v1490774552681" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen)
        .col_right
          .form-group
            label 姓名
            input
          .form-group
            label 信箱
            input
          .form-group
            label 諮詢
            select#select_contact
              option(value="1") &nbsp;&nbsp;&nbsp;校園環境健檢檢測計畫
              option(value="2") &nbsp;&nbsp;&nbsp;校園食材健檢檢測計畫
              option(value="3") &nbsp;&nbsp;&nbsp;農場作物自主管理檢測計畫

          .form-group
            textarea.form-control(rows=14 placeholder="訊息...")
          .form-group.text-right
            .btn.btn-primary 送出表單
         
      hr.footer_line

  

</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        mounted() {
            console.log('contact mounted.');
            Ts.reload();
            
        },
    }
</script>