<template lang="jade">
div.page_index
  ul.slide_bullet
    li(data-link=".page_index_main")
    li(data-link=".page_index_grow")
    li(data-link=".page_index_live")
    li(data-link=".page_index_accurate")
    li(data-link=".section_solution")
    li(data-link=".detail_footer" style="display: none")

  section.page_index_main.bg_parallax
    .container.index_slogan_area
      h1 為安全出發 
        span.color_theme 讓生活更美好
      h3.page_header_eng Better health, better life

    .container.news_container
      .slick
        .news.color_white(v-for='(a_news,id) in news')          
          .col_infos
            .texts
              h4 {{a_news.title}}
              h5 {{a_news.date}}
              p {{a_news.content.replace(/<[^>]*>/g, '').substr(0,70)+'...'}}
            .btns
              router-link.btn.btn-default.btn-primary-lighter.btn_more(:to="'/news/'+a_news.id") 了解更多
              a.btn.btn-default.btn-transparent.btn_next(@click="news_delta" ) 下一則  > 
          
          .col_img(:style="bg_css(a_news.cover)")
      .timeline
        .value



  section.page_index_grow.bg_parallax
    canvas.wave
    .container.flex
      .col_left
      .col_right
        h3.section_title 孩子成長的生活環境
        p.section_para.text-left 我們的生活環境有許多食安風險與汙染問題直接影響健康，這些有毒的化學物質被不肖業者濫用，使得我們的飲食與環境到處充斥具有危害與累積性毒素。<br><br>全世界每天有約5,500位兒童死於污染的水、空氣與食物所導致的疾病。
        .percent.text-right(data-target=5500) 5500

  section.page_index_live.bg_parallax
    canvas.wave
    .container.flex
      .col_left
        h3.section_title 從居家到工作環境
        p.section_para.text-left 近年來食安問題層出不窮，引發全民對食品安全的恐慌與疑慮。有鑒於食安事件中不乏多家知名大廠，凸顯了業者自主管理的漏洞。食品安全須從源頭管理做起，以保障民眾得到安全的食物來源。<br><br>根據估計，每年全球食安事件導致的死亡人數高達200萬人。
        router-link.btn.btn-primary(to='/tech') 了解更多
        .percent.text-right(data-target=200) 200
      .col_right
        

  section.page_index_accurate
    .container.flex
      .col_left
      .col_right
        h3.section_title 睿軒專注精準檢驗
        p.section_para.text-left 在關懷台灣食品與環境安全問題的基礎上，我們與國立中山大學共同開發「快速檢驗平台」專利技術，只須5秒即可分析出有害化學物質，是你我守護居家生活安全的最佳快速幫手。
        router-link.btn.btn-transparent(to='tech') 了解更多
    .container.flex.type_container
      .row
        .acc_sm_pic(data-type=1).flex_sm_6
          h4 採集樣品
        .acc_sm_pic(data-type=2).flex_sm_6
          h4 &nbsp;
      .row
        .acc_sm_pic(data-type=3).flex_sm_6 
          h4 進樣分析
        .acc_sm_pic(data-type=4).flex_sm_6 
          h4 資料庫比對

  section_solutions

  //section.page_index_sponsor
    .container.flex.slicklogo1
      .item
        img.sponsorlogo(src="/img/cor_logo/cor_logo-01.png" style="opacity: 0")
      .item
        img.sponsorlogo(src="/img/cor_logo/cor_logo-01.png")
      .item
        img.sponsorlogo(src="/img/cor_logo/cor_logo-02.png")
      .item
        img.sponsorlogo(src="/img/cor_logo/cor_logo-01.png" style="opacity: 0")
</template>

<script>
    export default {
        data () {
          return {
            news_id: 0,
            news_time: 0,
            news_change_time: 4000,
            arrows: false,
            timer: null
          };

        },
        mounted() {
            console.log('index mounted.');
            $(".percent , .section_title , .section_para").addClass("initial");
            setTimeout(function(){
              update_scroll(0);
            },200);
            var vobj=this;

            this.timer=setInterval(this.news_delta,this.news_change_time);

            var loader = setInterval(function(){
              if (vobj.news.length>0){
                $('.slick').slick({
                  autoplay: false,
                  // dots: true,
                  easing: 'ease-in',
                  fade: true
                });
                clearInterval(loader);
                vobj.news_delta();
                // Ts.reload();
              }
            },100);
            
            console.log("slick integrated");

            $('.slicklogo1').slick({
              autoplay: true,
              autoplaySpeed: 3000,
              slidesToShow: 4,
              slidesToScroll: 1,
              arrows: false,
              dots: true,
              easing: 'ease-in'
            });

            

            var mCanvasSelector = "canvas.wave";
            (function waveGenerator(window,mCanvasSelector){
              var canvas = document.createElement('canvas');
              var windowHeight=window.outerHeight;
              canvas.height=windowHeight;
              canvas.width=windowHeight;
              var ctx = canvas.getContext("2d");
              var len = windowHeight;
              var panY=150;
              var freq=100;
              var time=0;
              var mirror_list=[];
              $(mCanvasSelector).each((index,obj)=>{
                mirror_list.push(obj);
              });
              
              mirror_list.forEach((mCtx)=>{
                mCtx.height=300;
                mCtx.width=windowHeight;
              },20);
              
              ctx.strokeWidth=1;
              //set timer
              setInterval(function(){
                ctx.clearRect(0,0,len,300);
                ctx.beginPath();
                function draw_wave(r,freq,pan,speed){
                  for(var i=0;i<len;i++){
                    var deg1=2*Math.PI*((i-1)/freq+pan+time*speed);
                    var deg2=2*Math.PI*(i/freq+pan+time*speed);
                    var opacity= Math.pow(Math.E,-Math.abs(i-len*0.75)/(len/8))*0.2;
                    ctx.strokeStyle="rgba(63,191,187,"+opacity+")";
                    ctx.beginPath();
                    ctx.moveTo(i-1,panY+r*Math.sin(deg1));
                    ctx.lineTo(i,panY+r*Math.sin(deg2));
                    ctx.stroke();
                  }
                }
                draw_wave( 30 , 600 , 0 , 0.0005 );
                draw_wave( 30 , 800 , 20 , 0.00075 );
                draw_wave( 30 , 1000 , 40 , 0.0009 );

                time++;

                mirror_list.forEach((mCtx)=>{
                  var destCtx = mCtx.getContext('2d');
                  destCtx.clearRect(0,0,len,1000)
                  destCtx.drawImage(canvas, 0, 0);
                },20);
              });

            })(window,mCanvasSelector);








            // if (Ts) Ts.reload();


        },
        methods: {
          news_delta: function(){
            $('.slick').slick('slickNext');
            console.log("next");
            $(".value").stop();
            $(".value").animate({width: "0%"},0);
            $(".value").animate({width: "100%"},this.news_change_time,'linear');
            clearInterval(this.timer);
            this.timer=setInterval(this.news_delta,this.news_change_time);
          },
          bg_css(url){
            return {'background-image': 'url('+url.trim().replace(' ','%20')+')'}
          }


        },
        computed: Vuex.mapState(['news']),
        beforeDestroy() {
          clearInterval(this.timer);
        }
    }
</script>