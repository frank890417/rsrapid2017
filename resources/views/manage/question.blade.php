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
        <li> <a href="#">問題管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">問題管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">頁面敘述</div>
      <div class="panel-body">
        <tiny-mce id="tern_content" v-model="lang.page_contact.section_1.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce><br/>
        <div @click="save_website_info" class="btn btn-danger">儲存更新</div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">問題管理 拖曳以排序</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th></th>
            <th>編號</th>
            <th>問題</th>
            <th>回答</th>
            {{-- th 置頂 --}}
            <th>更新時間</th>
            <th>編輯</th>
            <th>刪除</th>
          </thead>
          <tbody>
            <tr v-for="(qa,id) in questions" draggable="true" @dragover.prevent="dragover_question" @dragstart="dragstart_question(id)" @drop="drop_question(id,questions)">
              <td> <i style="cursor: all-scroll" class="fa fa-bars"></i></td>
              <td style="width: 5%">@{{1+id}}</td>
              <td style="width: 15%">@{{qa.question}}</td>
              <td style="width: 50%">@{{qa.answer}}</td>
              {{-- td(style="width: 5%") @{{qa.stick_top?'是':'否'}} --}}
              <td>@{{qa.updated_at}}</td>
              <td style="width: 5%"><a :href="'manage/question/'+(qa.id)+'/edit'" class="btn btn-default">編輯</a></td>
              <td style="width: 5%"></td>
            </tr>
          </tbody>
          <div @click="save_question" class="btn btn-danger">儲存更新
            {{-- button.btn.btn-danger.btn-md(onclick!="event.preventDefault();if(confirm('你確定要刪除新聞嗎？')){document.getElementById('delete_question_{{qa.id}}').submit();}") 刪除 --}}
            {{-- form(id!='delete_question_{{qa.id}}', action!="{{url('manage/question/'.qa.id)}}", method='POST') --}}
            {{-- input(type='hidden', name='_method', value='delete') --}}
            {{-- input(type='hidden', name='_token', value='{{ csrf_token() }}') --}}
          </div>
        </table><br/><a href="{{ url('manage/question/create') }}" class="btn btn-primary">新增問答</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection