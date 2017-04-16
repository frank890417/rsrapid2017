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
        <li> <a href=" {{url('manage/question')}} ">問題管理</a></li>
        <li class="active">問題編輯-{!! isset($question)?$question->title:"" !!}</li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">問題管理</h1>
  </div>
</div>
<form action="{{ (isset($question))?(url('manage/question/'.$question->id)):(url('manage/question/')) }}" method="post" class="row">
  <div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">編輯問題-{{ (isset($question))?$question->id:'' }}</div>
      <div class="panel-body">
        <input type="hidden" name="_method" value="{{ (isset($question))?'put':'post' }}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="question">問題</label>
          <input id="question" name="question" value="{!! isset($question)?$question->question  :"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="answer">回答</label>
          <textarea id="answer" name="answer" rows="15" class="form-control">{!! isset($question)?$question->answer:"" !!}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">問題設定</div>
      <div class="panel-body">
        <div class="form-group">
          <label>首頁置頂</label><br/>
          <div class="btn-group">
            <label for="stick_top">置頂
              <input type="radio" name="stick_top" value="1"/>
            </label>
            <label for="stick_top">否
              <input type="radio" name="stick_top" value="0"/>
            </label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">儲存修改</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    if (!window.data_storage){
      window.data_storage={};
    }
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
    
    
  </script>
</form>
@endsection
@section('require_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>
@endsection
@section('require_js_after')
  <script>
    $("#tag").val("{{isset($question)?($question->tag):''}}");
    $(window).ready(function(){
      var value={!! isset($question)?$question->stick_top:0 !!};
      $("input[name=stick_top][value="+value+"]").attr("checked","checked");
    });
  </script>
@endsection