<template lang='jade'>
div.footer
  section.detail_footer
    .container
      .go_to_topbtn
        i.fa.fa-angle-up
      .row
        .col-sm-4.address_col
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
              .question 檢測的原理是什麼呢?
                p.answer 先利用探針在待測物體表面上輕刮一下，再將探針放入檢測設備中加熱。高溫下探針表面的化學粒子釋放成游離狀態，經由質譜分析儀和大量的資料庫進行比對。過程只需5秒即可完成檢測。
            li 
              .icon.icon_minus.icon_plus
              .question 探針是一次性消耗品嗎?會不會造成環境汙染呢?
                p.answer 探針可以利用高溫進行清潔作業。如此一來，就能重覆使用，不會造成環境汙染。
            li 
              .icon.icon_minus.icon_plus
              .question 檢測的範圍有哪些呢?
                p.answer 從塑化劑、農藥、防腐劑到三聚氰胺皆建有大量的資料庫。我們也同時致力於開發新測項來守護民眾食的健康與用的安心。2016年底我們完成了全台共計376間的幼兒園環境健檢活動里程碑，為守護我們下一代零污染空間盡一份心力。
            li
              .icon.icon_minus.icon_plus
              .question 什麼是塑化劑?
                p.answer 塑化劑或稱增塑劑、可塑劑，是一種增加材料的柔軟性或是材料液化的添加劑。其添加對象包含了塑膠、混凝土、牆板泥灰、水泥與石膏等。塑化劑種類多達百餘種，但使用的最普遍的即是一群稱為鄰苯二甲酸酯類的化合物；例如DBP、DEHP、DINP、DIDP、BBP及DNOP等。
            li 
              .icon.icon_minus.icon_plus
              .question 為什麼我們會吃到塑化劑?
                p.answer 因為塑化劑用途廣，對環境造成不小的汙染，通常透過飲水、食物鏈及空氣接觸或呼吸進入體內，其中又以食入為主。例如使用塑膠容器或包裝材料(尤其是PVC類)儲存食物時，DEHP會微量溶出殘留在食物中，或接觸含塑化劑之文具或玩具。
            li 
              .icon.icon_minus.icon_plus
              .question 塑化劑多久才會排出體外?
                p.answer 化劑DEHP代謝速度非常快，進入人體後於12~24小時內，約有一半的DEHP及其代謝物會於24~48小時由尿液或糞便排出。<br>塑化劑DINP亦會被人體迅速代謝，72小時內有85%由糞便中排出，其餘部分則由尿液排出。<br>在48小時內停止接觸或攝入含有DEHP之產品，體內DEHP濃度便會快速下降，因此不必過度擔憂。
            
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
            router-link(to="/job") 人才招募
          li
            a(href="#") 會員管理
          li
            a(href="#") 各項聲明
          li
            router-link(to="/contact") 聯絡我們


</template>
<script>
    export default {
        mounted() {
            console.log('footer mounted.')
        }
    }
</script>