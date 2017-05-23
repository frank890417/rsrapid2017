
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Slick from 'vue-slick';

require('./bootstrap');
Vue.use(VueRouter);
Vue.use(Vuex);


//components

Vue.component('slick', Slick);

Vue.component('example', require('./components/Example.vue'));
Vue.component('Navbar', require('./components/Navbar.vue'));

var page_index = Vue.component('page_index', require('./components/page_index.vue'));
var page_about = Vue.component('page_about', require('./components/page_about.vue'));
var page_news = Vue.component('page_news', require('./components/page_news.vue'));
var page_solution = Vue.component('page_solution', require('./components/page_solution.vue'));
var page_tech = Vue.component('page_tech', require('./components/page_tech.vue'));
var page_post = Vue.component('page_post', require('./components/page_post.vue'));
var page_job = Vue.component('page_job', require('./components/page_job.vue'));
var page_contact = Vue.component('page_contact', require('./components/page_contact.vue'));
var page_tern = Vue.component('page_tern', require('./components/page_tern.vue'));

var section_footer = Vue.component('section_footer', require('./components/section_footer.vue'));
var section_solutions = Vue.component('section_solutions', require('./components/section_solutions.vue'));
var section_search = Vue.component('section_search', require('./components/section_search.vue'));

//routes

const routes = [
  { path: '/', component: page_index },
  { path: '/about', component: page_about },
  { path: '/tech', component: page_tech },
  { path: '/solution/:id', component: page_solution , props: true},
  { path: '/solution/0', alias: '/solution'},
  { path: '/news', component: page_news },
  { path: '/news/:id', component: page_post , props: true},
  { path: '/news/cata/:cataname', component: page_news , props: true},
  { path: '/job', component: page_job },
  { path: '/contact', component: page_contact },
  { path: '/tern', component: page_tern },
  { path: '/search', component: section_search }
];

const router = new VueRouter({
  routes,
  mode: "history"
})

router.beforeEach((to, from, next) => {
  console.log(to);
  var waittime=600;
  if (to.path==from.path){
    waittime=50;
  }
  if (to.path=="/about" && to.hash=="#section_about_log"){

    setTimeout(function(){
      $("html, body").animate({ scrollTop: $(".section_log").offset().top-100  }, "slow");
    },waittime);
  }else{
    $("html, body").animate({ scrollTop: 0 }, "slow");
  }
  next();
});


