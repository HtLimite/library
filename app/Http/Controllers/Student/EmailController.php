<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    var $code;
    var $expireTime;
    //发送qq邮箱
    public function index( $email1): array
    {
        $email = $email1;
        $this->code = rand(0000000,9999999);
        $this->expireTime = Carbon::now()->addHour(2);
        Mail::send("student.send-email", ["code" => $this->code, "expireTime" => $this->expireTime, "email" => $email], function (Message $message) use ($email) {
            $message->to($email);
            $message->subject("Reiki——邮箱验证");
        });
        if (Mail::failures()) {
            return ["code" => 0, "msg" => "warning"];
        } else {
            return ["code" => 1, "msg" => "success"];
        }
    }

    //验证邮箱
    public function verify(Request $request){
        $arr = $request->all();
        if(!$request->has(['code','email'])){
            $this->failed("警告!!!非法访问!");
            exit;
        }
        $user = DB::table('student')->where('email', $arr['email'])->first();
        //用户是否存在
        if(empty($user)){
            $this->failed("警告!!!非法访问!");
            exit;
        }
        if($user->verification_code == $arr['code']){
            $nowTime = Carbon::now();
            //验证时间是否过期
                //解析时间为Carbon对象
            $expire = Carbon::parse( $user->verification_expire);
            //验证是否时间过期
            if($expire->gte($nowTime))
            {
                //验证是否已经激活
                if ($user->is_verification == 0)
                {
                    $user->is_verification = 1;
                    DB::table('student')->update((array)$user);
                    return view('student.verify', ['email' => $user->email, 'verify' => $user->is_verification]);
                }
                return view('student.verify', ['email' => $user->email]);
            } else{
                //时间过期,账号注册清理记录
                DB::table('student')->where('id',$user->id)->delete();
                $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>验证时间已过期!</div>";
                echo $str;
            }
        }else{
            $this->failed("此链接已失效,请查看最新邮件");
        }
        return 1;
    }
    //链接失效方法
    public function failed($message){
        $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>$message</div>";
        echo $str;
    }
}









