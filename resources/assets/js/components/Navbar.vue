<template lang="jade">
div
  div.fullnav(:class="open_full?'open':''")
    .close_btn(@click="toggle_open")
    .container
      img.headerimg(src="/img/Rapid.png")
      ul.functions
        li.function.func_lang
          a(href="#")
            span 繁
            i.fa.fa-angle-down 
          ul.subnav
            .container
              div.options
                li(v-for = "l in lang")
                  router-link(to="#") {{l.name}}
        li.function.func_size(@click='toggle_size')
              img.icon_big(src="/img/icon_word_big.svg" style="width: 22px" v-if="!big_font")
              img.icon_small(src="/img/icon_word_small.svg" style="width: 22px" v-if="big_font")
      ul.main_list
        li(v-for="main_tag in maked_nav_structure")
          h4 
            router-link(:to="main_tag.link") {{main_tag.tag}}
          ul.sub_list(v-if="main_tag.childs && main_tag.childs.length>0")
            li(@click="toggle_open" v-for="sub_tag in main_tag.childs")
              router-link( :to="sub_tag.link") {{sub_tag.tag}}

  nav.navbar(:class="{search: search,at_top: scrollTop<=0}")
    .container
      .row
        div.nav-leftpart
          //logo          
          .navbar-header.col-sm-3
            router-link.navbar-brand(to="/")
              img.logo(src="/img/Rapid.png")
          .navbar-search-input
            section_search

          // 使用 nav_structure自動產生選單
          ul.navbar-nav.navbar-left.text-left
            li(v-for="main_tag in maked_nav_structure"
               v-if="!main_tag.hide_navbar")

              //選擇性產生router-link或a(#)
              a(v-if="main_tag.link=='#'") {{main_tag.tag}}

              router-link(:to="main_tag.link" v-if="main_tag.link!='#'") {{main_tag.tag}}

              //子選單
              ul.subnav(v-if="main_tag.childs && main_tag.childs.length>0")
                .container.flex
                  div.options
                    li(v-for="sub_tag in main_tag.childs")
                      router-link(:to="sub_tag.link") {{sub_tag.tag}}

        //右半部語言跟功能選單
        ul.nav.navbar-nav.navbar-right
          li.function.func_lang
            a(href="#")
              span 繁
              i.fa.fa-angle-down 
            ul.subnav
              .container
                div.options
                  li(v-for = "l in lang")
                    router-link(to="#") {{l.name}}
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
    import nav_structure from '../nav_structure'
    export default {
        mounted() {
            console.log('navbar mounted.');

            //update subnav position
            
            this.place_sub_nav();
            window.place_sub_nav=this.place_sub_nav;
            $(window).resize(this.place_sub_nav);

            
        },
        data(){
          return {
            open_full: false,
            open_lang: false,
            nav_structure,
            lang: [{name: "繁"},{name: "简"},{name: "EN"}]
          }
        },
        watch:{
          scrollTop(){
            this.place_sub_nav();
            if (this.scrollTop<=0){
              setInterval(function(){
                
                this.place_sub_nav();
              },500);
            }
          }

        },
        methods:{
          toggle_open(){
            this.open_full=!this.open_full;
          },
          place_sub_nav(){
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
          },
          ...mapMutations(['toggle_size','toggle_search'])
        },
        computed: {
          ...mapState(["solutions","big_font","search","scrollTop"]),

          maked_nav_structure(){
            if (this.solutions.length>0){
              var options = this.solutions.map((obj)=>({
                tag: obj.title.replace('計畫',''), 
                link: '/solution/'+obj.id
              }));
              console.log(this.solutions);

              this.nav_structure
                .filter((obj)=>obj.tag == "檢測方案")[0]
                .childs = options;

              return this.nav_structure;
            }else{
              return this.nav_structure
            }
        }
      }
  }
</script>
