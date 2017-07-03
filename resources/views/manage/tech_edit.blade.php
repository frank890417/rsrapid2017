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
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">檢驗科技管理</div>
      <div class="panel-body">
        <div v-for="(tech_item,id) in lang.zh.page_tech.techs">
          <div class="col-sm-4">
            <div class="form-group">
              <h4>標題</h4>
              <input v-model="tech_item.title" class="form-control"/>
            </div>
            <div class="form-group">
              <h4>描述</h4>
              <tiny-mce :id="'tech_'+id+'_content'" v-model="tech_item.description" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <div v-for="(section,section_id) in tech_item.sections" class="form-group">
                <h4>@{{section_id+1}}.區塊標題</h4>
                <input v-model="section.title" class="form-control"/>
                <h4>區塊內容</h4>
                <tiny-mce :id="'tech_'+id+'_section_'+section_id+'_content'" v-model="section.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
                <h4>區塊圖片</h4>
                <carousel_editor :carousel_data="section.slides"></carousel_editor>
              </div>
            </div>
          </div>
        </div><br/><a href="{{ url('manage/news/create') }}" class="btn btn-primary">新增科技</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection