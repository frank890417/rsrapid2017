@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">編輯新聞</div>
        <div class="panel-body">
          <form action="{{ (isset($news))?(url('manage/news/'.$news->id)):(url('manage/news/')) }}" method="post">
            <input type="hidden" name="_method" value="{{ (isset($news))?'put':'post' }}"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
              <label for="title">標題</label>
              <input id="title" name="title" value="{!! isset($news)?$news->title:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="tag">標籤</label>
              <input id="tag" name="tag" value="{!! isset($news)?$news->tag:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="date">日期</label>
              <input id="date" name="date" value="{!! isset($news)?$news->date:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="description">短描述(80字以內)</label>
              <textarea id="description" name="description" rows="5" class="form-control">{!! isset($news)?$news->description:'' !!}</textarea>
            </div>
            <div class="form-group">
              <label for="content">內文</label>
              <div style="display:none;" class="btn btn-default btn-md btn-dropzone">上傳圖片</div>
              <textarea id="content" name="content" rows="15" class="form-control">{!! isset($news)?$news->content:'' !!}</textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default btn-md">儲存</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('require_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>
@endsection
<script>
  if (!window.data_storage){
    window.data_storage={};
  }
  window.require_js={};
  window.require_js.dropzone=true;
  window.require_js.tinymce=true;
</script>