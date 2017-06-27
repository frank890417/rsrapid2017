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
        <li> <a href=" {{url('manage/about')}} ">關於睿軒</a></li>
        <li>年表管理</li>
        <li class="active">年表編輯-{!! isset($yearlog)?$yearlog->title:"" !!}</li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">年表管理</h1>
  </div>
</div>
<form action="{{ (isset($yearlog))?(url('manage/about/'.$yearlog->id)):(url('manage/about/')) }}" method="post" id="form_yearlog" class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">年表設定</div>
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
          <label for="title">名稱</label>
          <input id="title" name="title" value="{!! isset($yearlog)?$yearlog->title:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="year">年份</label>
          <input id="year" name="year" value="{!! isset($yearlog)?$yearlog->year:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="date">月份</label>
          <input id="date" name="date" value="{!! isset($yearlog)?$yearlog->date:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="news_id">連結新聞</label>
          <select id="news_id" name="news_id" rows="4" value="{{ isset($yearlog)?($yearlog->news_id):-1 }}" class="form-control"> 
            <option value="-1">無連結</option>
            @foreach($news as $a_news)
              <option value="{{$a_news->id}}">{{$a_news->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="cover">封面圖片</label>
          <div class="row">
            <div class="col-sm-12"><img src="{!! isset($yearlog)?$yearlog->cover:"" !!}" width="100%" class="cover_preview"/></div>
            <div class="col-sm-12">
              <input id="cover" name="cover" style="width: 80%; display: inline-block" value="{!! isset($yearlog)?$yearlog->cover:"" !!}" class="form-control"/><br/>
              <div style=" display: inline-block" class="btn btn-default btn-md btn-dropzone-cover">上傳圖片</div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">儲存修改</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">編輯年表-{{ (isset($yearlog))?$yearlog->id:'' }}</div>
      <div class="panel-body">
        <input type="hidden" name="_method" value="{{ (isset($yearlog))?'put':'post' }}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="content">內容</label>
          <textarea id="content" name="content" rows="5" class="form-control">{!! isset($yearlog)?$yearlog->content:"" !!}</textarea>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('require_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>
<script>
  if (!window.data_storage){
    window.data_storage={};
  }
  window.require_js={};
  window.require_js.dropzone=true;
  window.require_js.tinymce=true;
  window.yearlogs.talk= JSON.parse(window.yearlogs.talk)
    
</script>
@endsection
@section('require_js_after')
  <script>
    $("#tag").val("{{isset($yearlog)?($yearlog->tag):''}}");
    $(window).ready(function(){
      //- var value={!! isset($yearlog)?$yearlog->stick_top:0 !!};
      $("input[name=stick_top][value="+value+"]").attr("checked","checked");
    });
  </script>
@endsection