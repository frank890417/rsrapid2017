
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'

import $ from 'jquery'
require('./bootstrap')
import store from './store'
import router from './router'
import {mapState} from 'vuex'
import {TweenMax} from "gsap"
import ScrollToPlugin from "gsap/ScrollToPlugin"
import Rx from 'rxjs'

//detect ie
function is_ie(){
  var result=(navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1));

  return result?true:false;
}


//init vue
const app = new Vue({
  el: "#app",
  router,
  store,
  computed: mapState(['news','about_logs','big_font']),
  created(){
    if (is_ie()){
      console.warn("IE Detected","Please dont use IE.")
    }else{
      console.warn("IE not Detected","Well Choice.")
    }
    store.commit("set_is_ie",is_ie())
    store.dispatch("loadWebsite");
    window.onscroll=(evt)=>{
        store.commit("set_scrollTop",window.scrollY)
        if (window.update_scroll)
          window.update_scroll(window.scrollY)
        // window.update_scroll()
        // alert("update scroll")
    };
  }
});
window.store=store;

//google analysis
if (document.domain=="www.rapidsuretech.com"){
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52977512-18', 'auto');
  ga('send', 'pageview');
  window.ga=ga;
  console.log("enable ga");
}else{
  console.log("disable ga");
}


//---------------------

if (is_ie()){
  //smooth scroll
  $(function(){ 

    var $window = $(window);
    var scrollTime = 1;
    var scrollDistance = 120;

    $window.on("mousewheel DOMMouseScroll", function(event){

      event.preventDefault(); 

      var delta = event.originalEvent.wheelDelta/150 || -event.originalEvent.detail/3;
      var scrollTop = $window.scrollTop();
      var finalScroll = scrollTop - parseInt(delta*scrollDistance);

      TweenMax.to($window, scrollTime, {
        scrollTo : { y: finalScroll, autoKill:true },
          ease: Power2.easeOut,
          overwrite: 5              
        });
      // console.log(finalScroll);
    });
  });

  // bind update scroll event
  //window.onscroll=window.update_scroll()
}


//數數動畫
var scroll_delay=1000;
var scrolling=false;
var pre_region=null, now_region=null, next_region=null;
var direction='up';
var lock_scroll=true;
var window_width= $(window).outerWidth();
var window_height= $(window).outerHeight();
// var scroll = Rx.Observable.fromEvent(document ,'scroll')
//             .map(e => e.target.scrollingElement.scrollTop);
// scroll.subscribe(obj=>console.log(obj));

//使用卷軸位置更新元件
window.update_scroll=function update_scroll(top_val){

  console.time("scroll_event")

  //update right side bullet
  update_bullet(top_val);

  //update parallax backgrounds
  let bg_px = Array.from(document.getElementsByClassName("bg_parallax"))
  if ( bg_px.length ){
    bg_px.forEach((obj,index)=>{
      let $obj=$(obj)
      if ( !obj.classList.contains("no_attach") ){
        if ($obj.offset().top+$obj.outerHeight()>top_val)
          $obj.css("background-position","center "+ -(top_val-$obj.offset().top)/15+"px");
        
      }else{
        if ($obj.offset().top+$obj.outerHeight()>top_val){
          $obj.css("background-position","center "+ (top_val-$obj.offset().top)/1.6+"px");
        };   
      }
    });
  }
  let mountain_el = document.getElementsByClassName("mountain")
  if (mountain_el.length){
    var of_t=document.getElementById("section_about_log").offsetTop;
    var mobile_fix=(window_width<800)?100:0;
    var mul=(window_width<800)?3:3;
    var mountain_pan=(+(-((top_val)+window_height*0.9-of_t)/mul))+mobile_fix;
    // console.log(mountain_pan);
    mountain_pan = mountain_pan>50?50:mountain_pan
    $(".mountain").css("bottom",mountain_pan+"px");
  }

  var percent_el = Array.from (document.querySelectorAll(".percent.initial"))
  if (percent_el.length){
    //percet nt init
    percent_el.forEach(function(obj,index){
      // update element enter animation
      if (obj.offsetTop<top_val+window_height*0.9){
        obj.classList.remove("initial")
        
        var ed_val=1.0 * obj.getAttribute("data-target");
        var nowval=0;
        var timer=setInterval(function(){
          $(obj).children("span").html(Math.round(nowval));
          if (nowval>=ed_val-0.2){
            clearInterval(timer);
          }else{
            nowval+=(ed_val-nowval)*0.05;
          }
        },30);
      }
    });
  }

  //update section content fadeIn
  let page_initial_el = document.querySelectorAll(".section_title.initial,.section_para.initial");
  Array.from(page_initial_el).forEach(function(obj,index){
    if ($(obj).offset().top<top_val+window_height){
      $(obj).removeClass("initial");
    }
  });


  if (place_sub_nav) place_sub_nav();
  console.timeEnd("scroll_event")
}

