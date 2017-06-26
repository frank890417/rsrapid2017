<template lang="jade">
div.page_tern
  section.section_hero.bg_parallax_about.flex.column
    .container.grid_sz_mx_8_7
      h1.section_title {{$t("page_tern.section_1.title")}}
      hr
      div(v-html="$t('page_tern.section_1.content')")
      
      
</template>

<script>
  import { mapGetter, mapActions , mapState } from 'vuex'
  export default {
      data() {return {
        sel_year: "year_2016"
      }},
      mounted() {
          console.log('about mounted.')
          // if (Ts) Ts.reload();
      },
      computed: mapState(['about_logs'])

  }
</script>