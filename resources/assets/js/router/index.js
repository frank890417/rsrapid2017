import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//-------------------------

//components
// Vue.component('slick', Slick);

Vue.component('Navbar', require('../components/Navbar.vue'));

var page_index = Vue.component('page_index', require('../components/page_index.vue'));
var page_about = Vue.component('page_about', require('../components/page_about.vue'));
var page_news = Vue.component('page_news', require('../components/page_news.vue'));
var page_solution = Vue.component('page_solution', require('../components/page_solution.vue'));
var page_tech = Vue.component('page_tech', require('../components/page_tech.vue'));
var page_post = Vue.component('page_post', require('../components/page_post.vue'));
var page_job = Vue.component('page_job', require('../components/page_job.vue'));
var page_contact = Vue.component('page_contact', require('../components/page_contact.vue'));
var page_tern = Vue.component('page_tern', require('../components/page_tern.vue'));

var section_footer = Vue.component('section_footer', require('../components/section_footer.vue'));
var section_solutions = Vue.component('section_solutions', require('../components/section_solutions.vue'));
var section_search = Vue.component('section_search', require('../components/section_search.vue'));

//routes

const routes = [
  { path: '/', component: page_index , meta: {title: "首頁"}},
  { path: '/about', component: page_about , meta: {title: "關於睿軒"}},
  { path: '/tech/:id', component: page_tech , props: true, meta: {title: "檢驗科技"}},
  { path: '/tech/n/:title', component: page_tech , props: true, meta: {title: "檢驗科技"}},
  { path: '/solution/n/:title', component: page_solution, props: true, meta: {title: "檢測方案"}},
  { path: '/solution/:id', component: page_solution , props: true, meta: {title: "檢測方案"}},
  { path: '/solution/1', alias: '/solution', meta: {title: "檢測方案"}},
  { path: '/news', component: page_news , meta: {title: "最新消息"}},
  { path: '/news/:id', component: page_post , props: true, meta: {title: "最新消息"}},
  { path: '/news/cata/:cataname', component: page_news , props: true, meta: {title: "最新消息"}},
  { path: '/job', component: page_job , meta: {title: "人才招募"}},
  { path: '/contact', component: page_contact , meta: {title: "聯絡我們"}},
  { path: '/contact/:selected', component: page_contact , props: true, meta: {title: "聯絡我們"}},
  { path: '/tern', component: page_tern , meta: {title: "各項聲明"}},
  { path: '/search', component: section_search , meta: {title: "搜尋"}},
  { path: '*', component: page_index ,meta: {title: "首頁"}}
];

const router = new VueRouter({
  routes,
  mode: "history"
})
window.router=router

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
  document.title = to.meta.title+" - 睿軒檢驗科技";
  if (window.ga){
    ga('send', 'pageview');
  }
  if (window.store){
    window.store.commit("set_scrollTop",-1);
  }
  next();
});

  //router event

router.afterEach((route) => {
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




export default router
