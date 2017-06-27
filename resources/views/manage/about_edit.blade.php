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
        <li> <a href=" {{url('manage/yearlog')}} ">年表管理</a></li>
        <li class="active">年表編輯-{!! isset($yearlog)?$yearlog->title:"" !!}</li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">年表管理</h1>
  </div>
</div>
<form action="{{ (isset($yearlog))?(url('manage/yearlog/'.$yearlog->id)):(url('manage/yearlog/')) }}" method="post" id="form_yearlog" class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">年表設定</div>
      <div class="panel-body">
        <!--          
          label 首頁置頂
          br
          .btn-group
            label(for='stick_top')
              | 置頂
              input(type='radio', name='stick_top', value='1')
            label(for='stick_top')
              | 否
              input(type='radio', name='stick_top', value='0')
        -->
        <div class="form-group">
          <label for="title">年表名稱</label>
          <input id="title" name="title" value="{!! isset($yearlog)?$yearlog->title:"" !!}" class="form-control"/>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">儲存修改</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">編輯年表-{{ (isset($yearlog))?$yearlog->id:'' }}</div>
      <div class="panel-body">
        <input type="hidden" name="_method" value="{{ (isset($yearlog))?'put':'post' }}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="test_item">檢驗項目</label>
          <textarea name="test_item" rows="15" class="form-control">{!! isset($yearlog)?$yearlog->test_item:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="env">適用環境</label>
          <textarea id="env" name="env" rows="4" class="form-control">{!! isset($yearlog)?$yearlog->env:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="schedule">年表類型</label>
          <textarea id="schedule" name="schedule" rows="4" class="form-control">{!! isset($yearlog)?$yearlog->schedule:"" !!}</textarea>
        </div>
        <div class="form-group">
          <label for="talk">口碑</label>
          <ul>
            <li v-for="(talk,tid) in yearlogs.talk" class="form_group">
              <label v-text="(tid+1)+':'"></label>
              <input v-model="talk.title" class="form-control"/>
              <input v-model="talk.name" class="form-control"/>
              <button @click="yearlogs.talk.splice(tid,1)" class="btn btn-default">移除</button>
            </li>
          </ul>
          <button @click="yearlogs.talk.push({title: '',name: ''})" class="btn btn-default">新增口碑</button>
          <input id="talk" name="talk" :value="JSON.stringify(yearlogs.talk)" class="form-control"/>
        </div><br/><br/>
      </div>
    </div>
  </div>
</form>
@endsection
@section('require_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>
<script>
  if (!window.data_storage){
    window.data_storage={};
  }
  window.require_js={};
  window.require_js.dropzone=true;
  window.require_js.tinymce=true;
  window.yearlogs= {!! json_encode($yearlog)!!}
  window.yearlogs.talk= JSON.parse(window.yearlogs.talk)
    
</script>
@endsection
@section('require_js_after')
  <script>
    $("#tag").val("{{isset($yearlog)?($yearlog->tag):''}}");
    $(window).ready(function(){
      //- var value={!! isset($yearlog)?$yearlog->stick_top:0 !!};
      $("input[name=stick_top][value="+value+"]").attr("checked","checked");
    });
  </script>
@endsection