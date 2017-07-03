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
        <li> <a href="#">詢問紀錄管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">詢問紀錄管理
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang.zh" class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">詢問紀錄</div>
      <div class="panel-body">
        <table class="table table-primary">
          <thead>
            <th>編號 </th>
            <th>名字 </th>
            <th>信箱</th>
            <th>時間</th>
            <th>事項</th>
            <th style="width: 50%">內容</th>
          </thead>
          <tbody>
            <tr v-for="(cr,id) in contact_records">
              <td>@{{id+1}}</td>
              <td>@{{cr.name}}</td>
              <td>@{{cr.email}}</td>
              <td>@{{cr.created_at}}</td>
              <td>@{{cr.ask_item?cr.ask_item.title:"其他"}}</td>
              <td>@{{cr.content}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection