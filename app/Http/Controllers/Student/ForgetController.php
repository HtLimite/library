<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgetController extends Controller
{
    //验证忘记密码
    public function store(Request $request)
    {
        $arr = $request->all();
        //字符串解析数组
        parse_str($arr['str'],$arr);
        //验证账号邮箱是否正确
        $user = DB::table('student')->where([
            ['account' , $arr['account']],
            ['email' , $arr['email']]
        ])->first();
         if(!empty($user)){
             if(Hash::check($arr['password'],$user->password)) {
                //Hash加密
                $arr['new-password'] = Hash::make($arr['new-password']);
                //更新密码
                DB::table('student')->where('account',$user->account)->update(['password' => $arr['new-password']]);
                return 1;
             }
             //密码错误 0
             return 0;
         }
          //账户 或 邮箱错误  2
        return 2;
    }
}
