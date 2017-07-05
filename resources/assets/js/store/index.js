import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

function decode_shortcode(value){
  if (typeof value=="string"){
    let result = value
    // console.log(key + " : "+value);
    var res = (/\[([\s\S]*?)\-\&gt\;([\s\S]*?)\]/g).test(value) ;
    if (res){
      result=value.replace(/\[([\s\S]*?)\-\&gt\;([\s\S]*?)\]/g,"<div style='text-align: center'><a href='javascript:;' class='btn btn-primary' onclick='event.preventDefault();router.replace(\"$2\");return false;'>$1</a></div>")
      console.warn(result);
      console.log(value)
    }
    var res = (/\[([\s\S]*?)\-\>\;([\s\S]*?)\]/g).test(value) ;
    if (res){
      result=value.replace(/\[([\s\S]*?)\-\>\;([\s\S]*?)\]/g,"<div style='text-align: center'><a href='javascript:;' class='btn btn-primary' onclick='event.preventDefault();router.replace(\"$2\");return false;'>$1</a></div>")
      console.warn(result);
      console.log(value)
    }
    return result
  }
  return value
}
function process(key,value,parent) {
  if (typeof value=="string"){
    console.log(key + " : "+value);
    parent[key] = decode_shortcode(value);
  }
}
function traverse(o,func) {
    for (var i in o) {
        func.apply(this,[i,o[i],o]);  
        if (o[i] !== null && typeof(o[i])=="object") {
            //going one step down in the object tree!!
            traverse(o[i],func);
        }
    }
}

export default new Vuex.Store({
  state: {
    news: [],
    questions: [],
    big_font: false,
    search: false,
    scrollTop: 0,
    is_ie: false,
    about_logs: [],
    solutions: [],
    techs: [
      { id: 1,
        title: "睿軒快篩平台",
        description: "與國立中山大學共同開發「快速檢驗平台」專利技術為基礎，以建構食的安心、用的放心，便利顧客享有快速與安全的保障為出發點，守護民眾的健康期許，營造安心的生活環境。同時創造獨特的檢驗效率，與無可取代的時間效益。",
        sections: [
          {
            title: "五秒高效快篩",
            content: "不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。",
            slides: ["/img/homepage/Tech2.jpg","/img/homepage/Home1.jpg"]
          },
          {
            title: "獨家探針，多樣檢測",
            content: "獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。",
            slides: ["/img/homepage/Tech2.jpg","/img/homepage/Home1.jpg"],
          },
          {
            title: "雲端即時報告",
            content: "同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。",
            slides: ["/img/homepage/Tech3.jpg"]
          }
        ]
      },
      { id: 2,
        title: "技術研發",
        description: "我們專注研發...",
        sections: [
          {
            title: "採樣探針開發",
            content: "樣品採集工具是檢測過程中相當重要的一環。針對快檢平台採樣探針的特殊需求，研發方便使用、易於攜帶及零污染的快速採樣探針。",
            slides: ["/img/tech/1.jpg"]
          },
          {
            title: "自動化平台開發",
            content: "自動化平台整合樣品收集、進樣、檢測、分析至最後報告產出一系列流程，對於大量樣品快速篩檢，可確實管控每個樣品檢測條件及報告。",
            slides: ["/img/tech/2.jpg"]
          },
          {
            title: "檢測項目研發",
            content: "應用於蔬果及其他農作物上之農藥殘留檢測、兒童玩具、文具及其他日用品上塑化劑分析、未來將持續針對食用油品種類分辨、食品或日用品中防腐劑檢測等更多快檢測項逐一展開，服務民眾所需。",
            slides: ["/img/tech/3.jpg"]
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
    setSolution(state,solutions){
      state.solutions = solutions;
    },
    setYearlogs(state,yearlogs){
      state.about_logs = yearlogs;
    },
    toggle_size(state){
      state.big_font=!state.big_font;
      console.log("toggle size");
    },
    toggle_search(state){
      state.search=!state.search;
      console.log("toggle search");
    },
    set_scrollTop(state,value){
      state.scrollTop=value;
    },
    set_is_ie(state,value){
      state.is_ie=value;
    }
  },
  actions: {
    loadWebsite(context){
      axios.get("/api/yearlogs").then((res)=>{
        console.log("yearlogs loaded (action)");
        context.commit("setYearlogs",res.data);
      });
      axios.get("/api/news").then((res)=>{
        console.log("news loaded (action)");
        context.commit("setNews",res.data);
      });
      axios.get("/api/questions").then((res)=>{
        console.log("questions loaded (action)");
        context.commit("setQuestion",res.data);
      });
      axios.get("/api/solutions").then((res)=>{
        console.log("solutions loaded (action)");
        console.log(res.data);
        res.data.forEach(obj=>{ obj.talk=JSON.parse(obj.talk.trim().replace("\n","")) });
        traverse(res.data,process);
        context.commit("setSolution", res.data );
      });
    }
  }
})