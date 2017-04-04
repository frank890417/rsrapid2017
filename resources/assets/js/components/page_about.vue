<template lang="jade">
div.page_about
  section.section_hero.bg_theme.bg_parallax
    .container
      .row
        .col-sm-6.col-sm-offset-3
          h1.section_title.text-center 理念與願景
          p 在關懷台灣食品與環境安全的問題，我們看見自己的愛與責任。於是在一群熱愛這片土地的我們努力下，從學界研究走向產業應用，與國立中山大學共同開發「質譜快速檢驗平台」專利技術，於2015年成立了睿軒檢驗科技。<br><br>無論是在農畜產品、食品加工、環境分析等領域，都能創造獨特的檢驗效率，與無可取代的時間效益。守護民眾的健康期許，營造安心的生活環境。以嚴謹科研態度與前瞻先進技術，建構食的安心、用的放心，便利顧客並享有快速與安全的保障。<br><br>誠信 : 以正直嚴謹與崇法務實的科學方法，為客戶驗證食品與環境安全。<br>專業 : 應用先端研發的快篩技術與富有熱忱的服務態度，面對市場滿足客戶需求。<br>創新 : 挑戰新思維，持續研發潛在檢測項目及客戶解決方案，創造嶄新的商業價值。<br>

  section.section_log
    .container
      .row
        .col-sm-12
          h1.section_title.text-center 大事記
          ul.nav_line_split.text-center
            li(@click="sel_year='year_2016'" v-bind:class="sel_year=='year_2016'?'active':''") 2016
            li(@click="sel_year='year_2015'" v-bind:class="sel_year=='year_2015'?'active':''") 2015

        .col-sm-12.logs_area
          .row.log_box(v-for="log in about_logs[sel_year]")
            .col-sm-4
              .cover_image(:style="'background-image:url('+log.cover+')'")
            .col-sm-8.info
              h5.date {{log.date}}
              h4.title {{log.title}}
              p {{log.content}}
</template>

<script>
  import { mapState } from 'vuex';
  export default {
      data() {return {
        sel_year: "year_2015",
        about_logs: {
          year_2015: [
            {
              date: "03/01",
              title: "成立睿軒檢驗",
              cover: "/img/homepage/Post1.jpg",
              content: "鴻海樂活養生健康事業群與中山大學技術合作，合資設立了睿軒檢驗科技股份有限公司。"
            },
            {
              date: "05/01",
              title: "貴陽大數據博覽會參展",
              cover: "/img/homepage/Post2.jpg",
              content: "參與5/26-29於貴陽舉辦之2015貴陽國際大數據產業博覽會暨全球大數據時代貴陽鋒會。"
            },
            {
              date: "12/01",
              title: "全台幼兒環境大義診",
              cover: "/img/homepage/Post3.jpg",
              content: "受邀於永齡健康基金會，睿軒檢驗深入全台偏鄉幼兒園，展開玩具義診活動。"
            }
          ],
          year_2016: [
            {
              date: "04/01",
              title: "貴陽大數據博覽會參展",
              cover: "/img/homepage/Post3.jpg",
              content: "鴻海樂活養生健康事業群宣佈與中山大學技術合作。"
            },
            {
              date: "05/01",
              title: "貴陽大數據博覽會參展",
              cover: "/img/homepage/Post2.jpg",
              content: "參與5/26-29於貴陽舉辦之2016貴陽國際大數據產業博覽會，多位國內外企業家與國家領導人受邀出席。"
            }
          ],

        }
      }},
      mounted() {
          console.log('about mounted.')
      },
      computed() {
        return Vuex.mapState(['about_logs'])
      }

  }
</script>