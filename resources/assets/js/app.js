
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueI18n from 'vue-i18n'
import custom_i18n from './i18n'
import $ from 'jquery'
import store from './store'
import router from './router'
import { mapState } from 'vuex'
import { TweenMax } from 'gsap'
import ScrollToPlugin from 'gsap/ScrollToPlugin'
import Rx from 'rxjs/Rx'


require('./bootstrap')

// detect ie
function is_ie() {
  const result = (navigator.appName == 'Microsoft Internet Explorer' || !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== 'undefined' && $.browser.msie == 1));

  return !!result;
}


// init vue
const app = new Vue({
  el: '#app',
  router,
  store,
  i18n: custom_i18n.i18n,
  computed: mapState(['news', 'about_logs', 'big_font']),
  created() {
    if (is_ie()) {
      console.warn('IE Detected', 'Please dont use IE.');
    } else {
      console.warn('IE not Detected', 'Well Choice.');
    }
    store.commit('set_is_ie', is_ie());
    store.dispatch('loadWebsite');
    window.onscroll = (evt) => {
      store.commit('set_scrollTop', window.scrollY);
      if (window.update_scroll) { window.update_scroll(window.scrollY); }
        // window.update_scroll()
        // alert("update scroll")
    };
  },
});

// assighn store as public variables
window.store = store;

// google analysis
if (document.domain == 'www.rapidsuretech.com') {
  (function (i, s, o, g, r, a, m) {
    i.GoogleAnalyticsObject = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments);
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
  m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m);
  }(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'));

  ga('create', 'UA-52977512-18', 'auto');
  ga('send', 'pageview');
  window.ga = ga;
  console.log('enable ga');
} else {
  console.log('disable ga');
}


//---------------------
if (is_ie()) {
  // smooth scroll
  $(() => {
    const $window = $(window);
    const scrollTime = 1;
    const scrollDistance = 120;

    $window.on('mousewheel DOMMouseScroll', (event) => {
      event.preventDefault();

      const delta = event.originalEvent.wheelDelta / 150 || -event.originalEvent.detail / 3;
      const scrollTop = $window.scrollTop();
      const finalScroll = scrollTop - parseInt(delta * scrollDistance);

      TweenMax.to($window, scrollTime, {
        scrollTo: { y: finalScroll, autoKill: true },
        ease: Power2.easeOut,
        overwrite: 5,
      });
      // console.log(finalScroll);
    });
  });

  // bind update scroll event
  // window.onscroll=window.update_scroll()
}


// 數數動畫
const scroll_delay = 1000;
let scrolling = false;
let preRegion = null,
  nowRegion = null,
  nextRegion = null;
let direction = 'up';
const lockScroll = true;
const windowWidth = $(window).outerWidth();
const windowHeight = $(window).outerHeight();
// var scroll = Rx.Observable.fromEvent(document ,'scroll')
//             .map(e => e.target.scrollingElement.scrollTop);
// scroll.subscribe(obj=>console.log(obj));

// 使用卷軸位置更新元件
window.update_scroll = function update_scroll(topVal) {
  console.time('scroll_event');

  // update right side bullet
  updateBullet(topVal);

  // update parallax backgrounds
  const bg_px = Array.from(document.getElementsByClassName('bg_parallax'));
  if (bg_px.length) {
    bg_px.forEach((obj, index) => {
      const $obj = $(obj);
      if (!obj.classList.contains('no_attach')) {
        if ($obj.offset().top + $obj.outerHeight() > topVal) { $obj.css('background-position', `center ${-(topVal - $obj.offset().top) / 15}px`); }
      } else if ($obj.offset().top + $obj.outerHeight() > topVal) {
        $obj.css('background-position', `center ${(topVal - $obj.offset().top) / 1.6}px`);
      }
    });
  }

  // Parallax of mountain
  const mountain_el = document.getElementsByClassName('mountain');
  if (mountain_el.length) {
    const of_t = document.getElementById('section_about_log').offsetTop;
    const mobile_fix = (windowWidth < 800) ? 100 : 0;
    const mul = (windowWidth < 800) ? 3 : 3;
    let mountain_pan = (+(-((topVal) + windowHeight * 0.9 - of_t) / mul)) + mobile_fix;
    // console.log(mountain_pan);
    mountain_pan = mountain_pan > 50 ? 50 : mountain_pan;
    $('.mountain').css('bottom', `${mountain_pan}px`);
  }

  // Parallax of precentage
  const percentEl = Array.from(document.querySelectorAll('.percent.initial'));
  if (percentEl.length) {
    // percet nt init
    percentEl.forEach((obj, index) => {
      // update element enter animation
      if (obj.offsetTop < topVal + windowHeight * 0.9) {
        obj.classList.remove('initial');

        const ed_val = 1.0 * obj.getAttribute('data-target');
        let nowval = 0;
        let timer = setInterval(() => {
          $(obj).children('span').html(Math.round(nowval));
          if (nowval >= ed_val - 0.2) {
            clearInterval(timer);
          } else {
            nowval += (ed_val - nowval) * 0.05;
          }
        }, 30);
      }
    });
  }

  // update section content fadeIn
  const page_initial_el = document.querySelectorAll('.section_title.initial,.section_para.initial');
  Array.from(page_initial_el).forEach((obj, index) => {
    if ($(obj).offset().top < topVal + windowHeight) {
      $(obj).removeClass('initial');
    }
  });


  if (place_sub_nav) place_sub_nav();
  console.timeEnd('scroll_event');
};

