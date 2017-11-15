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
        <li> <a href="#">雜項管理{{$lang}}</a></li>
      </ol>
    </div>
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">雜項管理{{$lang}}
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang" class="row detail_info_editor">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">頁面內容管理</div>
      <div v-for="(part,key) in lang" class="panel-body">
        <h3>@{{key}}</h3>
        <v-json-editor :data="part" :editable="true" @change="$forceUpdate()"></v-json-editor>
      </div>
    </div>
  </div>
</div>
@endsection