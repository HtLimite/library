<?php

namespace App\Http\Controllers\Student;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//学生注册控制器
class RegController extends Controller
{
    //学生注册验证方法
    public function store(Request $request){
        //接受post提交的字符串
        $str = $request->post('str');
        //字符串变数组
        parse_str($str,$arr);
        //表单验证规则
        $rule = [
            //必填|唯一性|数字|十一位学号
            'account' => ['required','unique:student','integer','regex:/^\d{11}$/'],
            'email' => 'required|email|unique:student',
            'password' => 'required|between:7,14|same:repass',
        ];
        //表单验证提示信息
        $message = [
            'account.required' => '请输入学号!',
            'account.unique' => '该学号已经被注册!',
            'account.integer' => '学号必须是数字!',
            'account.regex' => '学号位数不正确!',
            'email.required' => '必须使用QQ邮箱注册!',
            'email.email' => '邮箱格式不正确!',
            'email.unique' => '该邮箱已经被注册!',
            'password.required' => '请输入密码!',
            'password.same' => '两次密码不一致!',
            'password.between' => '密码长度不在7-14位之间',
        ];
        //使用laravel表单验证验证
        $validator = Validator::make($arr,$rule,$message);
        //开始验证
        //如果验证通过
        if($validator->passes()) {
            //添加到数据库
            unset($arr['repass']);
            $arr['reg'] = time();
            $arr['status'] = 1;
            //调用邮件类
            $qqEmail = new EmailController();
            //调用邮件类,发送邮件方法
            $emailResult = $qqEmail->index($arr['email']);
            if($emailResult['code'] == 1){
                //邮箱发送成功 3
                $emailStatus = array('email' => 1);
            }else{
                $emailStatus ['email' ] = 0;
            }
            //邮件类获取验证码,验证过期时间
            $arr['verification_code'] = $qqEmail->code;
            $arr['verification_expire'] = $qqEmail->expireTime;
            //密码加密哈希
            $arr['password'] = Hash::make($arr['password']);
            //默认未激活
            $arr['is_verification'] = 0;
            //插入数据库
            if(DB::table('student')->insert($arr)) {
                $emailStatus['reg'] = 1 ;
                return $emailStatus;
            }
        }else{
            //具体查看laravel核心类
            return $validator->getMessageBag()->getMessages();
        }
    }
}
