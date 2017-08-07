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
              ->with("news",$news)
               ->with("lang",$lang);
    }
    public function edit($id){
      $lang = Request::get('lang');
      $news = News::find($id);
      return view('manage.news_edit')
              ->with("news",$news)
               ->with("lang",$lang);
    }
    public function update($id){

      $lang = Request::get("lang");
      $inputs= Input::all();
      $news = News::find($id);
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $news->update($inputs);
      // dd($news);
      // dd($lang);
      return Redirect::to("/".$lang."/manage/news");
    }

    public function create(){
      $lang = Request::get("lang");
      return view('manage.news_edit')
               ->with("lang",$lang);
    }
    public function store(){
      $lang = Request::get("lang");
      $inputs= Input::all();

      $lang = Request::get("lang");
      $inputs['lang']=$lang;
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $inputs['created_at']=date("Y-m-d H:i:s");
      $news = News::Create($inputs);
      return Redirect::to("/".$lang."/manage/news");
    }
    public function destroy($id){
      $lang = Request::get("lang");
      News::destroy($id);
      return Redirect::to("/".$lang."/manage/news");
    }
}
