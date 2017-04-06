<template lang="jade">
nav.navbar.navbar-default.navbar-fixed-top.at_top
  .container
    .row
      .navbar-header.col-sm-3
        // Collapsed Hamburger
        button.navbar-toggle.collapsed(type='button', data-toggle='collapse', data-target='#app-navbar-collapse')
          span.sr-only Toggle Navigation
          span.icon-bar
          span.icon-bar
          span.icon-bar
        // Branding Image
        router-link.navbar-brand(to="/")
          img.logo(src="img/Rapid.png")

      #app-navbar-collapse.collapse.navbar-collapse

        // Left Side Of Navbar
        ul.nav.navbar-nav.navbar-left.text-left
          // Authentication Links
          li
            router-link(to="/about") 關於睿軒
          li
            router-link(to="/tech") 檢驗科技
          li
            router-link(to="/solution") 檢測方案
          li
            router-link(to="/news") 最新消息
          li
            router-link(to="/index") 會員服務

        ul.nav.navbar-nav.navbar-right
          li.dropdown.lang_dropdown
            a.dropdown-toggle(href="#" data-toggle="dropdown" role="button" aria-expanded="false")
              span 繁
              i.fa.fa-angle-down 
              
            ul.dropdown-menu(role="menu")
              li
                a(href="#") 繁
              li
                a(href="#") 简
              li
                a(href="#") EN
            

          li 
            i.fa.fa-search
          li
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
