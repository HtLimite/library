<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class EmailController extends Controller
{

    //发送qq邮箱 qq邮箱 邮箱模板 状态(登录/注册)
    public function index($email1, $view, $status): array
    {
        static $code ;
        $email = $email1;
        //$this->code = rand(0000000, 9999999);
        $code = md5(time());
        //存入session 用于验证
        session()->put('code',$code);
        $expireTime = Carbon::now()->addHour(2);

        Mail::send($view, ["code" => $code, "expireTime" => $expireTime, "status" => $status, "email" => $email], function (Message $message) use ($email) {
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
    public function verify(Request $request)
    {
        $arr = $request->all();
        if (!$request->has(['code', 'email'])) {
            $this->failed("警告!!!非法访问!");
            exit;
        }
        $user = DB::table('student')->where('email', $arr['email'])->first();
        //用户是否存在
        if (empty($user)) {
            $this->failed("警告!!!非法访问!");
            exit;
        }
        if ($user->verification_code == $arr['code']) {
            $nowTime = Carbon::now();
            //验证时间是否过期
            //解析时间为Carbon对象
            $expire = Carbon::parse($user->verification_expire);
            //验证是否时间过期
            if ($expire->gte($nowTime)) {
                //验证是否已经激活
                if ($user->is_verification == 0) {
                    $user->is_verification = 1;
                    DB::table('student')->update((array)$user);
                    return view('student.verify', ['email' => $user->email, 'verify' => $user->is_verification]);
                }
                return view('student.verify', ['email' => $user->email]);
            } else {
                //时间过期,账号注册清理记录
                DB::table('student')->where('id', $user->id)->delete();
                $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>验证时间已过期!</div>";
                echo $str;

            }
        } else {
            $this->failed("此链接已失效,请查看最新邮件");
        }
        return 1;
    }

    //链接失效方法
    public function failed($message)
    {
        $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>$message</div>";
        echo $str;
    }


    //登录验证
    public function logVerify(Request $request)
    {
        $result = $request->all();

        $code = (session()->get('code'));
        //是否为有效链接
        if ($code === $result['code']) {
            //注册成功
            return view('/library.index')->with('status', 1);
        } else {
            $this->failed("警告!非法访问,不要试图挑战图书馆权威!");
        }
    }
}









