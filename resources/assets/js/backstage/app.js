
import $ from 'jquery'
import Dropzone from 'dropzone'

require('../bootstrap')
require('tinymce/themes/modern/theme')

import tinymce from 'tinymce'
import 'tinymce/plugins/paste/plugin'
import 'tinymce/plugins/link/plugin'
import 'tinymce/plugins/autoresize/plugin'
import 'tinymce/plugins/advlist/plugin'
import 'tinymce/plugins/lists/plugin'
import 'tinymce/plugins/code/plugin'

import TinyMCE from 'tinymce-vue-2'

import solution_selector from '../components/solution_selector'
import carousel_editor from '../components/carousel_editor'
import default_pic_selector from '../components/default_pic_selector'
import draggable from 'vuedraggable'
import vue_json_editor_block_view from '../components/vue-json-editor-block-view'

Vue.use(vue_json_editor_block_view);
Vue.component('tiny-mce', TinyMCE)
Vue.component('carousel_editor', carousel_editor)
Vue.component('solution_selector', solution_selector)
Vue.component('df_pic_selector', default_pic_selector)
Vue.component('draggable', draggable)
// Vue.component('draggable', draggable)
// vue_json_editor_block_view
console.log(vue_json_editor_block_view)

//---------------------
// 編輯器設定
const mce_settings = {
  toolbar: [ 'undo redo | bullist numlist | link image | print preview media fullpage | forecolor backcolor emoticons | pastetext pasteword | code'],
  toolbar_news: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media fullpage | forecolor backcolor emoticons | pastetext pasteword link image | uploadpic uploadpic_url | code',
  other: {
    plugins: ['paste', 'link', 'autoresize','lists', 'advlist','code'],
    advlist_bullet_styles: "circle"
  }
}


//---------------------
var locale= document.location.host.split(".")[0];
if (["zh","cn","en"].indexOf(locale)==-1){
  locale="zh";
}

// $("table").dataTable()
var vm = new Vue({
  el: "#app", 
  data: {
    solutions: [],
    solution: window.solution,
    now_news: window.now_news,
    yearlog: window.yearlog,
    yearlogs: [],
    questions: [],
    lang: window.lang,
    locale: locale,
    contact_records: [],
    mce_toolbar: mce_settings.toolbar,
    mce_plugin: mce_settings.other,
    now_editing_yearlog_id: -1,
    now_social_id: 0,
    now_job_id: 0,
    now_yearlog: 0,
    now_tech_id: 0,
    now_tech_section_id: 0,
    news: [],
    dragging_id: -1,
    dragging: false
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
      axios.post("/api/websiteinfo/key/"+this.locale,this.lang).then(
        (res)=>{location.reload();}
      )
    },save_yearlog(){
      axios.post('/manage/yearlog/saveall',this.yearlogs).then(
        (res)=>{location.reload();}
      )
    },
    dragstart_question(id){
      this.dragging_id=id;
      console.log(id)
    },
    drop_question(id,arr){
      console.log(arr)
      let temp=arr[id]
      arr[id]=arr[this.dragging_id]
      arr[this.dragging_id]=temp
      this.questions.forEach((o,i)=>o.ordernum=i)
      this.$forceUpdate()

    },
    dragover_question(evt){
      
      // console.log(evt)
    },
    save_question(){
      axios.post("/api/questions",this.questions).then((res)=>{
      })
    }
  },
  mounted(){

    axios.get("/api/solutions").then((res)=>{
      this.solutions=res.data
    })
    axios.get("/api/yearlogs").then((res)=>{
      this.yearlogs=res.data
    })
    axios.get("/api/news").then((res)=>{
      this.news=res.data
    })
    axios.get("/api/websiteinfo/key/"+this.locale).then((res)=>{
      this.lang=res.data
      console.log(this.lang)
    })
    axios.get("/contact_record").then((res)=>{
      this.contact_records=res.data
    })
    axios.get("/api/questions").then((res)=>{
      this.questions=res.data
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
      menubar: false,
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
      toolbar1: mce_settings.toolbar_news,
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
     
     tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+res+'\" style=\"width: 100%;height: auto\"></img>');
  });

  gen_dz(".btn-dropzone-cover",function(evt,res){
     console.log(res);
     
     $("#cover").val(res);
     $(".cover_preview").attr('src',res);
  });

}


