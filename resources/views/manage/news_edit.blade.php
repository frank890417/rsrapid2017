@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">編輯新聞</div>
        <div class="panel-body">
          <form action="{{ isset($news)?(url('manage/news/'.$news->id)):url('manage/news/') }}" method="post">
            <input type="hidden" name="_method" value="{{isset($news)?'put':'post'}}"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
              <label for="title">title</label>
              <input id="title" name="title" value="{!! isset($news)?$news->title:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="tag">tag</label>
              <input id="tag" name="tag" value="{!! isset($news)?$news->tag:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="date">date</label>
              <input id="date" name="date" value="{!! isset($news)?$news->date:"" !!}" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="description">description</label>
              <textarea id="description" name="description" rows="5" class="form-control">{!! isset($news)?$news->description:'' !!}</textarea>
            </div>
            <div class="form-group">
              <label for="content">content</label>
              <textarea id="content" name="content" rows="15" class="form-control">{!! isset($news)?$news->description:'' !!}</textarea>
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