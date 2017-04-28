<template lang="jade">
div.page_post
  .slick
    section.section_hero(v-if='newsset' v-for='id in 2')
      .bg.bg_parallax(:style="bg_css(newsset.cover)") 
      .container.flex
  
  section.section_post
    .container.flex.column(v-if='newsset')
      .post_box
        h4.tag
          router-link(v-text='newsset.tag' v-bind:to="'/news/cata/'+newsset.tag")
        h1.section_title(v-text='newsset.title')
        p.date(v-text='newsset.date')
        p 文章來源 
          a(v-html='newsset.author' href="#")
        br
        p(v-html='newsset.content')
        h5.share 分享文章
          .logos
            img.logo(alt="fb" src="https://www.facebook.com/images/fb_icon_325x325.png")
            img.logo(alt="tweeter" src="http://idleac.co.uk/wp-content/uploads/2016/02/Social-Media-Icons_Twitter.png")
            img.logo(alt="google+" src="http://www.icons101.com/icon_png/size_512/id_15844/Google.png")
      .container.flex.row.nav_end(v-if="preset || postset")
        .wrap
          router-link.pre(v-if="preset" ,:to="'/news/'+preset.id",:style="bg_css(preset.cover)") 
            h3.guide_text
              span 前一則
              i.fa.fa-angle-left 
            .cover
              h6.date {{preset.date}}
              h3 {{preset.title}}
        .wrap
          router-link.post(v-if="postset",:to="'/news/'+postset.id" ,:style="bg_css(postset.cover)") 
            h3.guide_text
              i.fa.fa-angle-right
              span 後一則
            .cover
              h6.date  {{postset.date}}
              h3  {{postset.title}}

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
      if (Ts) Ts.reload();
    },
    methods: {
      bg_css(url){
        return {'background-image': 'url('+url+')'}
      }
    },
    props: ['id'],
    computed: {
      ...mapState(['news']),
      newsset (){
        var vobj=this;
        return this.news.filter((n)=>(n.id==vobj.id))[0];
      },
      preset(){
        var vobj=this;
        return this.news.filter((n)=>(n.id==(vobj.id-1)))[0];

      },
      postset(){
        var vobj=this;
        return this.news.filter((n)=>(n.id==(parseInt(vobj.id)+1)))[0];
        
      }
    }
}
</script>