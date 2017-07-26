<template lang="jade">
div.page_about
  section#section_about_from.section_hero
    .mountain
    .container
      .col_hero
        h1.section_title.text-center {{$t('page_about.section_1.title')}}
        p(v-html="$t('page_about.section_1.content')")
  section#section_about_log.section_log
    .container.flex.column
      h1.section_title.text-center {{$t('page_about.section_2.title')}}
      ul.nav_line_split.text-center
        li( v-for='sel in yearlist',
            :class="sel_year==sel?'active':''",
            @click="sel_year=sel") {{sel}}
      .logs_area.top_out
        transition(name="fade" mode="out-in")
          div(v-if="sel_year==sel" v-for='sel in yearlist' ,:key="sel")
            router-link.row.log_box(
                            v-for="log in get_year(about_logs,sel)" ,
                            :key="log" ,
                            v-on:click='to_href(log)' ,
                            :to=" log.news_id!=-1?('/news/'+log.news_id):'#' ")
              .col_cover
                .cover_image(:style="'background-image:url('+log.cover+')'")
              .col_info
                h5.date {{log.date}}
                h4.title {{log.title}}
                div.content(v-html="log.content")

</template>

<script>
  import { mapGetter, mapActions , mapState } from 'vuex'

  export default {
      data() {return {
        sel_year: 2015
      }},
      mounted() {
          console.log('about mounted.')
          //if (Ts) Ts.reload();
          // if (document.location.hash=="#section_about_log"){
          //   $("html, body").animate({ scrollTop: $(".section_about_log") }, "slow");
          // }
          this.sel_year=this.yearlist[0];
      },
      methods: {
        to_href: function(obj) {
          console.log(this);
          if (obj.news_id!=1){
            this$route.router.go("/news/"+obj.news_id);
          }
        },
        get_year(ar,y) {
          return JSON.parse(JSON.stringify(ar))
                  .filter((o)=>o.year==y)
                  .sort((a,b)=>(
                    parseInt(b.date.substr(0,2)) - parseInt(a.date.substr(0,2)) 
                  ));
        }
      },
      computed: {
        ...mapState(['about_logs']),
        yearlist(){
           let result = this.about_logs
                     .map(o=>o.year)
                     .filter((d,i,arr)=>arr.indexOf(d)==i)
                     .sort((a,b)=>b-a)
           //預設選擇設為最新的年份
           this.sel_year=result[0]
           return result
        }
      }

  }
</script>