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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//
////电子邮箱登录或注册
//Route::resource('/library','Index\BookController');
////退出登录
//Route::get('/exit','Index\BookController@exit');
//
////电子邮箱验证
////Route::get('/logVerify','Student\EmailController@Verify');
////电子邮箱验证码验证
//Route::post('/codeVerify','Student\EmailController@codeVerify');
//
////admin
////登录处理
//Route::post('/admin/login','Admin\AdminLoginController@store');
//
////Admin后台
//Route::group(['middleware' => 'adminLogin','prefix' => 'admin','namespace' => 'Admin'],function (){
//    //admin 资源路由
//    Route::resource('/admin','AdminController');
//    //admin 退出
//    Route::get('/logout','AdminController@logout');
//    //seat 资源路由
//    Route::resource('/seat','SeatController');
//    //student 资源路由
//    Route::resource('/student','StudentController');
//    //record 统计
//    Route::post('/record','RecordController@index');
//
//});
//
////图书资源前台
//Route::group(['middleware' => 'libraryLogin','namespace' => 'Library'],function (){
//    //座位预约
//    Route::resource('/reserve','ReserveController');
//    //个人信息
//    Route::resource('/userInfo','UserInfoController');
//});
