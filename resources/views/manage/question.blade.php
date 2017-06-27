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
  <div class="col-lg-3">
    <div class="panel panel-primary">
      <div class="panel-heading">頁面敘述</div>
      <div class="panel-body">
        <tiny-mce id="tern_content" v-model="lang.zh.page_contact.section_1.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce><br/>
        <div @click="save_website_info" class="btn btn-danger">儲存更新</div>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <div class="panel panel-primary">
      <div class="panel-heading">問題管理</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th>編號</th>
            <th>問題</th>
            <th>回答</th>
            <th>置頂</th>
            <th>更新時間</th>
            <th>編輯</th>
            <th>刪除</th>
          </thead>
          <tbody></tbody>
          @foreach($questions as $question)
            <tr>
              <td style="width: 5%">{{$question->id}}</td>
              <td style="width: 15%">{{$question->question}}</td>
              <td style="width: 50%">{{$question->answer}}</td>
              <td style="width: 5%">{{$question->stick_top?'是':'否'}}</td>
              <td>{{$question->updated_at}}</td>
              <td style="width: 5%"><a href="{{ url('manage/question/'.($question->id).'/edit') }}" class="btn btn-default">編輯</a></td>
              <td style="width: 5%">
                <button onclick="event.preventDefault();if(confirm('你確定要刪除新聞嗎？')){document.getElementById('delete_question_{{$question->id}}').submit();}" class="btn btn-danger btn-md">刪除</button>
                <form id="delete_question_{{$question->id}}" action="{{url('manage/question/'.$question->id)}}" method="POST">
                  <input type="hidden" name="_method" value="delete"/>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                </form>
              </td>
            </tr>
          @endforeach
        </table><br/><a href="{{ url('manage/question/create') }}" class="btn btn-primary">新增新聞</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection