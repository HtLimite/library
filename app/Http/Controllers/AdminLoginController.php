<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    //Admin 登录处理
    public function store(){
        $account = $_POST['account'];
        $password = $_POST['password'];
        $admin = DB::table('admin')->first();
        //账号 密码 一个用户
        if($account != $admin->account || $password != $admin->password ){
            //错误重定向
            return back()->with('error','管理员登录失败!');
        }
        if( $admin->is_login === 1){
            //错误重定向
            return back()->with('error','管理员账号已在别处登录!');
        }
        if(!DB::table('admin')->where('account',$admin->account)->update(['is_login' => 1])){
            //错误重定向
            return back()->with('error','管理员登录错误!');
        }
        //存入session
        session(['adminInfo' => $admin->account]);
        return redirect('admin/');
    }
}
