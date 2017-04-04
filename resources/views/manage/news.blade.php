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
        <li> <a href="#">新聞管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">新聞管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">新聞管理</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <thead>
              <th>標題</th>
              <th>日期</th>
              <th>標籤</th>
              <th>更新時間</th>
              <th>顯示大小</th>
              <th>編輯</th>
              <th>刪除</th>
            </thead>
          </thead>
          <tbody></tbody>
          @foreach($news as $a_news)
            <tr>
              <td style="width: 30%">{{$a_news->title}}</td>
              <td style="width: 10%">{{$a_news->date}}</td>
              <td style="width: 9%">{{$a_news->size==1?'1格 口':'2格 口口'}}</td>
              <td style="width: 10%">{{$a_news->tag}}</td>
              <td>{{$a_news->updated_at}}</td>
              <td style="width: 5%"><a href="{{ url('manage/news/'.($a_news->id).'/edit') }}" class="btn btn-default">編輯</a></td>
              <td style="width: 5%">
                <button onclick="event.preventDefault();if(confirm('你確定要刪除新聞嗎？')){document.getElementById('delete_news_{{$a_news->id}}').submit();}" class="btn btn-danger btn-md">刪除</button>
                <form id="delete_news_{{$a_news->id}}" action="{{url('manage/news/'.$a_news->id)}}" method="POST">
                  <input type="hidden" name="_method" value="delete"/>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                </form>
              </td>
            </tr>
          @endforeach
        </table><br/><a href="{{ url('manage/news/create') }}" class="btn btn-primary">新增新聞</a><br/>
      </div>
    </div>
  </div>
</div>
<script>
  window.posts={!! $news !!};
  
</script>
@endsection