<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Contact_record;
use App\Solution;
use Mail;
class Contact_recordController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    public function index(){
      $contact_record = Contact_record::orderBy('created_at','desc')->get();
      foreach ($contact_record as $key => $value) {
        $value->ask_item = Solution::find($value->ask_item_id);
      }
      
      return $contact_record;
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
      $maildata=[
        'name' => $inputs['name'] ,
        // 'phone' => $inputs['phone'] ,
        'email' => $inputs['email'] ,
        'ask_item_name' => Solution::find($inputs['ask_item_id'])->title ,
        'content' => $inputs['content'] ,
        'time' => date("Y-m-d H:i:s")
      ];
      Mail::send('emails.welcome', $maildata, function($message) use ($maildata){
        $message
          ->from('service@rapidsuretech.com','睿軒官網服務信箱')
          ->bcc('frank890417@gmail.com', '吳哲宇')
          ->to('service@rapidsuretech.com','睿軒網站客服')
          ->subject('睿軒官網聯繫表單通知 -'. $maildata['name']);
      });
      $contact_record = Contact_record::Create($inputs);
      return ["status"=>"success","value"=>$contact_record] ;
    }
    public function destroy($id){
      Contact_record::destroy($id);
      return Redirect::to("manage/contact_record");
    }
}
