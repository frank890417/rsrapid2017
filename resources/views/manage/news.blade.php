@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class='btn btn-primary' href='{{ url('manage/news/create') }}'>新增新聞</a>
                    <br>
                  
                    <ul class="list-group">
                      @foreach ($news as $a_news)
                        <li class="list-group-item list-group-hover row">
                          <div class='col-sm-4'>{{$a_news->title}}</div>  
                          <div class='col-sm-2'>{{$a_news->date}}</div>
                          <div class='col-sm-2'>{{$a_news->tag}}</div>
                          <div class='col-sm-2'>{{$a_news->updated_at}}</div>
                          <div class='col-sm-2'><a class="btn btn-default" href='{{ url('manage/news/'.$a_news->id.'/edit') }}' >編輯</a></div>
                          <div class='col-sm-2'>
                            <button class='btn btn-danger btn-md ' onclick='event.preventDefault();if(confirm("你確定要刪除新聞嗎？")){document.getElementById("delete_news_{{$a_news->id}}").submit();}'>刪除</button>
                            <form id='delete_news_{{$a_news->id}}' action="{{url('manage/news/'.$a_news->id)}}" method="POST">
                              <input type="hidden" name="_method" value="delete">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                          </div>

                        </li>  
                      @endforeach
                    </ul>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
