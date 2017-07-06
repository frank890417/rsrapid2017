<template lang="jade">
div.page_index
  ul.slide_bullet
    li(data-link=".page_index_main" ,@click="jump_bullet")
    li(data-link=".page_index_grow",@click="jump_bullet")
    li(data-link=".page_index_live",@click="jump_bullet")
    li(data-link=".page_index_accurate",@click="jump_bullet")
    li(data-link=".section_solution",@click="jump_bullet")
    li(data-link=".detail_footer" style="display: none",@click="jump_bullet")

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
    
    .container.flex
      .col_left
      .col_right
        h3.section_title(v-text="$t('page_index.section_1.title')")
        p.section_para.text-left(v-html="$t('page_index.section_1.content')")
        .percent.text-right(data-target="5500") 
          canvas.wave
          span 5500

  section.page_index_live.bg_parallax
    
    .container.flex
      .col_left
        h3.section_title(v-text="$t('page_index.section_2.title')")
        p.section_para.text-left(v-html="$t('page_index.section_2.content')")
        //router-link.btn.btn-primary(to='/tech') 了解更多
        .percent.text-right(:data-target="200") 
          canvas.wave
          span 200
      .col_right
        

  section.page_index_accurate
    .container.flex
      .col_left
      .col_right
        h3.section_title(v-text="$t('page_index.section_3.title')")
        p.section_para.text-left(v-html="$t('page_index.section_3.content')")
        //router-link.btn.btn-transparent(to='/tech') 了解更多
    .container.flex.type_container
      .row
        .acc_sm_pic(data-type=1).flex_sm_6
          h4(v-text="$t('page_index.section_3.squares[0].title')")
        .acc_sm_pic(data-type=2).flex_sm_6
          h4 &nbsp;
          //h4(v-text="$t('page_index.section_3.squares[1].title')")
      .row
        .acc_sm_pic(data-type=3).flex_sm_6 
          h4(v-text="$t('page_index.section_3.squares[2].title')")
        .acc_sm_pic(data-type=4).flex_sm_6 
          h4(v-text="$t('page_index.section_3.squares[3].title')")

  section_solutions(:shown="$t('page_index.section_solution.solutions')")

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
import {mapState} from 'vuex';
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
            if (!this.is_ie){
              $(".percent , .section_title , .section_para").addClass("initial");
              setTimeout(function(){
                update_scroll(0);
              },200);
            }
            
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
                    var opacity= Math.pow(Math.E,-Math.abs(i-len*1)/(len/0.8))*0.2;
                    ctx.strokeStyle="rgba(63,191,187,"+opacity+")";
                    ctx.beginPath();
                    ctx.moveTo(i-1,panY+r*Math.sin(deg1));
                    ctx.lineTo(i,panY+r*Math.sin(deg2));
                    ctx.stroke();
                  }
                }
                draw_wave( 50 , 600 , 0 , 0.0005 );
                draw_wave( 50 , 800 , 20 , 0.00075 );
                draw_wave( 50 , 1000 , 40 , 0.0009 );

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
            return {'background-image': 'url('+(url+"").trim().replace(' ','%20')+')'}
          },
          jump_bullet(event){
            $("html, body").animate({ scrollTop: $($(event.target).attr("data-link")).offset().top }, "slow");
            console.log("call vue bullet jump")
  
          }


        },
        computed: mapState(['news','is_ie']),
        beforeDestroy() {
          clearInterval(this.timer);
        }
    }
</script>