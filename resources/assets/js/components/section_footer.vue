<template lang='jade'>
div.footer
  section.detail_footer
    .container
      .go_to_topbtn
        i.fa.fa-angle-up
      .row
        .col-sm-4
          h5 公司資訊
          p
            b 台北, 台灣
          p 231 新北市新店區北新路三段207-2號 15樓<br>+886.2.5579-0123
          hr
          img.social_icon.fb(src="http://www.greenvalefarm.com.au/wp-content/themes/greenvale/images/fb-icon.png")
          img.social_icon(src="https://cdn4.iconfinder.com/data/icons/picons-social/57/40-google-plus-3-128.png")

        .col-sm-5
          h5 常見問題
          ul.question_list
            li
              .icon.icon_minus.icon_plus
              .question 檢測原理是什麼呢?
                p.answer 先利用探針在待測物體表面上輕刮一下，再將探針放入檢測儀內加熱。高溫下探針表面的化學粒子釋放成游離狀態，經由質譜分析儀和大量的資料庫進行比對。
            li 
              .icon.icon_minus.icon_plus
              .question 探針是一次性消耗品嗎?會不會造成環境汙染呢?
                p.answer 探針可以利用高溫進行清潔作業。如此一來，就能重覆使用，不會造成環境汙染。
            li 
              .icon.icon_minus.icon_plus
              .question 檢測的範圍有哪些呢?
                p.answer 從塑化劑、農藥、防腐劑到三聚氰胺皆建有大量的資料庫。我們也同時致力於開發新測項來守護民眾食的健康與用的安心。2016年底我們完成了全台共計376間的幼兒園環境健檢活動里程碑，為守護我們下一代零污染空間盡一份心力。
            li 
              a.more 更多問題...

        .col-sm-3.text-center
          h5.text-left 合作夥伴
          img.company_icon(src="http://vector.me/files/images/8/7/87940/iso_9001_2000_sgs.png")
          img.company_icon(src="http://vector.me/files/images/8/7/87940/iso_9001_2000_sgs.png")

  footer
    .container
      .infos
        .info Copyright 2017 © 睿軒檢驗科技 Rapidsure Tech, All right reserved.
        ul.footer_nav
          li
            a(href="job.html") 人才招募
          li
            a(href="member.html") 會員管理
          li
            a(href="#") 各項聲明
          li
            a(href="contact.html") 聯絡我們


</template>
<script>
    export default {
        mounted() {
            console.log('footer mounted.')
        }
    }
</script>