const store = new Vuex.Store({
  state: {
    news: [],
    questions: [],
    big_font: false,
    search: false,
    about_logs: {
      year_2015: [
        {
          date: "03/01",
          title: "成立睿軒檢驗",
          news_id: 2,
          cover: "/img/homepage/Post2.jpg",
          content: "鴻海樂活養生健康事業群與中山大學技術合作，合資設立了睿軒檢驗科技股份有限公司。"
        },
        {
          date: "05/01",
          title: "貴陽大數據博覽會參展",
          news_id: 3,
          cover: "/img/homepage/Post3.jpg",
          content: "參與5/26-29於貴陽舉辦之2015貴陽國際大數據產業博覽會暨全球大數據時代貴陽鋒會。"
        },
        {
          date: "12/01",
          title: "全台幼兒環境大義診",
          news_id: 1,
          cover: "/img/homepage/Home-news-2.jpg",
          content: "受邀於永齡健康基金會，睿軒檢驗深入全台偏鄉幼兒園，展開玩具義診活動。"
        }
      ],
      year_2016: [
        {
          date: "03/01",
          title: "鴻海和中山合資技轉記者會",
          news_id: 4,
          cover: "/img/homepage/Post1.jpg",
          content: "鴻海樂活養生健康事業群宣佈與中山大學技術合作。"
        },
        {
          date: "05/01",
          title: "貴陽大數據博覽會參展",
          news_id: 5,
          cover: "/img/homepage/Post4.jpg",
          content: "參與5/26-29於貴陽舉辦之2016貴陽國際大數據產業博覽會，多位國內外企業家與國家領導人受邀出席。"
        }
      ],

    },
    solutions: [
      {
        id: 0,
        title: "校園環境健檢檢測計畫",
        sub_title: "健康安全的成長環境",
        sub_content: "塑膠產品使用狀況趨多，學子成長環境隱藏潛在風險，特別是常用的文玩具。我們提供塑化劑檢測服務，為各式塑膠類生活用品進行檢測分析，排除幼兒與兒童成長環境安全憂慮，為下一代健康把關。",
        test_item: "塑化劑：(8種)<br><br><ul style='list-style: initial;margin-left: 20px'><li>DEHP：鄰苯二甲酸二(2-乙基己基)酯</li><li>DNOP：鄰苯二甲酸二正辛酯</li><li>BBP：鄰苯二甲酸丁基苯酯</li><li>DINP：鄰苯二甲酸二異壬酯</li><li>DIDP：鄰苯二甲酸二異癸酯</li><li>DEP：鄰苯二甲酸二乙酯</li><li>DMP：鄰苯二甲酸二甲酯</li><li>DBP：鄰苯二甲酸二丁酯</li>",
        env: "各級學校、補習班、幼兒園、托育中心等孩童活動空間。",
        schedule: "本檢驗方案可以單次或週期性執行，歡迎與我們聯繫討論適合您的方案。",
        talk: [
          {
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          },{
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          }
        ],
        solution_area_slogan: "我們為您制定周全的環境健檢計畫"
      },{
        id: 1,
        title: "校園食材健檢檢測計畫",
        sub_title: "營養美味的安心食材",
        sub_content: "協助每日校園營養午餐食材的農藥殘留檢測服務，加強用餐安全。有效管理不符規定的食材進行監控，以提供學子兼具營養與美味的安心食材",
        test_item: "常見殺蟲劑、殺蹣劑、殺菌劑及除草劑等共計259種農藥檢測。<br>殺蟲劑：谷速松、陶斯松、普伏松、賽滅寧、護賽寧<br>殺蹣劑：必芬松、蟎離丹、大克蟎、芬普寧、得芬瑞...等<br>殺菌劑：比多農、滅普寧、賽福座、亞托敏、達滅芬...等<br>除草劑：拉草、復祿芬、必芬諾、比達寧、伏寄普...等",
        env: "各級學校、幼兒園、托育中心提供營養午餐的中央廚房、團膳供應商或學校合作社。",
        schedule: "本檢驗方案可以單次或週期性執行，歡迎與我們聯繫討論適合您的方案。",
        talk: [
          {
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          },{
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          }
        ],
        solution_area_slogan: "我們為您制定周全的食材健檢計畫"
      },{
        id: 2,
        title: "農場作物自主管理檢測計畫",
        sub_title: "自主管理從源頭做起",
        sub_content: "農產品從田間到通路鋪售過程需要追蹤農藥殘留狀況。我們藉由農藥測項分析，在產銷供應鏈上協助自主農殘檢測管理，可降低風險、保證品質，以確保農產符合法規標準為守護民眾食安問題。",
        test_item: "常見殺蟲劑、殺蹣劑、殺菌劑及除草劑等共計259種農藥檢測。<br>殺蟲劑：谷速松、陶斯松、普伏松、賽滅寧、護賽寧<br>殺蹣劑：必芬松、蟎離丹、大克蟎、芬普寧、得芬瑞...等<br>殺菌劑：比多農、滅普寧、賽福座、亞托敏、達滅芬...等<br>除草劑：拉草、復祿芬、必芬諾、比達寧、伏寄普...等",
        env: "果菜園、茶園等各式農場、蔬果產銷中心、合作社及批發通路",
        schedule: "本檢驗方案可以單次或週期性執行，歡迎與我們聯繫討論適合您的方案。",
        talk: [
          {
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          },{
            title: "針對食物安全研發出的快速質譜儀，重視養生的馬雲大為驚艷，當場表示也想在家裡放一台。",
            name: "-阿里巴巴集團主席 馬雲"
          }
        ],
        solution_area_slogan: "我們為您制定周全的健檢計畫"
      }
    ],
    techs: [
      { id: 0,
        title: "睿軒快篩平台",
        description: "與國立中山大學共同開發「快速檢驗平台」專利技術為基礎，以建構食的安心、用的放心，便利顧客享有快速與安全的保障為出發點，守護民眾的健康期許，營造安心的生活環境。同時創造獨特的檢驗效率，與無可取代的時間效益。",
        sections: [
          {
            title: "五秒高效快篩",
            content: "不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。"
          },
          {
            title: "獨家探針，多樣檢測",
            content: "獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。"
          },
          {
            title: "雲端即時報告",
            content: "同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。"
          }
        ]
      }
    ]
  },
  mutations: {
    increment (state) {
      state.count++;
    },
    setNews(state, news){
      state.news=news;
    },
    setQuestion(state,questions){
      state.questions=questions;
    },
    toggle_size(state){
      state.big_font=!state.big_font;
      console.log("toggle size");
    },
    toggle_search(state){
      state.search=!state.search;
      console.log("toggle search");
    }
  },
  actions: {
    loadWebsite(context){
      $.get("http://www.rapidsuretech.com/api/news").then((res)=>{
        console.log("news loaded (action)");
        context.commit("setNews",res);
      });$.get("http://www.rapidsuretech.com/api/questions").then((res)=>{
        console.log("questions loaded (action)");
        context.commit("setQuestion",res);
      });
    }
  }
})