//subscribe parallax top
// scroll.subscribe(top_val=>update_scroll(top_val));

//upadte bullet nav points
function update_bullet(st){
  now_region=null;
  next_region=null;
  var last=null;
  //偵測在哪個區域
  var bullet_el = Array.from(document.querySelectorAll(".slide_bullet li")) ;
  if (bullet_el.length){
    bullet_el.forEach(function(bullet_obj,index){
      var data_link = bullet_obj.getAttribute("data-link");
      var $link_obj=  $( data_link );
      var tar_h=$link_obj.height();

      if ($link_obj.offset()){
        if ($link_obj.offset().top<=st+tar_h/2 &&
          $link_obj.offset().top>=st-window_height/2){
          bullet_obj.classList.add("active");

          now_region=data_link;
          pre_region=last;
          // console.log(now_region,pre_region);

        }else{
          
          bullet_obj.classList.remove("active");
          if (now_region && !next_region){
            next_region=data_link;
          }
        }
        last=data_link;
      }
      
    });
  }

}

//頁面還原初始狀態
function init_element(){
  if (!is_ie()){
    $(".percent , .section_title , .section_para").addClass("initial");
    setTimeout(function(){
      update_scroll(0);
    },50);
  }

}


//載入執行
$( window ).ready(function(){
  //
  if (location.href.indexOf("#")!=-1){
    $("#select_contact").val(location.href.split("#")[1]);
  }
  // //加上初始化
  init_element()
  //initial bg parallax
  

  // });
  //回到最上面按鈕
  $(".go_to_topbtn").click(function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

  // wheelDelta
  var mousewheel = Rx.Observable.fromEvent(document,'mousewheel')
                                .map(e=>e.wheelDelta );   


  update_bullet(0);
  //snap locker by Rxjs



  if (lock_scroll && window_height>900 && window_width>1200 && !is_ie() ){
    console.log("enable snap")
    //filter delta which bigger than thereshold and filter out twice down/up condition
    var source_page_nav=mousewheel.filter(
      delta=>((delta>50 && (direction=='down' || !scrolling))
           || (delta <= -50 && !scrolling && (direction=='up' || !scrolling)))
      ) 
    .map(delta=>(delta>0?'up':'down'))                //map delta to up or down
    .throttleTime(500);                               //filter event by 200ms time span

    source_page_nav.subscribe((direct)=>{             //subscribe the event
      if (router.history.current.fullPath=="/"){
        console.log(direct);
        direction=direct;
        var target_block=(direct=='up')?pre_region:next_region;

        if ($(document).scrollTop()+$(window).height()>=$(document).height()-20) target_block = ".section_solution";
        console.log("target:"+target_block);
        if (target_block)
          $("html, body").animate({ scrollTop: $(target_block).offset().top }, "slow");
      }
    }); 
    //cancel the scrolling boolean after scroll
    source_page_nav.delay(500).subscribe(()=>{
      scrolling=false;
    });

    $(window).bind('mousewheel', function(event) {
      if (router.history.current.fullPath=="/" && window_height>850 ){
        event.preventDefault();
      }
    });
  }
})