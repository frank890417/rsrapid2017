<template lang="jade">
div.page_job
  section.section_hero.bg_theme.bg_parallax
    .container.flex.column
      h1(v-text="$t('page_job.section_1.title')")
      p.description(v-html="$t('page_job.section_1.content')")

  section.section_job

    .container.flex.row.wrap.top_out
      .job_box.flex_lg_12(v-for="job in $t('page_job.section_1.jobs')")
        .job_box_inner
          h4.title {{job.name}}
            i.fa.fa-link
          p(v-html="job.short_description")
          .cover.flex.column 
            p(v-html="job.content")
            a.btn.btn-transparent(v-if="job.link",:href="job.link") 更多資訊
      
      .row
        .col-sm-12
         
      hr


</template>

<script>
    import { mapGetter, mapActions , mapState } from 'vuex'
    export default {
        mounted() {
            console.log('jobs')
        },
    }
</script>