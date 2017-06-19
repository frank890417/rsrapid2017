<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Yearlog;
class YearlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
      $yearlogs = Yearlog::all();
      return view('manage.yearlog')
              ->with("yearlogs",$yearlogs);
    }
    public function edit($id){
      $yearlog = Yearlog::find($id);
      return view('manage.yearlog_edit')
              ->with("yearlog",$yearlog);
    }
    public function update($id){
      $inputs= Input::all();
      $yearlog = Yearlog::find($id);
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      $yearlog->update($inputs);
      return Redirect::to("manage/yearlog");
    }

    public function create(){
      return view('manage.yearlog_edit');
    }
    public function store(){
      $inputs= Input::all();
      // $inputs['updated_at']=date("Y-m-d H:i:s");
      // $inputs['created_at']=date("Y-m-d H:i:s");
      $yearlog = Yearlog::Create($inputs);
      return Redirect::to("manage/yearlog");
    }
    public function destroy($id){
      Yearlog::destroy($id);
      return Yearlog::all();
    }
}
