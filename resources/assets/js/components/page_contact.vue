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
      form.container.flex.row#form_contact(v-on:submit.prevent="send_form")
        .col_left
          iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.4484040096263!2d121.53777491497817!3d24.984874983995326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346801fed5f7da89%3A0x7bc696c73a47d7bf!2zMjMx5paw5YyX5biC5paw5bqX5Y2A5YyX5paw6Lev5LiJ5q61MjA36Jmf!5e0!3m2!1szh-TW!2stw!4v1490774552681" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen)
        .col_right
          .form-group
            label 姓名
            input(required name='name' pattern="^[-'a-zA-Z\ \u4e00-\u9eff]{1,25}$")
          .form-group
            label 信箱
            input(required name='email' pattern=".*\@.*\..*")
          .form-group
            label 諮詢
            select#select_contact(required name='ask_item', v-model="selected_option")
              option(v-for="solu in solutions" ,:value="solu.id") {{solu.title}}
              option(value="-1") 其他問題或服務

          .form-group
            textarea.form-control(rows=14 placeholder="訊息..." required name='ask_content')

          .form-group.text-right
            // button.btn.btn-primary(class="g-recaptcha"
            // data-sitekey="6LcahSQUAAAAAKLP5ArsW2a-gxQpAoKrr5zWbjsE"
            // data-callback="send_form" type="submit") 送出表單
            button.btn.btn-primary(type="submit" , onclick.prevent="send_form") 
              span(v-if="sending")
                span 傳送中...
              span(v-else) 送出表單
      hr.footer_line

  section.section_qa#section_qa
    .container
      h1.section_title 常見問題
      .col_full
        ul.question_list
          li(v-for='(qa,id) in questions' v-bind:class="qa_state[id].open ?'active':''"  @click="toggle(id)")
            .icon_open()
            .top
              h2 {{ (( id+1 <10)?'0':'') + (id+1) }}
              p.question {{qa.question}}
            .bottom
              p.answer {{qa.answer}}

</template>

<script>

    import { mapGetter, mapActions , mapState } from 'vuex'
    // reCAPTCHA=require('recaptcha2')
    // recaptcha=new reCAPTCHA({
    //   siteKey:'6LclgSQUAAAAAI1FRcbFpz6Ul8W57-DXZCmyH4xK',
    //   secretKey:'6LclgSQUAAAAALuGf4OcN-ChCJSJEqE3wNVMdJjk'
    // })
    export default {
        props: ["selected"],
        data(){
          return {
            selected_option: 0,
            sending: false,
            qa_state: new Array(100).fill({}).map((d,i)=>({open: i==0}))
          }
        },
        mounted() {
            console.log('contact mounted.');
            if (this.selected)
              this.selected_option=this.selected;
            window.send_form=this.send_form;
            if (window.location.hash=="#section_qa"){
              $("html,body").animate({scrollTop: $("#section_qa").offset().top-100});
            }
        },
        methods: {
          send_form(){
            var send_data=$("#form_contact").serialize();
            // var send_data=$("#form_contact").submit();
            console.log(send_data);
            this.sending=true;

          },

          toggle (id){
            this.qa_state.forEach((op,index)=>{
              if (index==id) {
                op.open = !op.open;
              }else{ 
                op.open = false;
              }
            });

          }
        },
        computed: {
          ...mapState(['solutions','questions'])
        }
    }
</script>