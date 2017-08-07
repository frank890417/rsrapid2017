<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$langs = ["","cn","en","zh"];


Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

$apiRoutes = function(){
  Route::get('news',"ApiController@news");
  Route::get('questions',"ApiController@questions");
  Route::get('solutions',"ApiController@solutions");
  Route::get('yearlogs',"ApiController@yearlogs");
  Route::post('questions',"ApiController@update_all_yearlogs");
  Route::post('upload',"ApiController@upload_image");

  Route::get("websiteinfo/key/{key}","ApiController@websiteinfo");
  Route::post("websiteinfo/key/{key}","ApiController@websiteinfo_save");
};


foreach ($langs as $key => $lang) {
  Route::group(['prefix' => $lang ,'middleware'=>'cors','middleware'=>'lang:'.$lang],$apiRoutes);  
}

