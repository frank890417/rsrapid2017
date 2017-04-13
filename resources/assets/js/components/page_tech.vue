<template lang="jade">
div.page_tech
  section.section_hero.default_bg
    .container.flex.center
      .col_hero
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
        
        .slick(data-timelime=".tl1")
          .item(style='height: 100%')
            .img(style="background-image:url(/img/homepage/Tech2.jpg);background-size: cover; height: 100%;")
          .item(style='height: 100%')
            .img(style="background-image:url(/img/homepage/Home1.jpg);background-size: cover; height: 100%;")
        .timeline.tl1
            .value
      .block_50_percent
    .container.flex
      .col_left
      .col_right
        h3.section_title 五秒高效快篩
        img.dynamic_icon(src="img/homepage/rapid-tech-icon_1.svg"  alt="動態icon" )
        p.section_para.text-left 不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。
        a.btn.btn-primary.section_para 了解更多

  section.section_tech.section_manhead

    .ab_center.size_full.bg_color_split
      .block_50_percent
      .block_50_percent
        img.section_para.man_head_ab(src="img/homepage/Tech3.png" alt="")
    .container.flex
      .col_left
        h3.section_title 獨家探針，多樣檢測
        svg.dynamic_icon.icon_bubble(xmlns='http://www.w3.org/2000/svg', xmlns:xlink='http://www.w3.org/1999/xlink', version='1.1', id='圖層_1', x='0px', y='0px', viewbox='-5,-5,63,63',width='58px',height="58px", xml:space='preserve')
          title rapid-tech-icon
          g#a56c2210-9d43-43f7-81a3-bf81abf59f30
            path.st0(d='M39.9,25.2l-9-9.1c-0.8-0.8-2.1-0.8-2.9,0c-0.6,0.7-0.8,1.7-0.3,2.5L7.8,38.4c-2.7,2.7-2.7,7.1,0,9.8   c2.7,2.7,7.1,2.7,9.8,0l19.8-19.8c1,0.6,2.3,0.2,2.8-0.8C40.7,26.9,40.5,25.9,39.9,25.2z M33.9,27.2l-1.8-1.8   c-0.4-0.4-1.1-0.4-1.6,0c0,0,0,0,0,0c-0.4,0.4-0.4,1.1,0,1.6c0,0,0,0,0,0l1.8,1.8l-3.5,3.5L27,30.4c-0.4-0.4-1.1-0.5-1.6,0   s-0.5,1.1,0,1.6l1.8,1.8l-12,12c-1.4,1.4-3.6,1.4-5,0s-1.4-3.6,0-5L30,21.1l5,5L33.9,27.2z')
            circle.st0(cx='49.9', cy='11.1', r='2.3') 
            circle.st0(cx='39.5', cy='11.9', r='4.2')
            circle.st1(cx='42.4', cy='18', r='3.4')

        p.section_para.text-left 獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。
        a.btn.btn-primary.section_para 了解更多
      .col_right

  section.section_tech(data-img=3)

    .ab_center.size_full.bg_color_split
      .block_50_percent
        
        .slick(data-timelime=".tl2")
          .item(style='height: 100%;width: 100%')
            .img(style="background-image:url(/img/homepage/Tech4.jpg);background-size: cover; height: 100%;")
          .item(style='height: 100%;width: 100%')
            .img(style="background-image:url(/img/homepage/Post4.jpg);background-size: cover; height: 100%;")
        .timeline.tl2
          .value
      .block_50_percent
    .container
      .container.flex
        .col_left
        .col_right
          h3.section_title 雲端即時報告
          img.section_para.dynamic_icon(src="img/homepage/rapid-tech-icon_3.svg"  alt="動態icon" )
          
          p.section_para.text-left 同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。
          a.btn.btn-primary.section_para 了解更多
  section_solutions

</template>

<script>
    export default {
        data(){
          return {
            timer_list: []
          }
        },
        mounted() {
          var vobj=this;
          console.log('tech mounted.');
          $('.slick').each(function(index,obj){
            var tl=$($(obj).attr("data-timelime") + " .value");
            $(obj).slick({
              autoplay: false,
              autoplaySpeed: 4000,
              dots: true,
              speed: 700,
              easing: 'linear'
            });
            function delta(){

              $(obj).slick("slickNext");
              tl.stop();
              tl.animate({"width":"0%"},0);
              tl.animate({"width":"100%"},4000);
            
            }
            delta();
            var timer=setInterval(delta,4000);
            vobj.timer_list.push(timer);
          });
        },beforeDestroy() {
          this.timer_list.map(obj=>clearInterval(obj));
          this.timer_list=[];
        }
    }
</script>