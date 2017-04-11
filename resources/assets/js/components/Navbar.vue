<template lang="jade">
nav.navbar.at_top
  .container
    .row
      .navbar-header.col-sm-3
        // Collapsed Hamburger

        // Branding Image
        router-link.navbar-brand(to="/")
          img.logo(src="/img/Rapid.png")

      // Left Side Of Navbar
      ul.navbar-nav.navbar-left.text-left
        // Authentication Links
        li
          router-link(to="/about") 關於睿軒
          ul.subnav
            li 
              router-link(to="/about#section_about_from") 睿軒源起
            li 
              router-link(to="/about#section_about_log") 睿軒大事紀
        li
          router-link(to="/tech") 檢驗科技
          ul.subnav
            li 
              router-link(to="/solution/1") 快檢平台
        li
          router-link(to="/solution") 檢測方案
          ul.subnav
            li 
              router-link(to="/solution/0") 校園環境健檢
            li 
              router-link(to="/solution/1") 校園食材健檢
            li 
              router-link(to="/solution/2") 農場作物自主管理
        li
          router-link(to="/news") 最新消息
          ul.subnav
            li 
              router-link(to="/news/1") 睿軒活動
            li 
              router-link(to="/news/2") 新聞快訊
            li 
              router-link(to="/news/3") 食安新知
        li
          a(href="#") 會員服務

      ul.nav.navbar-nav.navbar-right
        li.function
          router-link(to="/news") 
            span 繁
            i.fa.fa-angle-down 
          ul.subnav
            li 
              router-link(to="#") 繁
            li 
              router-link(to="#") 简
            li 
              router-link(to="#") EN


        li.function
          i.fa.fa-search
        li.function
          .icon_text_size.bigger 
            .text A
              span.plus +

        li.nav_open 
          i.fa.fa-bars
</template>

<script>
    export default {
        mounted() {
            console.log('navbar mounted.')
        }
    }
</script>
