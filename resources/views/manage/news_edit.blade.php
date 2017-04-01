@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (isset($news))
                      <form action="{{ url('manage/news/'.$news->id) }}" method="post">
                        <input type="hidden" name="_method" value="put">
                    @else
                      <form action="{{ url('manage/news/') }}" method="post">
                        <input type="hidden" name="_method" value="post">
                    @endif

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class='form-group'>
                          <label for='title'>title</label>
                          <input id=title name=title class='form-control' value='{!! isset($news)?$news->title:"" !!}'></input>
                        </div>

                        <div class='form-group'>
                          <label for='tag'>tag</label>
                          <input id=tag name=tag class='form-control' value='{!! isset($news)?$news->tag:"" !!}'></input>
                        </div>

                        <div class='form-group'>
                          <label for='date'>date</label>
                          <input id=date name=date class='form-control' value='{!! isset($news)?$news->date:"" !!}'></input>
                        </div>

                        <div class='form-group'>
                          <label for='description'>description</label>
                          <textarea id=description name=description class='form-control' rows=15 >{!! isset($news)?$news->description:"" !!}</textarea>
                        </div>

                        <div class='form-group'>
                          <label for='content'>content</label>
                          <input id=content name=content class='form-control' value='{!! isset($news)?$news->content:"" !!}'></input>
                        </div>

                      <div class='form-group'>
                        <button type=submit class='btn btn-default btn-md'>儲存</button>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
