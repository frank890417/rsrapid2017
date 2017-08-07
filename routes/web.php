<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$langs = ["","cn","en","zh"];

// Route::get('/', function () {
//     return view('welcome');
// });
$website_routes=function(){
  Route::get('home','NewsController@index');
  Route::get('/', 'HomeController@index');
  Route::get('/tech/{id}', 'HomeController@index');
  Route::get('/tech/n/{name}', 'HomeController@index');
  Route::get('/about', 'HomeController@index');
  Route::get('/news', 'HomeController@index');
  Route::get('/news/{id}', 'HomeController@index');
  Route::get('/news/cata/{name}', 'HomeController@index');
  Route::get('/news/n/{name}', 'HomeController@index');
  Route::get('/solution/n/{title}', 'HomeController@index');
  Route::get('/solution/{id}', 'HomeController@index');
  Route::get('/solution', 'HomeController@index');
  Route::get('/job', 'HomeController@index');
  Route::get('/contact', 'HomeController@index');
  Route::get('/contact/{id}', 'HomeController@index');
  Route::get('/search', 'HomeController@index');
  Route::get('/tern', 'HomeController@index');

};
 
// Route::get("/lang/{locale}", function ($locale) {
//     App::setLocale($locale);
// });
//set lang route

// $domains=[
//   'www.rsrapid2017.dev',
//   'rsrapid2017.dev',
//   'en.rsrapid2017.dev',
//   'zh.rsrapid2017.dev',
//   'cn.rsrapid2017.dev',

//   'rapidsuretech.com',
//   'www.rapidsuretech.com',
//   'en.rapidsuretech.com',
//   'zh.rapidsuretech.com',
//   'cn.rapidsuretech.com',


//   'manage.rapidsuretech.com',
//   'www.rapidsuretech.com',
//   'en.manage.rapidsuretech.com',
//   'zh.manage.rapidsuretech.com',
//   'cn.manage.rapidsuretech.com'

// ];

// foreach ($domains as $key => $value) {
  
// }
// Route::group(['middleware'=>['lang','seoinfo'] ],$website_routes);

Auth::routes();
$manage_routes=function(){
  Route::get('/manage/',"ManageController@content");
  Route::get('/manage/news','NewsController@index');

  Route::resource('/manage/news','NewsController');
  Route::resource('/manage/question','QuestionController');
  Route::resource('/manage/solution','SolutionController');
  Route::resource('/manage/about','YearlogController');

  Route::resource('contact_record','Contact_recordController');
  Route::post('/manage/yearlog/saveall','YearlogController@saveall');

  Route::get('/manage/content',"ManageController@content");
  Route::get('/manage/tern',"ManageController@tern");
  Route::get('/manage/job',"ManageController@job");
  Route::get('/manage/tech',"ManageController@tech");
  Route::get('/manage/contactrecord',"ManageController@contactrecord");
  Route::get('/manage/detail_info',"ManageController@detail_info");


};

foreach ($langs as $key => $lang) {
  Route::group(['prefix' => $lang ,'middleware'=>['lang:'.$lang,'seoinfo:'.$lang] ],$website_routes);
  Route::group(['prefix' => $lang ,'middleware'=>'auth','middleware'=>'lang:'.($lang==""?"zh":$lang)],$manage_routes);
}

// Route::prefix("zh")->middleware(['seoinfo','lang'])->group($website_routes);
// Route::prefix("cn")->middleware(['seoinfo','lang'])->group($website_routes);





Route::get('/{any}/{anyt?}/{anyd?}', function(){
  return redirect("/");
});

// App::missing(function($exception)
// {
//     return redirect("/");
//     // return Response::view('errors.missing', array(), 404);
// });