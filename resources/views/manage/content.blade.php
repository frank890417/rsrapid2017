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
        <li> <a href="#">首頁與網站資訊</a></li>
      </ol>
    </div>
    @yield('content')
  </div>
  <div class="col-lg-12">
    <h1 class="page-header">首頁與網站資訊
      <div @click="save_website_info" class="btn btn-danger pull-right">儲存更新</div>
    </h1>
  </div>
</div>
<div v-if="lang" class="row">
  <div class="col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">首頁管理</div>
      <div class="panel-body">
        <div class="form-group">
          <h4>區塊一</h4>
          <label>標題</label>
          <input v-model="lang.page_index.section_1.title" class="form-control"/>
          <label>內文</label>
          <tiny-mce id="index_section1_content" v-model="lang.page_index.section_1.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
          <hr/>
        </div>
        <div class="form-group">
          <h4>區塊二</h4>
          <label>標題</label>
          <input v-model="lang.page_index.section_2.title" class="form-control"/>
          <label>內文</label>
          <tiny-mce id="index_section2_content" v-model="lang.page_index.section_2.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
          <hr/>
        </div>
        <div class="form-group">         
          <h4>區塊三</h4>
          <label>標題</label>
          <input v-model="lang.page_index.section_3.title" class="form-control"/>
          <label>內文</label>
          <tiny-mce id="index_section3_content" v-model="lang.page_index.section_3.content" :other-props="mce_plugin" :toolbar="mce_toolbar"></tiny-mce>
          <hr/>
        </div><br/><br/>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">網站資訊</div>
      <div class="panel-body">
        <div class="form-group">
          <label>公司地址與資料</label>
          <div v-for="(loc,id) in lang.footer.section_company.locations">
            <div class="col-sm-2">
              <h4>@{{id+1}}-@{{loc.location}}</h4>
            </div>
            <div class="col-sm-10">
              <div class="form-inline">
                <label>位置</label>
                <input v-model="loc.location" class="form-control"/>
              </div>
              <div class="form-inline">
                <label>縣市</label>
                <input v-model="loc.county" class="form-control"/>
              </div>
              <div class="form-inline">
                <label>電話</label>
                <input v-model="loc.phone" class="form-control"/>
              </div>
              <div class="form-inline">
                <label>地址</label>
                <input v-model="loc.address" style="width: 80%" class="form-control"/>
              </div>
            </div>
            <button @click="lang.footer.section_company.locations.splice(id,1)" class="btn btn-secondary">- 刪除位置(@{{loc.location}})</button>
          </div>
        </div><br/>
        <button @click="lang.footer.section_company.locations.push({name: '',icon: ''})" class="btn btn-default">+ 新增位置</button>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">合作夥伴</div>
      <div class="panel-body">
        <div class="form-group">
          <label>合作夥伴資料</label>
          <div v-for="(partner,id) in lang.footer.section_partner.partners">
            <div class="form-inline">
              <label>名稱</label>
              <input v-model="partner.name" class="form-control"/>
              <label>icon</label>
              <input v-model="partner.icon" style="width: 40%" class="form-control"/>
              <button @click="lang.footer.section_partner.partners.splice(id,1)" class="btn btn-secondary">-</button>
            </div>
          </div><br/>
          <button @click="lang.footer.section_partner.partners.push({name: '',icon: ''})" class="btn btn-default">+ 新增夥伴</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">社群連結</div>
      <div class="panel-body">
        <div class="form-group">
          <div class="col-sm-12">
            <label>平台編輯</label>
            <select v-model="now_social_id">
              <option v-for="(s,id) in lang.footer.section_company.social" :value="id">@{{s.name}}</option>
            </select><br/>
          </div>
          <div v-for="(social,id) in [lang.footer.section_company.social[now_social_id]]">
            <div class="col-sm-2">
              <h4>@{{social.name}}</h4>
              <!-- button.btn.btn-secondary(@click="lang.footer.section_company.social.splice(id,1)") - -->
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <label>名稱</label>
                <input v-model="social.name" class="form-control"/>
              </div>
              <div class="form-group">
                <label>icon</label>
                <input v-model="social.icon" class="form-control"/>
              </div>
              <div class="form-group">
                <label>連結</label>
                <input v-model="social.url" class="form-control"/>
              </div>
              <hr/>
            </div>
          </div>
          <!-- button.btn.btn-default(@click="lang.footer.section_company.social.push({name: '',icon: '',url: ''})") + 新增社群 -->
          
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection