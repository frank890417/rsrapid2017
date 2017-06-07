<template lang="jade">
div
  div.fullnav(:class="open_full?'open':''")
    .close_btn(@click="toggle_open")
    .container
      img.headerimg(src="/img/Rapid.png")
      ul.main_list
        li 
          h4 關於睿軒
          ul.sub_list
            li(@click="toggle_open")
              router-link( to="/about#section_about_from") 睿軒源起
            li(@click="toggle_open")
              router-link( to="/about#section_about_log") 睿軒大事紀
        li 
          h4 檢驗科技
          ul.sub_list
            li(@click="toggle_open") 
              router-link( to="/tech") 快檢平台
            li(@click="toggle_open") 
              router-link( to="/tech") 快檢平台
        li 
          h4 檢測方案
          ul.sub_list
            li(@click="toggle_open") 
              router-link( to="/solution/0") 校園環境健檢
            li(@click="toggle_open")
              router-link( to="/solution/1") 校園食材健檢
            li(@click="toggle_open") 
              router-link( to="/solution/2") 農場作物自主管理
        li 
          h4 最新消息
          ul.sub_list
            // li(@click="toggle_open") 
              router-link( to="/news/cata/全部新聞") 全部新聞
            li(@click="toggle_open") 
              router-link( to="/news/cata/睿軒活動") 睿軒活動
            li(@click="toggle_open") 
              router-link( to="/news/cata/新聞快訊") 新聞快訊
            li(@click="toggle_open") 
              router-link( to="/news/cata/食安新知") 食安新知
            li(@click="toggle_open") 
              router-link( to="/news/cata/友善連結") 友善連結
        li(@click="toggle_open") 
          h4 
            a(href="#") 會員服務
        li(@click="toggle_open") 
          h4 
            router-link(to="/job") 人才招募
        li(@click="toggle_open") 
          h4 
            router-link(to="/tern") 各項聲明
        li(@click="toggle_open") 
          h4
            router-link(to="/contact") 聯絡我們
  nav.navbar.at_top(:class="search?'search':''")
    .container
      .row
        div.nav-leftpart
          
          .navbar-header.col-sm-3
            // Collapsed Hamburger

            // Branding Image
            router-link.navbar-brand(to="/")
              img.logo(src="/img/Rapid.png")
          .navbar-search-input
            section_search

          // Left Side Of Navbar
          ul.navbar-nav.navbar-left.text-left
            // Authentication Links
            li
              a(href="#") 關於睿軒
              ul.subnav
                .container.flex
                  div.options
                    li 
                      router-link(to="/about#section_about_from") 睿軒源起
                    li 
                      router-link(to="/about#section_about_log") 睿軒大事紀
            li
              a(href="#") 檢驗科技
              ul.subnav
                .container.flex
                  div.options
                    li 
                      router-link(to="/tech") 快檢平台
            li
              a(href="#") 檢測方案
              ul.subnav
                .container.flex
                  div.options
                    li(v-for='(sol,id) in solutions')
                      router-link(:to="'/solution/'+id") {{sol.title.replace('計畫','')}}
            li
              a(href="#") 最新消息
              ul.subnav
                .container.flex
                  div.options
                    //li 
                      router-link(to="/news/cata/全部新聞") 全部新聞
                    li 
                      router-link(to="/news/cata/睿軒活動") 睿軒活動
                    li 
                      router-link(to="/news/cata/新聞快訊") 新聞快訊
                    li 
                      router-link(to="/news/cata/食安新知") 食安新知
                    li 
                      router-link(to="/news/cata/友善連結") 友善連結
                    
            li
              router-link(to="/contact")  聯絡我們
            
        ul.nav.navbar-nav.navbar-right
          li.function.func_lang
            a(href="#")
              span 繁
              i.fa.fa-angle-down 
            ul.subnav(style="display: none")
              .container
                div.options
                  li 
                    router-link(to="#") 繁
                  li 
                    router-link(to="#") 简
                  li 
                    router-link(to="#") EN

          li.function.func_search
            i.fa.fa-search(@click="toggle_search")
          li.function.func_size(@click='toggle_size')
            img.icon_big(src="/img/icon_word_big.svg" style="width: 22px" v-if="!big_font")
            img.icon_small(src="/img/icon_word_small.svg" style="width: 22px" v-if="big_font")

          li.nav_open.func_burger(@click="toggle_open")
            i.fa.fa-bars
</template>

<script>
    import {mapState,mapMutations} from 'vuex'
    export default {
        mounted() {
            console.log('navbar mounted.');

            //update subnav position
            function place_sub_nav(){
              $(".navbar-nav > li").each(function(index,obj){
                // console.log(index);
                var li_width=$(obj).width();
                var container=$(obj).children(".subnav").children(".container");
                var content=container.children(".options");
                // var align_obj=$(obj);
                var align_obj=$(".navbar-nav > li:first");
                
                container.css("padding-left",(align_obj.offset().left)+"px");
                container.css("margin-left","0px");
                container.css("white-space","nowrap");
                // if (index>=2 && index<=5){
                //   content.css("margin-left",(-content.width()/2)+"px");

                // }

                // if (index>2){
                //   content.css("margin-left",(-content.width()+li_width)+"px");
                //   content.children("li").css("margin-left","24px").css("margin-right","0px");
                // }
                
              });
            }
            place_sub_nav();
            $(window).resize(place_sub_nav);
        },
        data(){
          return {
            open_full: false,
          }
        },
        methods:{
          toggle_open(){
            this.open_full=!this.open_full;
          },
          ...mapMutations(['toggle_size','toggle_search'])
        },
        computed: mapState(["solutions","big_font","search"])
    }
</script>
