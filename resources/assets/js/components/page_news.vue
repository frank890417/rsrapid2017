<template lang="jade">
div.page_news
  section.section_hero.bg_theme.before_black_mask.bg_parallax.slick
    div
      .container.flex
        h5.tag 活動快訊
        h5.date 2017.01.23
        h1 全方位企業檢測方案現正推出!
        p.description 兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。
    div
      .container.flex
        h5.tag 活動快訊
        h5.date 2017.01.23
        h1 全方位企業檢測方案現正推出!
        p.description 兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。

  section.section_news
    .container.flex
      ul.nav_line_split.text-center
        li.active(@click='filter=""') 全部新聞
        li(@click='filter="重要通知"') 重要通知
        li(@click='filter="活動快訊"') 活動快訊
        li(@click='filter="投資相關"') 投資相關
      
      .news_box.section_para(v-for='(a_news,id) in filtered_news' v-bind:class="(filter=='')?([0,6,10].indexOf(id)>-1?'size_2':''):''")
        .cover(:style="'background-image: url('+a_news.cover+')'") 
        .info
          h5.date {{a_news.date}}
          h3.title {{a_news.title}}
          p {{a_news.description}}
        router-link(:to="'/news/'+a_news.id").btn.btn-transparent.ab_center 瞭解更多
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
import { mapGetter, mapActions , mapState } from 'vuex'
export default {
    mounted() {
      console.log('news mounted.');
      $('.slick').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        easing: 'ease-in'
      });

    },
    data() {
      return {
        filter: ""
      }
    },
    computed: {
      ...mapState(['news']),
      filtered_news (){
        return this.news.filter(item=>( item.tag==this.filter || this.filter==""))
      }
    }
}
</script>