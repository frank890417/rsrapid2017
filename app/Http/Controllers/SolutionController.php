<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Solution;

class SolutionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    //
    public function index(){
      $lang = Request::get("lang");
      $solutions = Solution::where("lang",$lang)->get();
      return view('manage.solution')
              ->with("solutions",$solutions)
               ->with("lang",$lang);
    }
    public function edit($id){
        $lang = Request::get('lang');
      $solution = Solution::find($id);
      return view('manage.solution_edit')
              ->with("solution",$solution)
               ->with("lang",$lang);
    }
    public function update($id){

      $lang = Request::get("lang");
      $inputs= Input::all();
      $solution = Solution::find($id);
      // dd($inputs);
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      $solution->update($inputs);
      return Redirect::to("/".$lang."/manage/solution");
    }

    public function create(){
      $lang = Request::get("lang");
      return view('manage.solution_edit')
               ->with("lang",$lang);
    }
    public function store(){

      $lang = Request::get("lang");
      $inputs= Input::all();
      // $lang = Request::get("lang");
      $inputs['lang']=$lang;
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      // $inputs['created_at']=date("Y-m-d H:i:s");
      $solution = Solution::Create($inputs);
      return Redirect::to("/".$lang."/manage/solution");
    }
    public function destroy($id){

      $lang = Request::get("lang");
      Solution::destroy($id);
      return Redirect::to("/".$lang."/manage/solution");
    }
}
