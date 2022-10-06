<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use function back;
use function redirect;
use function session;

class AdminLoginController extends Controller
{
    //admin 登录处理
    public function store(){
        if (!isset($_POST['account']) || !isset($_POST['password'])) {
            return response([
                'msg' => '无效的账号或密码'
            ],403);
        }
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


        return redirect('/admin/admin');
    }
}
