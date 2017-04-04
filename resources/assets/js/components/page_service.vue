<template lang="jade">
div.page_service
  section.section_hero.bg_theme.before_black_mask.bg_parallax
    .container
      .row
        .col-sm-10.col-sm-offset-1
          h5.tag 活動快訊
          h5.date 2017.01.23
          h1 全方位企業檢測方案現正推出!
          p.description 兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。

  section.section_news

    .container
      .row
        .col-sm-12
          ul.nav_line_split.text-center
            li.active 全部新聞
            li 重要通知
            li 活動快訊
            li 投資相關
        .container-fluid.news_field
          .row
            .news_box.section_para(v-for='a_news in news' v-bind:class="'col-sm-'+a_news.size*4")
              .news_box_inner(onclick="window.open('post.html','_self')")
                .cover(:style="'background-image: url('+a_news.cover+')'")
                  .btn.btn-transparent.ab_center 瞭解更多
                .info
                  h5.date {{a_news.date}}
                  h3.title {{a_news.title}}
                  p {{a_news.description}}
          
          .row
            .col-sm-12
              ul.nav_line_split.text-center.page_nav
                li 上一頁
                li.active 1
                li 2
                li 3
                li 4
                li 5
                li 6
                li 7
                li 8
                li 9
                li ...
                li 下一頁
          hr
</template>

<script>
    export default {
        mounted() {
            console.log('index mounted.')
        }
    }
</script>