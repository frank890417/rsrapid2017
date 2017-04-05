<template lang="jade">
div.page_post
  #myCarousel.carousel.slide(data-ride='carousel')
    // Indicators
    ol.carousel-indicators
      li.active(data-target='#myCarousel', data-slide-to='0')
      li(data-target='#myCarousel', data-slide-to='1')
      li(data-target='#myCarousel', data-slide-to='2')
      li(data-target='#myCarousel', data-slide-to='3')
    // Wrapper for slides
    .carousel-inner(role='listbox')
      .item.active
        .img(style="background-image: url('http://localhost:7885/img/homepage/Post1.jpg');background-size: cover; height: 700px").bg_parallax
      .item
        .img(style="background-image: url('http://localhost:7885/img/homepage/Post1.jpg');background-size: cover; height: 700px").bg_parallax
    // Left and right controls
    a.left.carousel-control(href='#myCarousel', role='button', data-slide='prev')
      span.glyphicon.glyphicon-chevron-left(aria-hidden='true')
      span.sr-only Previous
    a.right.carousel-control(href='#myCarousel', role='button', data-slide='next')
      span.glyphicon.glyphicon-chevron-right(aria-hidden='true')
      span.sr-only Next

  section.section_post
    .container(v-for='news in newsset')
      .row
        .col-sm-10.col-sm-offset-1.post_box
          h4.tag(v-text='news.tag')
          h1.section_title(v-text='news.title')
          p.date(v-text='news.date')
          p(v-html='news.content')
          h5.share 分享文章
            .logos
              img.logo(alt="fb" src="https://www.facebook.com/images/fb_icon_325x325.png")
              img.logo(alt="tweeter" src="http://idleac.co.uk/wp-content/uploads/2016/02/Social-Media-Icons_Twitter.png")
              img.logo(alt="google+" src="http://www.icons101.com/icon_png/size_512/id_15844/Google.png")

      hr
</template>

<script>
import { mapGetter, mapActions , mapState } from 'vuex'
export default {
    mounted() {
      console.log('post mounted.');
    },
    props: ['id'],
    computed: {
      ...mapState(['news']),
      newsset (){
        return this.news.filter((n)=>(n.id==this.id));
      }
    }
}
</script>