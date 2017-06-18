import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

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
      $.get("/api/yearlogs").then((res)=>{
        console.log("yearlogs loaded (action)");
        context.commit("setYearlogs",res);
      });
      $.get("/api/news").then((res)=>{
        console.log("news loaded (action)");
        context.commit("setNews",res);
      });
      $.get("/api/questions").then((res)=>{
        console.log("questions loaded (action)");
        context.commit("setQuestion",res);
      });
      $.get("/api/solutions").then((res)=>{
        console.log("solutions loaded (action)");
        console.log(res);
        res.forEach(obj=>{ obj.talk=JSON.parse(obj.talk.trim().replace("\n","")) });
        context.commit("setSolution",res);
      });
    }
  }
})