<template lang="jade">
div.page_news
  .slick
    section.section_hero(v-for='a_news in news.slice(0,5)')
      .bg.bg_parallax(:style="'background-image: url('+a_news.cover.trim().replace(' ','%20')+')'") 
      .full
        .container.flex
          h5.tag {{a_news.tag}}
          h5.date {{a_news.date}}
          router-link(:to="'/news/'+a_news.id")
            h1 
               {{a_news.title}}
          p.description {{a_news.content.replace(/<[^>]*>/g, '').substr(0,60)+'...'}}


  section.section_news
    .container.flex.top_out
      ul.nav_line_split.text-center

        li(@click='filter=cata' v-for="cata in catas" v-bind:class='filter==cata?"active":""') {{cata}}
        
    transition-group(name="fade-delay")
      .container.flex(  v-for='cata in catas' v-bind:key="cata" v-if="cata==filter" tag="div")
        .news_box.section_para(v-for='(a_news,id) in filtered_news' v-bind:class="(filter=='全部新聞')?(is_double(id)?'size_2':''):''")
          .cover(:style="'background-image: url('+a_news.cover.trim().replace(' ','%20')+')'") 
          .info
            h5.date {{a_news.date}}
            h3.title {{a_news.title}}
            p {{a_news.content.replace(/<[^>]*>/g, '').substr(0,(is_double(id)&&filter=="全部新聞")?90:45)+'...'}}
          router-link(:to="'/news/'+a_news.id").btn.btn-transparent.ab_center 瞭解更多
    .container.flex
      ul.nav_line_split.text-center.page_nav
        li 上一頁
        li.active 1
        li ...
        li 下一頁
      hr.footer_line
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
            easing: 'ease-in',
            prevArrow: '<i class="fa fa-angle-left"></i> ',
            nextArrow: '<i class="fa fa-angle-right"></i> '
          });
          clearInterval(loader);
          // vobj.news_delta();
          console.log("news_slick_loaded");
        }
      },100);
      this.filter=this.cataname;
      if (Ts) Ts.reload();
    },
    data() {
      return {
        filter: "全部新聞",
        catas: ["全部新聞","睿軒活動","新聞快訊","食安新知","友善連結"]
      }
    },
    computed: {
      ...mapState(['news']),
      filtered_news(){
        return this.news.filter(item=>( item.tag == this.filter || this.filter=="全部新聞"));
      },
    },watch: {
      cataname(){
        this.filter=(this.cataname=="all")?"全部新聞":this.cataname;
      }
    },methods: {
      
      is_double(id){
        return [0,6,10].indexOf(id)!=-1;
      }
    },
    props: ["cataname"]
}
</script>