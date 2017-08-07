<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Route;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use App\News;
use App\Question;
use App\Solution;
use App\Yearlog;
use App\Websiteinfo;
use App\LaravelZhconverter;



class ApiController extends Controller
{
    //0

    public function convert_obj_cn($obj){
      return json_decode(LaravelZhconverter::translate(json_encode($obj, JSON_UNESCAPED_UNICODE),'CN' ));
    }
        
    public function news(){
      $lang=Request::get("lang");
      $result =  News::orderBy('id','desc')->where("lang",$lang)->get();
      
      return $result;
    }
    public function questions(){
      $lang=Request::get("lang");
      $result = Question::orderBy('ordernum','asc')->where("lang",$lang)->get();
      
      return $result;
    }
    public function solutions(){
      $lang=Request::get("lang");
      $result = Solution::where("lang",$lang)->get();
      
      return $result;
    }
    public function yearlogs(){
      $lang=Request::get("lang");
      $result = Yearlog::where("lang",$lang)->get();
      
      return $result;
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
         // $ext = $image->getClientOriginalExtension();
         $filename  =  date('Y_m_d_h_i_s').'_'. $_FILES['file']['name'] ;

         // prevent possible upsizing
         // dd("storage/".$filename);
         $img = Image::make($image);
         $img->resize(1920, null, function ($constraint) {
             $constraint->aspectRatio();
             $constraint->upsize();
         });

         $path = 'img/uploaded/';
         $img->save('storage/'.$path.$filename);
         // dd($img->__toString());
         Storage::put($path.$filename,$img->__toString());


         return '/storage/'.$path.str_replace(" ","%20",$filename);
     
             // Image::make($image->getRealPath())->resize(200, 200)->save($path);
             // $user->image = $filename;
             // $user->save();
        }
    }
}
