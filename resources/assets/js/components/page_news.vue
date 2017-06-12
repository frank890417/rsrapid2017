<template lang="jade">
div.page_news
  .slick
    section.section_hero(v-for='a_news in news.slice(0,5)')
      .bg.bg_parallax.no_attach(:style="bg_css(a_news.cover)") 
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
      ul.nav_line_split.text-center.catalist

        li(@click='switch_cata(cata)' v-for="cata in catas" v-bind:class='filter==cata?"active":""') {{cata}}
        
    transition-group(name="fade-delay",mode="out-in")
      transition-group.container.flex(v-for='cata in catas' ,:key="cata" v-if="cata==filter" tag="div",name="fade", mode="out-in")
        .news_box.section_para(v-for='(a_news,id) in filtered_news.slice(0,show_num)' ,:class="(filter=='全部新聞')?(is_double(id)?'size_2':''):''" onclick="void(0)", :key="a_news")
          .cover(:style="bg_css(a_news.cover)") 
          .info
            h5.date {{a_news.date}}
            h3.title {{a_news.title}}
            p {{a_news.content.replace(/<[^>]*>/g, '').substr(0,(is_double(id)&&filter=="全部新聞")?90:45)+'...'}}
          router-link(:to="'/news/'+a_news.id").btn.btn-transparent.ab_center 瞭解更多
    .trigger_bar(style="text-align: center")
      transition(name="fade")
        img.load_icon(v-if="!can_load_more",src="http://www.downgraf.com/wp-content/uploads/2014/09/01-progress.gif",width="60px",style="filter: saturate(0%);display: inline-block") 

        
    //.container.flex
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

      //設定進來的類別跟顯示數量
      this.filter=this.cataname;
      
      this.show_num=(this.filter!="全部新聞")?6:7;
      

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

      // if (Ts) Ts.reload();
    },
    data() {
      return {
        filter: "全部新聞",
        catas: ["全部新聞","睿軒活動","新聞快訊","食安新知","友善連結"],
        show_num: 7,
        can_load_more: true,
      }
    },
    computed: {
      ...mapState(['news','scrollTop']),
      filtered_news(){
        return this.news.filter(item=>( item.tag == this.filter || this.filter=="全部新聞"));
      },
    },watch: {
      cataname(){
        this.filter=(this.cataname=="全部新聞")?"全部新聞":this.cataname;
      },
      scrollTop(){
        var y =this.scrollTop+$(window).outerHeight();
        var trigger = $(".trigger_bar").offset().top+150;
        // console.log(y,trigger);
        // console.log(this.show_num ,this.filtered_news.length)

        if (y>trigger && this.can_load_more && this.show_num < this.filtered_news.length){
          this.can_load_more=false;

          setTimeout(()=>{
            this.show_num+=3;
            console.log("add new post: " + this.show_num);
            this.can_load_more=true;

          },300);
          
        }
      }
    },methods: {
      is_double(id){
        return [0,6,10].indexOf(id)!=-1;
      },bg_css(url){
        return {'background-image': 'url('+url.trim().replace(' ','%20')+')'}
      },
      switch_cata(cata){
        this.filter=cata;
        this.show_num=(this.filter!="全部新聞")?6:7;
      }
    },
    props: ["cataname"]
}
</script>