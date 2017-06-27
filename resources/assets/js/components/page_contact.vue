<template lang="jade">
div.page_contact
  section.section_hero.bg_theme.before_black_mask.bg_parallax
    .container.flex.column
      h1.section_title {{$t("page_contact.section_1.title")}}
      p.description(v-html="$t('page_contact.section_1.content')")

  section.section_form
    .container.row.top_out
      ul.nav_line_split
        li.active 台灣
      form.container.flex.row#form_contact(v-on:submit.prevent="send_form")
        .col_left
          iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.4484040096263!2d121.53777491497817!3d24.984874983995326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346801fed5f7da89%3A0x7bc696c73a47d7bf!2zMjMx5paw5YyX5biC5paw5bqX5Y2A5YyX5paw6Lev5LiJ5q61MjA36Jmf!5e0!3m2!1szh-TW!2stw!4v1490774552681" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen)
        .col_right
          .form-group
            label {{$t("page_contact.section_2.label_name")}}
            input(required name='name' pattern="^[-'a-zA-Z\ \u4e00-\u9eff]{1,25}$")
          .form-group
            label {{$t("page_contact.section_2.label_mail")}}
            input(required name='email' pattern=".*\@.*\..*")
          .form-group
            label {{$t("page_contact.section_2.label_ask")}}
            select#select_contact(required name='ask_item_id', v-model="selected_option")
              option(v-for="solu in solutions" ,:value="solu.id") {{solu.title}}
              option(value="-1") {{$t("page_contact.section_2.option_else")}}

          .form-group
            textarea.form-control(rows=14 ,:placeholder="$t('page_contact.section_2.label_message')" required name='content')

          .form-group.text-right
            // button.btn.btn-primary(class="g-recaptcha"
            // data-sitekey="6LcahSQUAAAAAKLP5ArsW2a-gxQpAoKrr5zWbjsE"
            // data-callback="send_form" type="submit") 送出表單
            button.btn.btn-primary(type="submit" , onclick.prevent="send_form") 
              span(v-if="sending")
                span {{$t('page_contact.section_2.btn_sending')}}
              span(v-else) {{$t('page_contact.section_2.btn_send')}}
      hr.footer_line

  section.section_qa#section_qa
    .container
      h1.section_title {{$t("page_contact.section_3.title")}}
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
    import axios from 'axios'
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
            var vobj=this;
            var send_data_array=$("#form_contact").serializeArray();
            var send_data = {};
            send_data_array.forEach((obj)=>{
              send_data[obj.name]=obj.value
            })
            // var send_data=$("#form_contact").submit();
            console.log(send_data);

            this.sending=true;
            axios.post("/contact_record",send_data).then((res)=>{
              if (res.data.status=="success"){
                alert("傳送成功！")
                setTimeout(()=>{
                  vobj.sending=false;
                },1000)

              }else{

                alert("傳送失敗")
              }
            });

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