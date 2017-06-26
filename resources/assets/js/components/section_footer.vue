<template lang='jade'>
div.footer
  section.detail_footer
    .container.flex
      .go_to_topbtn(:class="{at_top: scrollTop<=0}")
        img(src="/img/icon_arrow_up.svg")
      .col_address
        h5(v-text="$t('footer.section_company.title')")
        div(v-for="loc in $t('footer.section_company.locations')")
          p {{loc.county}}, {{loc.location}}
          br
          p {{loc.address}}<br>{{loc.phone}}
          hr
        i.social_icon.fa.fa-facebook
        i.social_icon.fa.fa-weibo
        i.social_icon.fa.fa-google-plus
      .col_question
        h5(v-text="$t('footer.section_question.title')")
        ul.question_list
          li(v-for='(qa,id) in questions.slice(0,3)' v-bind:class="qa_state[id].open ?'open':''"  @click="toggle(id)")
            .icon.icon_minus(v-bind:class="qa_state[id].open ?'':'icon_plus'"  @click="toggle(id)")
            p.question {{qa.question}}
            p.answer {{qa.answer}}
          
          li 
            router-link.more(to="/contact#section_qa") {{$t('footer.section_question.more')}}

      .col_corp
        h5.text-left(v-text="$t('footer.section_partner.title')")
        .slicklogo2
          .item(v-for="partner in $t('footer.section_partner.partners')")
            img.company_icon(:src="partner.icon", :title="partner.name")

  footer
    .container.flex
      .info Copyright 2017 © 睿軒檢驗科技 Rapidsure Tech, All right reserved.
      ul.footer_nav
        li
          router-link(to="/job") 人才招募
        li
          a(href="#") 會員服務
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
            $('.slicklogo2').slick({
              autoplay: true,
              autoplaySpeed: 3000,
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows: true,
              vertical: true,
              dots: true,
              easing: 'ease-in'
            });
        },data(){
          return {
            qa_state: new Array(5).fill({}).map((d,i)=>({open: i==1}))
          };
        },
        methods: {
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
        computed: mapState(['questions','scrollTop'])
    }

</script>