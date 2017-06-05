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
  { path: '/contact/:selected', component: page_contact , props: true},
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

export default router
