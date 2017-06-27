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
        <li> <a href="#">關於睿軒</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">關於睿軒
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang.zh" class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">頁面內容管理</div>
      <div class="panel-body">
        <div class="form-group">
          <label>內容</label>
          <tiny-mce id="about_section1_content" v-model="lang.zh.page_about.section_1.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">年表管理</div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <th>編號</th>
            <th>年份</th>
            <th>月份</th>
            <th>標題</th>
            {{-- th 內容 --}}
            <th>連結新聞</th>
            {{-- th 更新時間 --}}
            {{-- th 編輯 --}}
            <th>操作</th>
          </thead>
          <tbody> 
            <tr v-for="(yearlog,id) in yearlogs">
              <td style="width: 5%">@{{yearlog.id}}</td>
              <td style="width: 7%">@{{yearlog.year}}</td>
              <td style="width: 7%">@{{yearlog.date}}</td>
              <td style="width: 20%">@{{yearlog.title}}</td>
              {{-- td(style="width: 40%") @{{yearlog.content}} --}}
              <td style="width: 10%">@{{yearlog.news_id==-1?'無':yearlog.news_id}}</td>
              {{-- td(style="width: 10%") @{{yearlog.updated_at}} --}}
              <td style="width: 5%">
                <div @click="now_yearlog=id" class="btn btn-default">編輯</div>
              </td>
              <td style="width: 5%">
                <button @click="delete_yearlog(yearlog.id)" class="btn btn-danger btn-md">刪除</button>
                {{-- form(:id="'delete_solution_'+yearlog.id", :action="'/manage/yearlog/'+yearlog.id", method='POST') --}}
                {{-- input(type='hidden', name='_method', value='delete') --}}
                {{-- input(type='hidden', name='_token', value='{{ csrf_token() }}') --}}
              </td>
            </tr>
          </tbody>
        </table><br/><a href="{{ url('manage/yearlog/create') }}" class="btn btn-primary">新增事件</a><br/>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div v-for="(yearlog,id) in [yearlogs[now_yearlog]]" class="panel panel-default">
      <div class="panel-heading">編輯中-@{{yearlog.id}}@{{yearlog.title}}</div>
      <div class="panel-body">
        <label>編號@{{yearlog.id}}</label>
        <table class="table">
          <tr>
            <td>
              <label>年份</label>
            </td>
            <td>
              <input v-model="yearlog.year" class="form-control"/>
            </td>
          </tr>
          <tr>
            <td>
              <label>月份</label>
            </td>
            <td>
              <input v-model="yearlog.date" class="form-control"/>
            </td>
          </tr>
          <tr>
            <td>
              <label>標題</label>
            </td>
            <td>
              <input v-model="yearlog.title" class="form-control"/>
            </td>
          </tr>
          <tr>
            <td>
              <label>內容</label>
            </td>
            <td>
              <textarea v-model="yearlog.content" rows="4" class="form-control"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label>連結新聞</label>
            </td>
            <td>
              <select v-model="yearlog.news_id" class="form-control">
                <option value="-1">未連結</option>
                <option v-for="a_news in news" :value="a_news.id">@{{a_news.title}}</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label>更新時間</label>
            </td>
            <td>
              <input v-model="yearlog.updated_at" class="form-control"/>
            </td>
          </tr>
        </table><br/><a href="{{ url('manage/yearlog/create') }}" class="btn btn-primary">新增事件</a><br/>
      </div>
    </div>
  </div>
</div>
@endsection