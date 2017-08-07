<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Yearlog;
use App\News;

class YearlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
      $lang = Request::get("lang");
      $yearlogs = Yearlog::where("lang",$lang)->get();
      return view('manage.about')
              ->with("yearlogs",$yearlogs)
               ->with("lang",$lang);
    }
    public function edit($id){
        $lang = Request::get('lang');
      $yearlog = Yearlog::find($id);
      return view('manage.about_edit')
              ->with("yearlog",$yearlog)
              ->with("news",News::all())
               ->with("lang",$lang);
    }
    public function update($id){

      $lang = Request::get("lang");
      $inputs= Input::all();
      $yearlog = Yearlog::find($id);
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      $yearlog->update($inputs);
      return Redirect::to("/".$lang."/manage/about");
    }
    public function saveall(){
      $inputs= Input::all();
      // dd($inputs);
      foreach ($inputs as $key => $value) {
        $yearlog = Yearlog::find($value["id"]);
        // $inputs['updated_at']=date("Y-m-d H:i:s");
        if ($yearlog){
          $yearlog->update($value);
        }else{
          $yearlog = Yearlog::Create($value);

        }

      }
      
      return ["status"=>"success"];
    }


    public function create(){
      $lang = Request::get("lang");
      return view('manage.about_edit')
              ->with("news",News::all())
               ->with("lang",$lang);
    }
    public function store(){

      $lang = Request::get("lang");
      $lang = Request::get("lang");
      $inputs= Input::all();
      $inputs['lang']=$lang;
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      // $inputs['created_at']=date("Y-m-d H:i:s");
      $yearlog = Yearlog::Create($inputs);
      return Redirect::to("/".$lang."/manage/about");
    }
    public function destroy($id){

      $lang = Request::get("lang");
      Yearlog::destroy($id);
      return Redirect::to("/".$lang."/manage/about");
    }
}
