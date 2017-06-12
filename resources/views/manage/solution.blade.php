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
        <li> <a href="#">方案管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">方案管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">方案管理</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th>編號</th>
            <th>問題</th>
            <th>描述</th>
            <th>副標</th>
            <th>更新時間</th>
            <th>編輯</th>
            <th>刪除</th>
          </thead>
          <tbody> </tbody>
          {{--
            {{$solutions}}
          --}}
          @foreach($solutions as $solution)
            <tr>
              <td style="width: 5%">{{$solution->id}}</td>
              <td style="width: 15%">{{$solution->title}}</td>
              <td style="width: 20%">{{$solution->sub_title}}</td>
              <td style="width: 50%">{{$solution->sub_content}}</td>
              <td style="width: 50%">{{$solution->description}}</td>
              <td style="width: 20%">{{$solution->updated_at}}</td>
              <td style="width: 5%"><a href="{{ url('manage/solution/'.($solution->id).'/edit') }}" class="btn btn-default">編輯</a></td>
              <td style="width: 5%">
                <button onclick="event.preventDefault();if(confirm('你確定要刪除新聞嗎？')){document.getElementById('delete_solution_{{$solution->id}}').submit();}" class="btn btn-danger btn-md">刪除</button>
                <form id="delete_solution_{{$solution->id}}" action="{{url('manage/solution/'.$solution->id)}}" method="POST">
                  <input type="hidden" name="_method" value="delete"/>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                </form>
              </td>
            </tr>
          @endforeach
        </table><br/><a href="{{ url('manage/solution/create') }}" class="btn btn-primary">新增方案</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection