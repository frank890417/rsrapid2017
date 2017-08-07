<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Question;
class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){

      $lang = Request::get("lang");
      $questions = Question::orderBy("stick_top","desc")->where("lang",$lang)->get();
      return view('manage.question')
              ->with("questions",$questions)
               ->with("lang",$lang);
    }
    public function edit($id){
        $lang = Request::get('lang');
      $question = Question::find($id);
      return view('manage.question_edit')
              ->with("question",$question)
               ->with("lang",$lang);
    }
    public function update($id){

      $lang = Request::get("lang");
      $inputs= Input::all();
      $question = Question::find($id);
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $question->update($inputs);
      return Redirect::to("/".$lang."/manage/question");
    }

    public function create(){
      $lang = Request::get("lang");
      return view('manage.question_edit')
               ->with("lang",$lang);
    }
    public function store(){
      $lang = Request::get("lang");
      $inputs= Input::all();
      $inputs['lang']=$lang;
      $inputs['ordernum']=100000;
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $inputs['created_at']=date("Y-m-d H:i:s");
      $question = Question::Create($inputs);
      return Redirect::to("/".$lang."/manage/question");
    }
    public function destroy($id){

      $lang = Request::get("lang");
      Question::destroy($id);
      return Redirect::to("/".$lang."/manage/question");
    }
}
