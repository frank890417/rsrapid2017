<template lang='jade'>
div.footer
  section.detail_footer
    .container.flex
      .go_to_topbtn
        img(src="/img/icon_arrow_up.svg")
      .col_address
        h5 公司資訊
        h5 台北, 台灣

        p 231 新北市新店區北新路三段207-2號 15樓<br>+886.2.5579-0123
        hr
        img.social_icon.fb(src="http://www.greenvalefarm.com.au/wp-content/themes/greenvale/images/fb-icon.png")
        img.social_icon(src="https://cdn4.iconfinder.com/data/icons/picons-social/57/40-google-plus-3-128.png")

      .col_question
        h5 常見問題
        ul.question_list
          li(v-for='(qa,id) in questions.slice(0,3)' v-bind:class="qa_state[id].open ?'open':''"  @click="toggle(id)")
            .icon.icon_minus(v-bind:class="qa_state[id].open ?'':'icon_plus'"  @click="toggle(id)")
            .question {{qa.question}}
            p.answer {{qa.answer}}
          
          li 
            a.more 更多問題...

      .col_corp
        h5.text-left 合作夥伴
        img.company_icon(src="http://vector.me/files/images/8/7/87940/iso_9001_2000_sgs.png")
        img.company_icon(src="http://vector.me/files/images/8/7/87940/iso_9001_2000_sgs.png")

  footer
    .container.flex
      .info Copyright 2017 © 睿軒檢驗科技 Rapidsure Tech, All right reserved.
      ul.footer_nav
        li
          router-link(to="/job") 人才招募
        li
          a(href="#") 會員管理
        li
         router-link(to="/tern") 各項聲明
        li
          router-link(to="/contact") 聯絡我們


</template>
<script>
    import { mapGetter, mapActions , mapState } from 'vuex';
    export default {
        mounted() {
            console.log('footer mounted.');
        },data(){
          return {
            qa_state: [{open:true},{open:false},{open:false}]
          };
        },
        methods: {
          toggle (id){
            this.qa_state.forEach((op)=>{op.open=false});
            this.qa_state[id].open = !this.qa_state[id].open  ; 
              console.log(!this.qa_state[id].open );
          }
        },
        computed: mapState(['questions'])
    }

</script>