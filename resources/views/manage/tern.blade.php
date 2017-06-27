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
        <li> <a href="#">各項聲明</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">各項聲明
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang.zh" class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">內容編輯</div>
      <div class="panel-body">
        <tiny-mce id="tern_content" v-model="lang.zh.page_tern.section_1.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
      </div>
    </div>
  </div>
</div>
@endsection