<template lang="jade">
div.page_news
  .slick
    section.section_hero(v-for='a_news in news.slice(0,5)')
      .bg.bg_parallax(:style="'background-image: url('+a_news.cover+')'") 
      div.full
        .container.flex
          h5.tag {{a_news.tag}}
          h5.date {{a_news.date}}
          h1 {{a_news.title}}
          p.description {{a_news.description}}


  section.section_news
    .container.flex
      ul.nav_line_split.text-center
        li(@click='filter=""' v-bind:class='filter==""?"active":""') 全部新聞
        li(@click='filter="睿軒活動"' v-bind:class='filter=="睿軒活動"?"active":""') 睿軒活動
        li(@click='filter="新聞快訊"' v-bind:class='filter=="新聞快訊"?"active":""') 新聞快訊
        li(@click='filter="食安新知"' v-bind:class='filter=="食安新知"?"active":""') 食安新知
        li(@click='filter="友善連結"' v-bind:class='filter=="友善連結"?"active":""') 友善連結
      
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
      var vobj=this;
      var loader = setInterval(function(){
        if (vobj.news.length>0){
          $('.slick').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            easing: 'ease-in'
          });
          clearInterval(loader);
          // vobj.news_delta();
          console.log("news_slick_loaded");
        }
      },100);
      

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
    },watch: {
      cataname(){
        this.filter=this.cataname=="all"?"":this.cataname;
      }
    },
    props: ["cataname"]
}
</script>