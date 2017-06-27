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
        <li> <a href="#">年表管理</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">年表管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">年表管理</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th>編號</th>
            <th>年份</th>
            <th>月份</th>
            <th>標題</th>
            <th>內容</th>
            <th>連結新聞</th>
            <th>更新時間</th>
            <th>編輯</th>
            <th>刪除</th>
          </thead>
          <tbody> 
            <tr v-for="yearlog in yearlogs">
                <td style="width: 5%">@{{yearlog.id}}</td>
                <td style="width: 7%">@{{yearlog.year}}</td>
                <td style="width: 7%">@{{yearlog.date}}</td>
                <td style="width: 20%">@{{yearlog.title}}</td>
                <td style="width: 40%">@{{yearlog.content}}</td>
                <td style="width: 10%">@{{yearlog.news_id}}</td>
                <td style="width: 10%">@{{yearlog.updated_at}}</td>
                <td style="width: 5%"><a :href="'/manage/yearlog/'+(yearlog.id)" class="btn btn-default">編輯</a></td>
                <td style="width: 5%">
                  <button @click="delete_yearlog(yearlog.id)" class="btn btn-danger btn-md">刪除</button>

                </td>
            </tr>
          </tbody>
        </table><br/><a href="{{ url('manage/yearlog/create') }}" class="btn btn-primary">新增事件</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection