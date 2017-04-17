<template lang="jade">
div.page_about
  section#section_about_from.section_hero
    .mountain
    .container.flex.column
      .col_hero
        h1.section_title.text-center 理念與願景
        p 在關懷台灣食品與環境安全的問題，我們看見自己的愛與責任。於是在一群熱愛這片土地的我們努力下，從學界研究走向產業應用，與國立中山大學共同開發「質譜快速檢驗平台」專利技術，於2015年成立了睿軒檢驗科技。<br><br>無論是在農畜產品、食品加工、環境分析等領域，都能創造獨特的檢驗效率，與無可取代的時間效益。守護民眾的健康期許，營造安心的生活環境。以嚴謹科研態度與前瞻先進技術，建構食的安心、用的放心，便利顧客並享有快速與安全的保障。<br><br>誠信 : 以正直嚴謹與崇法務實的科學方法，為客戶驗證食品與環境安全。<br>專業 : 應用先端研發的快篩技術與富有熱忱的服務態度，面對市場滿足客戶需求。<br>創新 : 挑戰新思維，持續研發潛在檢測項目及客戶解決方案，創造嶄新的商業價值。

  section#section_about_log.section_log
    .container.flex.column
      h1.section_title.text-center 大事記
      ul.nav_line_split.text-center
        li(@click="sel_year='year_2016'" v-bind:class="sel_year=='year_2016'?'active':''") 2016
        li(@click="sel_year='year_2015'" v-bind:class="sel_year=='year_2015'?'active':''") 2015

      transition(name="fade" mode="out-in")
        .logs_area.top_out(v-if="sel_year==sel" v-for='sel in ["year_2015","year_2016"]' v-bind:key="sel")
          router-link.row.log_box(v-for="log in about_logs[sel]" v-bind:key="log"  v-on:click='to_href(log)' v-bind:to="'/news/'+ log.news_id")
            .col_cover
              .cover_image(:style="'background-image:url('+log.cover+')'")
            .col_info
              h5.date {{log.date}}
              h4.title {{log.title}}
              p {{log.content}}
</template>

<script>
  import { mapGetter, mapActions , mapState } from 'vuex'
  export default {
      data() {return {
        sel_year: "year_2016"
      }},
      mounted() {
          console.log('about mounted.')
          Ts.reload();
      },
      methods: {
        to_href: function(obj) {
          console.log(this);
          if (obj.news_id!=1){
            this$route.router.go("/news/"+obj.news_id);
          }
        }
      },
      computed: Vuex.mapState(['about_logs'])

  }
</script>