<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //登陆页面
    public function index(Request $request){
        //判断是否已经登录
        if($request->session()->has('account')){

//            return redirect('/student/index');
        }
        return view('student.login');
    }
    //登录验证
    public function store(Request $request): int
    {
        //登录验证
        //接受post提交的字符串
        $str = $request->post('str');
        //字符串变数组
        parse_str($str, $arr);
        $logTime['log'] = time();
        $acc = DB::table('student')->where('account', $arr['account'])->exists();
        if ($acc) {
            $account = DB::table('student')->where('account', $arr['account'])->first();
            //验证是否邮箱激活
            if($account->is_verification == 0){
                return 3;
            }
            //验证密码是否正确
            if (Hash::check($arr['password'], $account->password)) {
                // 密码匹配
                //记录登陆时间
                DB::table('student')->where('account', $account->account)->update($logTime);
                //存入session
                session(['account' => $account->account]);

                return 1;
            } else {
                return 0;
            }
        }
        return 2;
    }
}