// subscribe parallax top
// scroll.subscribe(topVal=>update_scroll(topVal));

// upadte bullet nav points
function updateBullet(st) {
  nowRegion = null;
  nextRegion = null;
  let last = null;
  // 偵測在哪個區域
  const bulletEl = Array.from(document.querySelectorAll('.slide_bullet li'));
  if (bulletEl.length) {
    bulletEl.forEach((bullet_obj, index) => {
      const dataLink = bullet_obj.getAttribute('data-link');
      const $link_obj = $(dataLink);
      const tar_h = $link_obj.height();

      if ($link_obj.offset()) {
        if ($link_obj.offset().top <= st + tar_h / 2 &&
          $link_obj.offset().top >= st - windowHeight / 2) {
          bullet_obj.classList.add('active');

          nowRegion = dataLink;
          preRegion = last;
          // console.log(nowRegion,preRegion);
        } else {
          bullet_obj.classList.remove('active');
          if (nowRegion && !nextRegion) {
            nextRegion = dataLink;
          }
        }
        last = dataLink;
      }
    });
  }
}

// 頁面還原初始狀態
function init_element() {
  if (!is_ie()) {
    $('.percent , .section_title , .section_para').addClass('initial');
    setTimeout(() => {
      update_scroll(0);
    }, 50);
  }
}


// 載入執行
$(window).ready(() => {
  //
  if (location.href.indexOf('#') != -1) {
    $('#select_contact').val(location.href.split('#')[1]);
  }
  // //加上初始化
  init_element();
  // initial bg parallax


  // });
  // 回到最上面按鈕
  $('.go_to_topbtn').click(() => {
    $('html, body').animate({ scrollTop: 0 }, 'slow');
  });

  // wheelDelta
  const mousewheel = Rx.Observable.fromEvent(document, 'mousewheel')
                                .map(e => e.wheelDelta);

// console.log(mousewheel)

  updateBullet(0);
  // snap locker by Rxjs


  if (lockScroll && windowHeight > 850 && windowWidth > 1200 && !is_ie()) {
    console.log('enable snap');
    // filter delta which bigger than thereshold and filter out twice down/up condition
    const sourcePageNav = mousewheel.filter(
      delta => ((delta > 50 && (direction == 'down' || !scrolling))
           || (delta <= -50 && !scrolling && (direction == 'up' || !scrolling)))
    )
    .map(delta => (delta > 0 ? 'up' : 'down'))                // map delta to up or down
    .throttleTime(500);                               // filter event by 200ms time span


    sourcePageNav.subscribe((direct) => {             // subscribe the event
      if (router.history.current.fullPath === '/') {
        console.log(direct);
        direction = direct;
        let targetBlock = (direct == 'up') ? preRegion : nextRegion;

        if ($(document).scrollTop() + $(window).height() >= $(document).height() - 20) targetBlock = '.section_solution';
        console.log(`target:${targetBlock}`);
        if (targetBlock) { $('html, body').animate({ scrollTop: $(targetBlock).offset().top }, 'slow'); }
      }
    });
    // cancel the scrolling boolean after scroll
    sourcePageNav.delay(500).subscribe(() => {
      scrolling = false;
    });

    $(window).bind('mousewheel', (event) => {
      if (router.history.current.fullPath == '/' && windowHeight > 850) {
        event.preventDefault();
      }
    });
  }
});
