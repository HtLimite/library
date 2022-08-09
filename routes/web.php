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
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

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
Route::resource('/library','Index\BookController');
//退出登录
Route::get('/exit','Index\BookController@exit');

//QQ邮箱验证
Route::get('/logVerify','Student\EmailController@Verify');

//Admin
//登录处理
Route::post('/admin/login','Admin\AdminLoginController@store');

//Admin后台
Route::group(['middleware' => 'adminLogin','prefix' => 'admin','namespace' => 'Admin'],function (){
    //admin 资源路由
    Route::resource('/admin','AdminController');
    //admin 退出
    Route::get('/logout','AdminController@logout');
    //seat 资源路由
    Route::resource('/seat','SeatController');
    //student 资源路由
    Route::resource('/student','StudentController');
    //record 统计
    Route::post('/record','RecordController@index');

});

//图书资源前台
Route::group(['middleware' => 'libraryLogin','namespace' => 'Library'],function (){
    //座位预约
    Route::resource('/reserve','ReserveController');
    //个人信息
    Route::resource('userInfo','UserInfoController');
});
