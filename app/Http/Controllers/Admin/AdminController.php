<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;

//Admin处理
class AdminController extends Controller
{
//        | GET|HEAD  | admin                    | admin.index   首页
public function index(){
    $totA=\DB::table('admin')->count();
    $admin = \DB::table('admin')->paginate(10);
    return view("Admin.index",[
        'totA' => $totA,
        'admin' => $admin,
    ]);
}


//        | POST      | admin                    | admin.store




//        | GET|HEAD  | admin/create             | admin.create
//        | DELETE    | admin/{admin}            | admin.destroy
//        | PUT|PATCH | admin/{admin}            | admin.update
//        | GET|HEAD  | admin/{admin}            | admin.show
//        | GET|HEAD  | admin/{admin}/edit       | admin.edit

//        | GET|HEAD  | admin/logout       | admin.logout   退出
public function logout(Request $request){
    DB::table('admin')->where('account',session('adminInfo'))->update(['is_login' => 0]);
    $request->session()->forget('adminInfo');
    return redirect('/library');

}
}
