
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import Vue from 'vue'
// window.Vue=Vue
import $ from 'jquery'
import Dropzone from 'dropzone'
// import axios from 'axios'
// require("datatables")
require('../bootstrap')
require('tinymce/themes/modern/theme')


import tinymce from 'tinymce'
import 'tinymce/plugins/paste/plugin'
import 'tinymce/plugins/link/plugin'
import 'tinymce/plugins/autoresize/plugin'
import 'tinymce/plugins/advlist/plugin'
import 'tinymce/plugins/lists/plugin'

import TinyMCE from 'tinymce-vue-2'

Vue.component('tiny-mce', TinyMCE)
// Vue.component('vue_lazy_table',vue_lazy_table)

// import VueTinymce from 'vue-tinymce'
// Vue.use(VueTinymce)
// import store from './store'
// import router from './router'
// import {mapState} from 'vuex'
// import {TweenMax} from "gsap"
// import ScrollToPlugin from "gsap/ScrollToPlugin"
// import Rx from 'rxjs'

//---------------------

// $("table").dataTable()
var vm = new Vue({
  el: "#app", 
  data: {
    solutions: window.solutions,
    yearlogs: [],
    lang: {},
    mce_toolbar: [ 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | pastetext pasteword'],
    mce_plugin: {plugins: ['paste', 'link', 'autoresize','lists', 'advlist'],
    advlist_bullet_styles: "circle"},
    now_editing_yearlog_id: -1,
    now_social_id: 0,
    now_job_id: 0,
    now_yearlog: 0,
    news: []
  },
  methods:{
    delete_yearlog(yid){
      if(confirm('你確定要刪除新聞嗎？')){
        // document.getElementById('delete_solution_'+yid).submit();
        axios.post('/manage/yearlog/'+yid,{"_method": "delete"}).then((res)=>{
          this.yearlogs=res.data
        });
      }
    },save_website_info(){
      axios.post("/api/websiteinfo/key/zh",this.lang.zh).then(
        (res)=>{location.reload();}
      )
    },save_yearlog(){
      axios.post('/manage/yearlog/saveall',this.yearlogs).then(
        (res)=>{location.reload();}
      )
    }
  },
  mounted(){
    axios.get("/api/yearlogs").then((res)=>{
      this.yearlogs=res.data
    })
    axios.get("/api/news").then((res)=>{
      this.news=res.data
    })
    axios.get("/api/websiteinfo/key/zh").then((res)=>{
      this.lang={
        zh: res.data
      }
      console.log(this.lang)
    })
  }
})
window.vm=vm

//nav

// $("[data-link]").each((id,obj)=>{
//   console.log($(obj).attr("data-link"))
//   console.log(document.URL.split("/").slice(-1)[0])
//   if ($(obj).attr("data-link")==document.URL.split("/").slice(-1)[0]){ 

//     $(obj).addClass("active")
//   }
// });


//tinymce

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
      toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | pastetext pasteword link image | uploadpic | uploadpic_url',
      plugins : vm.mce_plugin.plugins,
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
    var myDropzone = new Dropzone(classname, {
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


