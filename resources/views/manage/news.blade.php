@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">新聞管理</div>
          <div class="panel-body"><br/><a href="{{ url('manage/news/create') }}" class="btn btn-primary">新增新聞</a><br/>
            <ul class="list-group"></ul>
            @foreach($news as $a_news)
              <li class="list-group-item list-group-hover row">
                <div class="col-sm-4">{{$a_news->title}}</div>
                <div class="col-sm-2">{{$a_news->date}}</div>
                <div class="col-sm-2">{{$a_news->tag}}</div>
                <div class="col-sm-2">{{$a_news->updated_at}}</div>
                <div class="col-sm-1"><a href="{{ url('manage/news/'.($a_news->id).'/edit') }}" class="btn btn-default">編輯</a></div>
                <div class="col-sm-1">
                  <button onclick="event.preventDefault();if(confirm('你確定要刪除新聞嗎？')){document.getElementById('delete_news_{{$a_news->id}}').submit();}" class="btn btn-danger btn-md">刪除</button>
                  <form id="delete_news_{{$a_news->id}}" action="{{url('manage/news/'.$a_news->id)}}" method="POST">
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  </form>
                </div>
              </li>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection