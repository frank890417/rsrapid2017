<template lang="jade">
div.page_post
  .slick
    section.section_hero(v-if='newsset' v-for='id in 2')
      .bg.bg_parallax(:style="'background-image:url('+newsset.cover+')'+';background-size: cover; height: 600px;'") 
      .container.flex
  
  section.section_post
    .container.flex.column(v-if='newsset')
      .post_box
        h4.tag
          router-link(v-text='newsset.tag' v-bind:to="'/news/cata/'+newsset.tag")
        h1.section_title(v-text='newsset.title')
        p.date(v-text='newsset.date')
        p(v-html='newsset.content')
        h5.share 分享文章
          .logos
            img.logo(alt="fb" src="https://www.facebook.com/images/fb_icon_325x325.png")
            img.logo(alt="tweeter" src="http://idleac.co.uk/wp-content/uploads/2016/02/Social-Media-Icons_Twitter.png")
            img.logo(alt="google+" src="http://www.icons101.com/icon_png/size_512/id_15844/Google.png")
      .container.flex.row.nav_end
        .pre
          h3
        .post
          h3

      hr
</template>

<script>
import { mapGetter, mapActions , mapState } from 'vuex'
export default {
    mounted() {
      console.log('post mounted.');
      var vobj=this;
      var loader = setInterval(function(){
        if (vobj.newsset){
          $('.slick').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            easing: 'ease-in',
            prevArrow: '<i class="fa fa-angle-left"></i> ',
            nextArrow: '<i class="fa fa-angle-right"></i> '
          });
          clearInterval(loader);
          console.log("news_slick_loaded");
        }
      },100);
    },
    props: ['id'],
    computed: {
      ...mapState(['news']),
      newsset (){
        return this.news.filter((n)=>(n.id==this.id))[0];
      }
    }
}
</script>