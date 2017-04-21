<template lang="jade">
div.section_search
  .navbar-search
    .container.flex.column
      .input_area
        i.fa.fa-search
        input(v-model="filter",v-on:click="show_search=true")
        i.fa.fa-times(v-on:click="hide_search")
      transition(name="fade")
        ul.search_list(v-if="has_match && show_search")
          li(v-for='match in matches' v-if="match.data.length")
            .cata {{match.type}}
            ul.match_list
              li(v-for='d in match.data' ,v-on:click="show_search=false")
                router-link(:to="d.link")
                  .match
                    h5(v-html="d.title")
                    p(v-html="d.content")
          li 總共有 {{has_match}} 項結果

    
</template>

<script>
  import { mapGetter, mapActions , mapState ,mapMutations} from 'vuex'
  export default {
      data() {
        return {
          filter: "",
          show_search: true
        }
      },
      mounted() {
          console.log('section_search mounted.');
      },
      methods: {
        ...mapMutations(['toggle_search']),
        hide_search(){
          this.toggle_search();
        },
        turn_match(obj){
          var vobj=this;
          return obj.map(
                    (obj)=>{
                      obj.content=obj.content.replace(new RegExp("<.*?>","g"),"");
                      
                      return obj;
                    }
                  )
                  .filter((obj)=>(
                    (obj).content.indexOf(vobj.filter)!=-1 && vobj.filter!=""
                  ))
                  .map(
                    (obj)=>{
                      var st=obj.content.indexOf(vobj.filter)-10>=0?(obj.content.indexOf(vobj.filter)-10):0;
                      var ed=obj.content.indexOf(vobj.filter)+30<obj.content.length?(obj.content.indexOf(vobj.filter)+30):obj.content.indexOf(vobj.filter);
                      obj.content=(obj).content.substr(st,ed-st);
                      return obj;
                    }
                  )
                  .map(
                    (obj)=>{
                      var m=obj.content.match(new RegExp(vobj.filter,"i"));
                      if (m[0]){
                        console.log(m);
                        var highlight_content=obj.content.replace(m[0],"<span style='background-color: red;color: white;padding: 2px 5px;'>"+m[0]+"</span>");

                        obj.content=highlight_content+"...";
                      }
                      return obj;
                    }
                  );
        }
      },
      computed: {
        matches (){
          var vobj=this;
          return [{
            type: "新聞",
            data: this.turn_match(this.news
                  .map(
                    (obj)=>(
                      {
                         id: obj.id,
                         title: obj.title,
                         content: obj.title+obj.content,
                         link: "/news/"+obj.id
                      }
                    )
                  ))
                  
          },{
            type: "檢測方案",
            data: this.turn_match(this.solutions
                  .map(
                    (obj)=>(
                      {
                         id: obj.id,
                         title: obj.title,
                         content: obj.title+obj.sub_content+obj.test_item+obj.env+obj.schedule+(obj.talk.map((t)=>(t.title))).join("   "),
                         link: "/solution/"+obj.id
                      }
                    )
                  ))
                  
          },{
            type: "檢驗科技",
            data: this.turn_match(this.techs
                  .map(
                    (obj)=>(
                      {
                         id: obj.id,
                         title: obj.title,
                         content: obj.title+obj.description+(obj.sections.map((t)=>(t.title+t.content))).join("   "),
                         link: "/tech"
                      }
                    )
                  ))
                  
          }];
        },
        has_match(){
          return this.matches.map(obj=>obj.data.length).reduce((a,b)=>(a+b));
        },
        ...Vuex.mapState(['solutions','news','techs'])
      }
  }
</script>

<style scoped lang="sass">
  .navbar-search{
    display: flex;
    flex-direction: column;
    width: 100%;
    z-index: 500;

    .input_area{
      width: 100%;
    }
  }
  .search_list{
    width: 120%;
    padding: 24px;
    background-color: #FFF;
  }
  .search_list li{
    display: flex;
    flex-direction: row;
    padding: 10px 0px;
    transition: 0.5s;

    h5{
      margin-bottom: 10px
    }
    h5+p{
      font-size: 14px;
      opacity: 0.8;
    }
    .cata{
      width: 30%;
    }
    border-bottom: solid 1px #ddd;

    &:last{
      border: none
    }
  }
  .match_list{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    width: 100%;
    li{
      padding: 5px 10px;
      &:hover{
        background-color: rgba(#eee,0.5);
      }
    }
    li,.match{
      width: 100%;
      display: block;

    }
  }
</style>