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
 
Route::get("/lang/{locale}", function ($locale) {
    App::setLocale($locale);
});
//set lang route

$domains=[
  'rsrapid2017.dev',
  'en.rsrapid2017.dev',
  'zh.rsrapid2017.dev',
  'cn.rsrapid2017.dev',

  'rapidsuretech.com',
  'en.rapidsuretech.com',
  'zh.rapidsuretech.com',
  'cn.rapidsuretech.com',


  'manage.rapidsuretech.com',
  'en.manage.rapidsuretech.com',
  'zh.manage.rapidsuretech.com',
  'cn.manage.rapidsuretech.com'

];

foreach ($domains as $key => $value) {
  Route::group(['domain'=>$value,'middleware'=>['lang','seoinfo'] ],$website_routes);
}

// Route::prefix("zh")->middleware(['seoinfo','lang'])->group($website_routes);
// Route::prefix("cn")->middleware(['seoinfo','lang'])->group($website_routes);
Route::group(['middleware'=>'auth'],function(){
  Route::get('manage/',function(){
    return view("manage.content");
  });
  Route::get('manage/news','NewsController@index');

  Route::resource('manage/news','NewsController');
  Route::resource('manage/question','QuestionController');
  Route::resource('manage/solution','SolutionController');
  Route::resource('manage/about','YearlogController');

  Route::resource('contact_record','Contact_recordController');
  Route::post('manage/yearlog/saveall','YearlogController@saveall');
  Route::get('manage/content',function(){
    return view("manage.content");
  });
  Route::get('manage/tern',function(){
    return view("manage.tern");
  });
  Route::get('manage/job',function(){
    return view("manage.job");
  });
  Route::get('manage/tech',function(){
    return view("manage.tech");
  });
  Route::get('manage/contactrecord',function(){
    return view("manage.contactrecord");
  });
  Route::get('manage/detail_info',function(){
    return view("manage.detail_info");
  });


});


Auth::routes();


Route::get('/{any}/{anyt?}/{anyd?}', function(){
  return redirect("/");
});