const app = new Vue({
  el: "#app",
  router,
  store,
  components: {Slick: Slick},
  computed: Vuex.mapState(['news','about_logs','big_font']),
  mounted(){
     store.dispatch("loadWebsite");
  }
});


//---------------------

//數數動畫
var scroll_delay=1000;
var scrolling=false;
var pre_region=null, now_region=null, next_region=null;
var direction='up';
var lock_scroll=true;
var window_width= $(window).outerWidth();
var window_height= $(window).outerHeight();
var scroll = Rx.Observable.fromEvent(document,'scroll')
            .map(e => e.target.scrollingElement.scrollTop);
// scroll.subscribe(obj=>console.log(obj));

//Rx捲軸位置
scroll
  .map(top => top<=0)
  .subscribe((at_top)=>{
    if (at_top) 
      $("nav,.go_to_topbtn").addClass("at_top");
    else 
      $("nav,.go_to_topbtn").removeClass("at_top");
  });

//使用卷軸位置更新元件
window.update_scroll=function update_scroll(top_val){
  $(".bg_parallax").each((index,obj)=>{
    // if ($(obj).offset())
      $(obj).css("background-position","center "+(top_val-$(obj).offset().top)/1.50+"px");
  });
  if ($(".mountain").length>0){
    $(".mountain").css("bottom",(+(-(top_val+window_height*0.85-$("#section_about_log").offset().top)/4))+"px");
  }

  //percet nt init
  $(".percent.initial").each(function(index,obj){
    // console.log("test");
    // update element enter animation
    if ($(obj).offset().top<top_val+window_height*0.9){
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
      if ($(obj).offset().top<top_val+window_height){
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

//頁面還原初始狀態
function init_element(){

  $(".percent , .section_title , .section_para").addClass("initial");
  setTimeout(function(){
    update_scroll(0);
  },50);
 

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
  

  //調整字體大小
  // $(".func_size").click(function(){
  //   var el=$(this);
  //   if (!app.big_font){
  //     app.big_font=true;
  //     $(".question_list").css("font-size","18px");
  //   }else{
  //     app.big_font=false;
  //     $(".question_list").css("font-size");
  //   }
      
  // });
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
  if (lock_scroll && window_height>850){
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


  //router event

router.afterEach((route) => {
  $( window ).ready();
  if (route.path=="/about" || route.path=="/news" || route.path.indexOf("/news/")!=-1){
    $("nav").addClass("bg_white");
  }else{
    $("nav").removeClass("bg_white");
  }
  // //加上初始化
  if (route.path=="/index"){
    setTimeout(()=>{init_element();},1200);
  } 
  
  });
  
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
      url: "http://www.rapidsuretech.com/dropzone/upload.php",maxFiles: 1
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

