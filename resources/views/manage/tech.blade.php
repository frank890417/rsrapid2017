@extends('layouts.app_manage')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
            <svg class="glyph stroked home">
              <use xlink:href="#stroked-home"></use>
            </svg></a></li>
        <li> <a href="#">檢驗科技管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">檢驗科技管理
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang" class="row">
  <div class="col-lg-4">
    <div class="panel panel-primary">
      <div class="panel-heading">檢驗科技管理</div>
      <div class="panel-body">
        <table class="table table-primary">
          <thead>
            <th>編號</th>
            <th>標題</th>
            <th>區塊</th>
            <th>操作</th>
          </thead>
          <tbody>
            <tr v-for="(tech_item,id) in lang.page_tech.techs">
              <td>@{{id+1}}</td>
              <td>@{{tech_item.title}}</td>
              <td><span v-for="(sec,sid) in tech_item.sections">
                  <p>@{{sid+1}} @{{sec.title}} </p></span></td>
              <td> 
                <button @click="now_tech_id=id" class="btn">編輯</button>
                <button @click="lang.page_tech.techs.splice(id,1)" class="btn btn-danger">刪除</button>
              </td>
            </tr>
          </tbody>
        </table>
        <!--          
          pre(v-html="lang.page_tech.techs[0]")
              
        --><br/>
        <div @click="addNewTech" class="btn btn-primary">新增科技</div><br/>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div v-for="(tech_item,id) in lang.page_tech.techs" v-show="id==now_tech_id" class="panel panel-default">
      <div class="panel-heading">資料編輯-@{{id+1}} @{{tech_item.title}}</div>
      <div class="panel-body">
        <div class="form-group">
          <h4>標題</h4>
          <input v-model="tech_item.title" class="form-control"/>
        </div>
        <div class="form-group">
          <h4>描述</h4>
          <tiny-mce :id="'tech_'+id+'_content'" v-model="tech_item.description" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
        </div>
        <solution_selector :part="tech_item"></solution_selector>
        <ul class="nav nav-tabs">
          <li v-for="(section,section_id) in tech_item.sections" @click="now_tech_section_id = section_id" :class="{active: now_tech_section_id == section_id}" class="nav-item"> <a :class="{active: now_tech_section_id == section_id}" style="cursor: pointer" class="nav-link">@{{section_id+1}} @{{section.title}}<i @click="tech_item.sections.splice(section_id,1)" style="margin-left: 10px" class="fa fa-trash"> </i></a></li>
          <li><a @click="tech_item.sections.push({});now_tech_section_id=tech_item.sections.length-1"> 新增區塊<i class="fa fa-plus"></i></a></li>
        </ul>
        <div v-for="(section,section_id) in tech_item.sections" v-show="section_id==now_tech_section_id" class="form-group">
          <div class="form-group">
            <hr/>
            <h4>標題</h4>
            <input v-model="section.title" class="form-control"/>
            <h4>內容</h4>
            <tiny-mce :id="'tech_'+id+'_section_'+section_id+'_content'" v-model="section.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
            <h4>圖片</h4>
            <carousel_editor :carousel_data.sync="section.slides"></carousel_editor>
          </div>
        </div>
      </div>
    </div>
    <div @click="save_website_info" class="btn btn-danger">儲存更新</div>
  </div>
</div>
@endsection