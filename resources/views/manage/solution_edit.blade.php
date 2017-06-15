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
        <li> <a href=" {{url('manage/solution')}} ">方案管理</a></li>
        <li class="active">方案編輯-{!! isset($solution)?$solution->title:"" !!}</li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">方案管理</h1>
  </div>
</div>
<form action="{{ (isset($solution))?(url('manage/solution/'.$solution->id)):(url('manage/solution/')) }}" method="post" class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">方案設定</div>
      <div class="panel-body">
        <!--          
          label 首頁置頂
          br
          .btn-group
            label(for='stick_top')
              | 置頂
              input(type='radio', name='stick_top', value='1')
            label(for='stick_top')
              | 否
              input(type='radio', name='stick_top', value='0')
        -->
        <div class="form-group">
          <label for="title">方案名稱</label>
          <input id="title" name="title" value="{!! isset($solution)?$solution->title:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="sub_title">副標題</label>
          <input id="sub_title" name="sub_title" value="{!! isset($solution)?$solution->sub_title:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="sub_content">方案說明</label>
          <textarea id="sub_content" name="sub_content" rows="9" class="form-control">{!! isset($solution)?$solution->sub_content:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="solution_area_slogan">方案區塊對應文案</label>
          <input id="solution_area_slogan" name="solution_area_slogan" rows="2" value="{!! isset($solution)?$solution->solution_area_slogan:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">儲存修改</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">編輯方案-{{ (isset($solution))?$solution->id:'' }}</div>
      <div class="panel-body">
        <input type="hidden" name="_method" value="{{ (isset($solution))?'put':'post' }}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="test_item">檢驗項目</label>
          <textarea id="test_item" name="test_item" rows="4" class="form-control">{!! isset($solution)?$solution->test_item:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="env">適用環境</label>
          <textarea id="env" name="env" rows="4" class="form-control">{!! isset($solution)?$solution->env:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="schedule">方案類型</label>
          <textarea id="schedule" name="schedule" rows="4" class="form-control">{!! isset($solution)?$solution->schedule:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="talk">口碑</label>
          <textarea id="talk" name="talk" class="form-control">{!! isset($solution)?$solution->talk:"" !!}</textarea>
        </div><br/><br/>
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
    $("#tag").val("{{isset($solution)?($solution->tag):''}}");
    $(window).ready(function(){
      var value={!! isset($solution)?$solution->stick_top:0 !!};
      $("input[name=stick_top][value="+value+"]").attr("checked","checked");
    });
  </script>
@endsection