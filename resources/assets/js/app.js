
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';
import Vuex from 'vuex';

require('./bootstrap');
Vue.use(VueRouter);
Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('Navbar', require('./components/Navbar.vue'));
var page_index=Vue.component('page_index', require('./components/page_index.vue'));
var page_about=Vue.component('page_about', require('./components/page_about.vue'));
var page_news=Vue.component('page_news', require('./components/page_news.vue'));
var page_solution=Vue.component('page_solution', require('./components/page_solution.vue'));
var page_tech=Vue.component('page_tech', require('./components/page_tech.vue'));

var section_footer=Vue.component('section_footer', require('./components/section_footer.vue'));
var section_solutions=Vue.component('section_solutions', require('./components/section_solutions.vue'));

const routes = [
  { path: '/', component: page_index },
  { path: '/about', component: page_about },
  { path: '/tech', component: page_tech },
  { path: '/solution', component: page_solution },
  { path: '/news', component: page_news },
  { path: '/job', component: page_index },
]

const router = new VueRouter({
  routes,
  mode: "history"
})

router.beforeEach((to, from, next) => {
  console.log(to);
  $("html, body").animate({ scrollTop: 0 }, "slow");
  next();
})

const store = new Vuex.Store({
  state: {
    
    
  },
  mutations: {
    increment (state) {
      state.count++;
    }
  }
})

const app = new Vue({
  el: "#app",
  router,
  store,
  computed: Vuex.mapState(['news','about_logs']),
  methods: {
    news_delta: function(d){
      this.news_id=(this.news.length+d+this.news_id)%this.news.length;
      this.news_time=0;
    }
  },mounted: function(){
    var vobj=store.state;
    $.get("http://www.rapidsuretech.com/api/news").then(function(res){
      vobj.news=res;
    });
  }
});


//---------------------

//數數動畫
var scroll_delay=1000;
var scrolling=false;
var pre_region=null, now_region=null, next_region=null;
var direction='up';
var lock_scroll=false;
var window_height= $(window).height();
var scroll = Rx.Observable.fromEvent(document,'scroll')
            .map(e => e.target.scrollingElement.scrollTop);
// scroll.subscribe(obj=>console.log(obj));

//Rx捲軸位置
scroll
  .map(top => top<=0)
  .subscribe((at_top)=>{
    if (at_top) 
      $("nav").addClass("at_top");
    else 
      $("nav").removeClass("at_top");
  });

//使用卷軸位置更新元件
function update_scroll(top_val){
  $(".bg_parallax").css("background-position","center "+top_val/5.00+"px");

    //percet nt init
    $(".percent.initial").each(function(index,obj){
      // console.log("test");
      // update element enter animation
      if ($(obj).offset().top<top_val+window_height*0.8){
        $(obj).removeClass("initial");
        
        var ed_val=1.0*$(obj).attr("data-target");

        var nowval=0;
        var timer=setInterval(function(){
          $(obj).html(Math.round(nowval));
          if (nowval>=ed_val-0.2){
            clearInterval(timer);
          }else{
            nowval+=(ed_val-nowval)*0.05;
          }
        },30);
      }
    });

    //update section content fadeIn
    $(".section_title.initial,.section_para").each(function(index,obj){
      if ($(obj).offset().top<top_val+window_height*0.8){
        $(obj).removeClass("initial");
      }
    });

    //update right side bullet
    update_bullet(top_val);
}

//subscribe parallax top
scroll.subscribe(top_val=>update_scroll(top_val));

//upadte bullet nav points
function update_bullet(st){
  now_region=null;
  next_region=null;

  var last=null;
  $( ".slide_bullet li").each(function(index,obj){
    var data_link = $( this ).attr("data-link");
    var tar_h=$( data_link ).height();

    if ($( data_link ).offset()){
      if ($( data_link ).offset().top<=st+tar_h/2 &&
        $( data_link ).offset().top>=st-window_height/2){
        $( this ).addClass("active");
        now_region=data_link;
        pre_region=last;

      }else{
        
        $( this ).removeClass("active");
        if (now_region && !next_region){
          next_region=data_link;
        }
      }
      last=data_link;
    }
    
  });
}
  
