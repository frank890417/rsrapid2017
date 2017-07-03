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
        <li> <a href=" {{url('manage/news')}} ">新聞管理</a></li>
        <li class="active">新聞編輯-{!! isset($news)?$news->title:"" !!}</li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">新聞管理</h1>
  </div>
</div>
<form action="{{ (isset($news))?(url('manage/news/'.$news->id)):(url('manage/news/')) }}" method="post" class="row">
  <div class="col-sm-8">
    <div class="panel panel-primary">
      <div class="panel-heading">編輯新聞</div>
      <div class="panel-body">
        <input type="hidden" name="_method" value="{{ (isset($news))?'put':'post' }}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="title">標題</label>
          <input id="title" name="title" value="{!! isset($news)?$news->title:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="date">日期</label>
          <input id="date" name="date" value="{!! isset($news)?$news->date:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="author">作者或轉載來源</label>
          <input id="author" name="author" value="{!! isset($news)?$news->author:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="content">內文</label>
          <div style="display:none;" class="btn btn-default btn-md btn-dropzone">上傳圖片</div>
          <textarea id="content" name="content" rows="10" class="form-control">{!! isset($news)?$news->content:'' !!}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">新聞設定</div>
      <div class="panel-body">
        <div class="form-group">
          <label for="tag">標籤</label>
          <select id="tag" name="tag" class="form-control">
            <option value="睿軒活動">睿軒活動</option>
            <option value="新聞快訊">新聞快訊</option>
            <option value="食安新知">食安新知</option>
            <option value="友善連結">友善連結</option>
          </select>
        </div>
        <!--          
          label(for='size') 顯示大小
          select#size.form-control(name='size')
            @if (isset($news))
              @if (($news->size)==1)
                option(value="1" selected) 1格 口
              @else
                option(value="1" ) 1格 口
              @endif
              @if (($news->size)==2)
                option(value="2" selected) 2格 口口
              @else
                option(value="2" ) 2格 口口
              @endif
            @else
              option(value="1" ) 1格 口
              option(value="2" ) 2格 口口
            @endif
        -->
        <div class="form-group">
          <label for="cover">封面圖片</label>
          <div class="row">
            <div class="col-sm-12"><img src="{!! isset($news)?$news->cover:"" !!}" width="100%" class="cover_preview"/></div>
            <div class="col-sm-12">
              <input id="cover" name="cover" style="width: 80%; display: inline-block" value="{!! isset($news)?$news->cover:"" !!}" class="form-control"/><br/>
              <div style=" display: inline-block" class="btn btn-default btn-md btn-dropzone-cover">上傳圖片</div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="cover">輪播圖</label>
          <div class="row">
            <div class="col-sm-12">       
              <carousel_editor :carousel_data="now_news.carousel"></carousel_editor>
            </div>
          </div>
        </div>
        <hr/>
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
    
    window.now_news= {!! json_encode($news)!!};
    if (!window.now_news.carousel) window.now_news.carousel = [];
    else
       window.now_news.carousel = JSON.parse(window.now_news.carousel);
  </script>
</form>
@endsection
@section('require_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>
@endsection
@section('require_js_after')
  <script>$("#tag").val("{{isset($news)?($news->tag):''}}");</script>
@endsection