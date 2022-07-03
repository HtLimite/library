<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    //发送qq邮箱
    public function index( $email1): array
    {
//        $email = $request->input();
//        $email = [$email1];

//        $rule = [
//            'email' => 'required|email',
//        ];
//        $message = [
//            'email.required' => '必须使用QQ邮箱注册!',
//            'email.email' => '邮箱格式不正确!',
//        ];
//        $validator = Validator::make($email,$rule,$message);
//        $email = $request->input('email');
        $email = $email1;
//        if($validator->passes()){
            $code = rand(000000,999999);
//            $expireTime = Carbon::now()->addDay();
            Mail::send("student.send-email", ["code" => $code, "email" => $email], function (Message $message) use ($email) {
                $message->to($email);
                $message->subject("Reiki——邮箱验证");
            });
            if (Mail::failures()) {
                return ["code" => 0, "msg" => "warning"];
            }else{
                return ["code" => 1, "msg" => "success"];
            }

//        }
//        return $validator->getMessageBag()->getMessages();
    }

    //验证邮箱
    public function verify(Request $request){



    }
}









