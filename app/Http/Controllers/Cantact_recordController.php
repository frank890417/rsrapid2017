<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Contact_record;
class Contact_recordController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    public function index(){
      $contact_record = Contact_record::orderBy('date','desc')->get();
      return view('manage.contact_record')
              ->with("contact_record",$contact_record);
    }
    public function edit($id){
      $contact_record = Contact_record::find($id);
      return view('manage.contact_record_edit')
              ->with("contact_record",$contact_record);
    }
    public function update($id){
      $inputs= Input::all();
      $contact_record = Contact_record::find($id);
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $contact_record->update($inputs);
      return Redirect::to("manage/contact_record");
    }

    public function create(){
      return view('manage.contact_record_edit');
    }
    public function store(){
      $inputs= Input::all();
      $inputs['updated_at']=date("Y-m-d H:i:s");
      $inputs['created_at']=date("Y-m-d H:i:s");
      $contact_record = Contact_record::Create($inputs);
      return ["status"=>"success","value"=>$contact_record] ;
    }
    public function destroy($id){
      Contact_record::destroy($id);
      return Redirect::to("manage/contact_record");
    }
}
