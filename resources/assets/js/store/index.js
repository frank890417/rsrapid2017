import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

function decode_shortcode(value){
  if (typeof value=="string"){
    let result = value
    let regex= /\[([\s\S]*)\-\&gt\;([\s\S]*)\]/g;
    var res = (regex).test(value) ;
    const BTN_TEMPLATE = "<div style='text-align: center'><a href='javascript:;' class='btn btn-primary' onclick='event.preventDefault();router.push(\"$2\");return false;'>$1</a></div>"
    
    if (res){
      result=value.replace(regex,BUN_TEMPLATE)
    }
    regex= /\[([\s\S]*)\-\>([\s\S]*)\]/g;
    res = (regex).test(value) ;
    if (res){
      result=value.replace(regex,BUN_TEMPLATE)
    }
    return result
  }
  return value
}
window.decode_shortcode=decode_shortcode;
//called with every property and its value
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
    techs: []
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
        res.data.forEach(obj=>{
         if (obj.talk){
           obj.talk=JSON.parse(obj.talk.trim().replace("\n",""))
         }else{
           obj.talk=[];
         }
        });
        traverse(res.data,process);
        context.commit("setSolution", res.data );
      });
    }
  }
})