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
        <li> <a href="#">人才招募</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">人才招募
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-primary">
      <div class="panel-heading">人才招募</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th>職位名</th>
            <th>操作</th>
          </thead>
          <tbody>
            <tr v-for="(job,id) in lang.zh.page_job.section_1.jobs">
              <td>@{{job.name}}</td>
              <td>
                <div @click="now_job_id=id" class="btn btn-default">編輯</div>
                <div @click="lang.zh.page_job.section_1.jobs.splice(id,1)" class="btn btn-danger">刪除</div>
              </td>
            </tr>
            <tr>
              <td @click="lang.zh.page_job.section_1.jobs.push({name:'新職缺',short_description:'',content: ''})" style="cursor: pointer;" colspan="2">+ 新增職缺</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">編輯職位中-@{{lang.zh.page_job.section_1.jobs[now_job_id].name}}
        <div @click="save_website_info" class="btn btn-danger">儲存更新</div>
      </div>
      <div v-for="(job,id) in lang.zh.page_job.section_1.jobs" v-if="id==now_job_id" class="panel-body">
        <div class="form-group">
          <label>職位名</label>
          <input v-model="job.name" class="form-control"/>
        </div>
        <div class="form-group">
          <label>簡介</label>
          <tiny-mce :id="'job_short_description'+id" v-model="job.short_description" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
        </div>
        <div class="form-group">
          <label>長內容</label>
          <tiny-mce :id="'job_content'+id" v-model="job.content" :other-props="mce_plugin" :toolbar="mce_toolbar">      </tiny-mce>
        </div><br/>
      </div>
    </div>
  </div>
</div>
@endsection