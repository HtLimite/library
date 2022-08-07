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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
////学生登陆页面
//Route::get('/','Student\LoginController@index');
//
////注册
//Route::post('/reg','Student\RegController@store');
////邮箱
//Route::get('/email','Student\EmailController@index');
//Route::get('/verify','Student\EmailController@verify');
//
////登录
//Route::post('/log','Student\LoginController@store');
//
////忘记密码
//Route::post('/forget','Student\ForgetController@store');
//
//Route::group(['namespace' => 'Student','prefix' => 'student','middleware' => 'studentLogin'],function (){
//
////    学生信息页面
//    Route::resource('/index','DisplayController');
//
//});


//QQ邮箱登录或注册
Route::resource('/library','BookController');
//退出登录
Route::get('/exit','BookController@exit');

//QQ邮箱验证
Route::get('/logVerify','Student\EmailController@Verify');



//图书资源
Route::group(['middleware' => 'Library'],function (){
    //座位预约
    Route::resource('/reserve','ReserveController');
    //个人信息
    Route::resource('userInfo','UserInfoController');
});
