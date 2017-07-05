<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use Route;
use App\News;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){

      $lang = Request::get("lang");
      $news = News::orderBy('date','desc')->where("lang",$lang)->get();
      return view('manage.news')
              ->with("news",$news);
    }
    public function edit($id){
      $news = News::find($id);
      return view('manage.news_edit')
              ->with("news",$news);
    }
    public function update($id){
      $inputs= Input::all();
      $news = News::find($id);
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $news->update($inputs);
      // dd($news);
      return Redirect::to("manage/news");
    }

    public function create(){
      return view('manage.news_edit');
    }
    public function store(){
      $inputs= Input::all();

      $lang = Request::get("lang");
      $inputs['lang']=$lang;
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $inputs['created_at']=date("Y-m-d H:i:s");
      $news = News::Create($inputs);
      return Redirect::to("manage/news");
    }
    public function destroy($id){
      News::destroy($id);
      return Redirect::to("manage/news");
    }
}
