<template lang="jade">
div.page_post
  .slick(v-if="newsset")
    section.section_hero( v-for='curl in carousel_set')
      .bg.bg_parallax.no_attach(:style="bg_css(curl)") 
      .container.flex
  
  section.section_post
    .container.flex.column(v-if='newsset')
      .post_box
        h4.tag
          router-link(v-text='newsset.tag' v-bind:to="'/news/cata/'+newsset.tag")
        h1.section_title(v-text='newsset.title')
        p.date(v-text='newsset.date')
        p {{$t("page_post.label_source")}} 
          a(v-html='newsset.author' ,v-if="newsset.author_link" ,:href="newsset.author_link", target="_blank")
          a(v-html='newsset.author' ,v-else)
        br
        p(v-html='newsset.content')
        h5.share {{$t("page_post.label_share")}}
          .logos
            a(:href="get_share_url('fb')",target="_blank")
              img.logo(alt="fb" src="https://www.facebook.com/images/fb_icon_325x325.png")
            a(:href="get_share_url('tweeter')",target="_blank")
              img.logo(alt="tweeter" src="http://idleac.co.uk/wp-content/uploads/2016/02/Social-Media-Icons_Twitter.png")
            a(:href="get_share_url('gplus')",target="_blank")
              img.logo(alt="google+" src="http://www.icons101.com/icon_png/size_512/id_15844/Google.png")
      .container.flex.row.nav_end(v-if="preset || postset")
        .wrap
          router-link.pre(v-if="preset" ,:to="'/news/'+preset.id",:style="bg_css(preset.cover)") 
            h3.guide_text
              span {{$t("page_post.label_pre")}}
              i.fa.fa-angle-left 
            .cover
              h6.date {{preset.date}}
              h3 {{preset.title}}
        .wrap
          router-link.post(v-if="postset",:to="'/news/'+postset.id" ,:style="bg_css(postset.cover)") 
            h3.guide_text
              i.fa.fa-angle-right
              span {{$t("page_post.label_post")}}
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
      // if (Ts) Ts.reload();
    },
    methods: {
      bg_css(url){
        return {'background-image': 'url('+(url+"").trim().replace(' ','%20')+')'}
      },
      get_share_url(platform){
        if (platform=="fb")
          return 'https://www.facebook.com/sharer/sharer.php?u='+window.location.href;
        if (platform=="gplus")
          return 'https://plus.google.com/share?url='+window.location.href;
        if (platform=="tweeter")
          return "https://twitter.com/intent/tweet?url="+window.location.href;
      },
    },
    props: ['id'],
    computed: {
      ...mapState(['news']),
      newsset (){
        var vobj=this;
        return this.news.find((n)=>(n.id==vobj.id));
      },
      preset(){
        let tempset = this.news.filter((n)=>n.tag==this.newsset.tag).sort(o=>o.date);
        let now_set_index = tempset.indexOf(tempset.find((n)=>n.id==this.id));
        let target_id = now_set_index-1
        return tempset[target_id]

      },
      postset(){
        let tempset = this.news.filter((n)=>n.tag==this.newsset.tag).sort(o=>o.date);
        let now_set_index = tempset.indexOf(tempset.find((n)=>n.id==this.id));
        let target_id = now_set_index+1
        return tempset[target_id]
        
      },
      carousel_set(){
        let newsset=this.newsset;
        if (newsset){
          if (newsset.carousel){
            var carousel_json = JSON.parse(newsset.carousel);
            if(carousel_json.length==0){
              return [newsset.cover]
            }else{
              return [newsset.cover].concat(carousel_json)
            }
          }
          
        }
        return [newsset.cover]
        
      }
    }
}
</script>