//載入執行
$( window ).ready(function(){
  //
  if (location.href.indexOf("#")!=-1){
    $("#select_contact").val(location.href.split("#")[1]);
  }
  // //加上初始化
  $(".percent , .section_title , .section_para").addClass("initial");
  // $(window).scrollto(0);
  //initial bg parallax
  $(".bg_parallax").css("background-size","105% auto");

  //把答案藏起來
  $(".question_list .answer").slideToggle();

  $(".question_list li").click(function(){
    // console.log($(this));
    $(this).children(".question").children(".answer").slideToggle();
    $(this).children(".icon").toggleClass("icon_plus");
  });

  update_scroll(0);


  //調整字體大小
  $(".icon_text_size").click(function(){
    var el=$(this)
    if (el.hasClass("bigger")){
      el.removeClass("bigger");
      el.addClass("smaller");
      el.children(".text").text("A-");
      $("p").css("font-size","17px")
          .css("line-height","30px");
      $(".question_list").css("font-size","17px");
    }else{
      el.removeClass("smaller");
      el.addClass("bigger");
      el.children(".text").text("A+");
      $("p").css("font-size","")
          .css("line-height","");
      $(".question_list").css("font-size");
    }
      
  });
  //回到最上面按鈕
  $(".go_to_topbtn").click(function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

  //bullet
  $(".slide_bullet li").click(function(){
    $("html, body").animate({ scrollTop: $($(this).attr("data-link")).offset().top }, "slow");
  });

  // wheelDelta
  var scroll = Rx.Observable.fromEvent(document,'scroll')
  var mousewheel = Rx.Observable.fromEvent(document,'mousewheel')
                                .map(e=>e.wheelDelta );   


  update_bullet(0);
  //snap locker by Rxjs
  if (lock_scroll || location.href.indexOf("index")!=-1){
    //filter delta which bigger than thereshold and filter out twice down/up condition
    var source_page_nav=mousewheel.filter(
      delta=>((delta>50 && (direction=='down' || !scrolling))
           || (delta <= -50 && !scrolling && (direction=='up' || !scrolling)))
      ) 
    .map(delta=>(delta>0?'up':'down'))                //map delta to up or down
    .throttleTime(500);                               //filter event by 200ms time span

    source_page_nav.subscribe((direct)=>{             //subscribe the event
      console.log(direct);
      direction=direct;
      var target_block=(direct=='up')?pre_region:next_region;
      if (target_block)
        $("html, body").animate({ scrollTop: $(target_block).offset().top }, "slow");
    }); 
    //cancel the scrolling boolean after scroll
    source_page_nav.delay(500).subscribe(()=>{
      scrolling=false;
    });

    $(window).bind('mousewheel', function(event) {
      event.preventDefault();
    });
  }
});

// var source = Rx.Observable.interval(100);
// source.subscribe((t)=>{
//   vm.news_time=(vm.news_time+100) % vm.news_change_time;
// });

// source.throttleTime(5000)
//       .subscribe(()=>{
//         vm.news_delta(1);

// });



//---------------------

if (!window.require_js) window.require_js={};

if (window.require_js.tinymce){
  $(document).ready(function(){
    console.log("Test");
    tinymce.init({
      selector: '#content',
      api_key: 'ngpn9ha5mk1a69lvgt66jzupekxmd86rn8e1iwjtyw3i3m6c',
      images_upload_url: 'postAcceptor.php',
      images_upload_base_path: '/some/basepath',
      images_upload_credentials: true,
      setup: function (editor) {
        editor.addButton('uploadpic', {
          text: '上傳圖片',
          icon: false,
          onclick: function () {
            $(".btn-dropzone").click();
          }
        });
        editor.addButton('uploadpic_url', {
          text: '插入圖片(連結網址)',
          icon: false,
          onclick: function () {
            var imgurl = prompt("輸入圖片網址", "插入圖片");
            if(imgurl!="" && imgurl ){
              tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');

            }
          }
        });
      },
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | uploadpic | uploadpic_url',
      plugins : "paste,link",
      theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
      paste_auto_cleanup_on_paste : true,
      paste_preprocess : function(pl, o) {
          // Content string containing the HTML from the clipboard
          // alert(o.content);
          console.log(o.content);
          
          // o.content = $("<p></p>").html(o.content).text();
      },
      paste_postprocess : function(pl, o) {
          // Content DOM node containing the DOM structure of the clipboard
          // alert(o.node.innerHTML);
          o.node.innerHTML = o.node.innerHTML;
      }
    });
  });
}



if (window.require_js.dropzone){
  //初始化Dropzone上傳圖片function
  function gen_dz(classname,callback){  
    var myDropzone = new window.Dropzone(classname, {
      url: "/dropzone/upload.php",maxFiles: 1
      ,sending: function(){
        // vm.page_status="圖片上傳中<img src='../img/loadingicon_gold.png' class=loadingspin>";
      }
      ,success: function(evt,res){
        callback(evt,res);
      }
    });
    // myDropzone.createThumbnailFromUrl(file, this.ndata.img, callback, crossOrigin);
    // $("#dropfrontimg").dropzone({ url: "http://citi2016.unitedway.org.tw/dropzone/" });
    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
      setTimeout(function(){
        // vm.page_status="圖片上傳完畢";
      },300);
      
    });
  }

  gen_dz(".btn-dropzone",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/rsrapid2017/public/","/");
     console.log(imgurl);
     tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');
  });

  gen_dz(".btn-dropzone-cover",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/rsrapid2017/public/","/");
     console.log(imgurl);
     $("#cover").val(imgurl);
     $(".cover_preview").attr('src',imgurl);
  });

}


//-------------------------

