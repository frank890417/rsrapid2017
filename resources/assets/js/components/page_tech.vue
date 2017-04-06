<template lang="jade">
div.page_tech
  section.section_hero.default_bg
    .container
      .row
        .col-sm-6.col-sm-offset-3
          h1.section_title.text-center 睿軒快篩平台
          p 與國立中山大學共同開發「快速檢驗平台」專利技術為基礎，以建構食的安心、用的放心，便利顧客享有快速與安全的保障為出發點，守護民眾的健康期許，營造安心的生活環境。同時創造獨特的檢驗效率，與無可取代的時間效益。
          p
          hr
          .conpany_logos
            img.company_logo(alt="永齡logo" src="img/homepage/tech_company_logo1.png")
            img.company_logo(alt="中山大學logo" src="img/homepage/tech_company_logo2.png")

  section.section_tech(data-img=1)

    .ab_center.size_full.bg_color_split
      .block_50_percent
        #myCarousel2.carousel.slide(data-ride='carousel' style='height: 100%')
          // Indicators
          ol.carousel-indicators
            li.active(data-target='#myCarousel2', data-slide-to='0')
            li(data-target='#myCarousel2', data-slide-to='1')
           
          // Wrapper for slides
          .carousel-inner(role='listbox' style='height: 100%')
            .item.active(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Tech2.jpg);background-size: cover; height: 100%;")
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Home1.jpg);background-size: cover; height: 100%;")

      .block_50_percent
    .container
      .row
        .col-sm-6.img.place_odd
        .col-sm-4.col-sm-offset-7.inner
          h3.section_title 五秒高效快篩
          img.dynamic_icon(src="img/homepage/rapid-tech-icon_1.svg"  alt="動態icon" )
          p.section_para.text-left 不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。
          a.btn.btn-primary.section_para 了解更多

  section.section_tech.section_manhead

    .ab_center.size_full.bg_color_split
      .block_50_percent
      .block_50_percent
        img.section_para.man_head_ab(src="img/homepage/Tech3.png" alt="")
    .container
      .row
        .col-sm-4.col-sm-offset-1.inner
          h3.section_title 獨家探針，多樣檢測
          img.section_para.dynamic_icon(src="img/homepage/rapid-tech-icon_2.svg" alt="動態icon" )
          p.section_para.text-left 獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。
          a.btn.btn-primary.section_para 了解更多


  section.section_tech(data-img=3)

    .ab_center.size_full.bg_color_split
      .block_50_percent
        #myCarousel4.carousel.slide(data-ride='carousel' style='height: 100%')
          // Indicators
          ol.carousel-indicators
            li.active(data-target='#myCarousel4', data-slide-to='0')
            li(data-target='#myCarousel4', data-slide-to='1')
           
          // Wrapper for slides
          .carousel-inner(role='listbox' style='height: 100%')
            .item.active(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Tech4.jpg);background-size: cover; height: 100%;")
            .item(style='height: 100%')
              .img(style="background-image:url(/img/homepage/Post4.jpg);background-size: cover; height: 100%;")

      .block_50_percent
    .container
      .row
        .col-sm-6.place_odd
        .col-sm-4.col-sm-offset-1.inner
          h3.section_title 雲端即時報告
          img.section_para.dynamic_icon(src="img/homepage/rapid-tech-icon_3.svg"  alt="動態icon" )
          p.section_para.text-left 同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。
          a.btn.btn-primary.section_para 了解更多
  section_solutions

</template>

<script>
    export default {
        mounted() {
            console.log('tech mounted.')
        }
    }
</script>