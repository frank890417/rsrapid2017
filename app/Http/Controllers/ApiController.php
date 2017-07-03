<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use App\News;
use App\Question;
use App\Solution;
use App\Yearlog;
use App\Websiteinfo;
class ApiController extends Controller
{
    //
    public function news(){
      return News::orderBy('id','desc')->get();
    }
    public function questions(){
      return Question::orderBy('ordernum','asc')->get();
    }
    public function solutions(){
      return Solution::all();
    }
    public function yearlogs(){
       return Yearlog::all();
    }
    public function update_all_yearlogs(){
       $input = Input::all();
       foreach ($input as $key => $value) {
         Question::updateOrCreate(["id"=>$value["id"]],$value);
       }
       return Question::orderBy("ordernum","asc")->get();
    }

    public function websiteinfo($key){
      return Websiteinfo::where("key",$key)->first()->data;
    }

    public function websiteinfo_save($key){
      $input = Input::all();
      // dd($input);
      $websiteinfo = Websiteinfo::where("key",$key)->first();
      $websiteinfo->data=json_encode($input);
      $websiteinfo->save();
    }

    public function upload_image(){
      $input = Input::all();
      if(Input::file())
       {

         $image = Input::file('file');
         $filename  =  date('Y_m_d_h_i_s').'_'. $_FILES['file']['name'] ;


         $path = '/img/uploaded/';
         Storage::disk('public')->putFileAs($path,$image,$filename);
         
         return $path.$filename;
     
             // Image::make($image->getRealPath())->resize(200, 200)->save($path);
             // $user->image = $filename;
             // $user->save();
        }
    }
}
