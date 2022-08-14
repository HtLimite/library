<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
    public $code;
    public $codeN;
    public $expireTime;
    //发送qq邮箱 qq邮箱 邮箱模板 状态(登录/注册)
    public function index($email1, $view, $status): array
    {
        $email = $email1;
        //$this->code = rand(0000000, 9999999);
        $code = md5($email.time());
        $codeN = rand(0000000, 9999999);
        $this->codeN = $codeN;

        $expireTime = Carbon::now()->addHour(2);
        $this->expireTime = $expireTime;
        $this->code = $code;
        /*视图 参数  发件人邮箱地址*/
        Mail::send($view, ["code" => $code,"codeN" => $codeN, "expireTime" => $expireTime, "status" => $status, "email" => $email], function (Message $message) use ($email) {
            $message->to($email);
            $message->subject("Reiki Email");
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
        if (!$request->has(['code', 'email',])) {
            $this->failed("警告!非法访问,不要试图挑战图书馆权威!");
            exit;
        }
//        //链接验证
//        $code = session('_token');
//        //是否为有效链接
//        if ($code != $arr['_token']) {
//            $this->failed("警告!非法访问,不要试图挑战图书馆权威!");
//            exit;
//        }

        $user = DB::table('student')->where('email', $arr['email'])->first();
        //用户是否存在
        if (empty($user)) {
            $this->failed("警告!非法访问,不要试图挑战图书馆权威!");
            exit;
        }
        //有效链接 数据库验证
        if ($user->verification_code == $arr['code']) {
            $nowTime = Carbon::now();
            //验证时间是否过期
            //解析时间为Carbon对象
            $expire = Carbon::parse($user->verification_expire);
            //验证是否时间过期
            if ($expire->gte($nowTime)) {
                //未过期
                //存入session
                session(['email' => $user->email]);
                //student 激活
                if (empty($arr['login'])){
                    if( $user->is_verification == 0) {
                        //激活
                        $user->is_verification = 1;
                        DB::table('student')->update((array)$user);
                        return view('student.verify', ['email' => $user->email, 'verify' => $user->is_verification]);
                    }
                    return view('student.verify', ['email' => $user->email]);
                }
                //登录用户
                if($arr['login'] == 1 && $user->is_verification == 1){
                    //重定向到首页
                    return redirect('/library');
                }
                //注册用户
                if($arr['login'] == 0 && $user->is_verification == 1) {
                    return view('library.verify',['email' => $user->email]);
                }

            } else {
                //时间过期,账号注册清理记录
                DB::table('student')->where('id', $user->id)->delete();
                $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>验证时间已过期!</div>";
                echo $str;

            }
        } else {
            $this->failed("此链接已失效,请查看最新邮件");
        }
        exit;
    }

    //链接失效方法
    public function failed($message)
    {
        $str = "<div style='height: 100vh;line-height: 100vh;text-align: center;'>$message</div>";
        echo $str;
    }
    //qq验证码验证
    public function codeVerify(Request $request)
    {
        $code = $request->all();
        $user = DB::table('student')->where('email', $code['codeEmail'])->first();
        if($user->is_verification == 0){
            //账号禁用
            return response()->json([
                'code' => 'disabled',
                'status' => 423
            ]);
        }
        //验证码
        if ($user->verification_code == $code['code']) {
            $nowTime = Carbon::now();
            //验证时间是否过期
            //解析时间为Carbon对象
            $expire = Carbon::parse($user->verification_expire);
            //验证是否时间过期
            if ($expire->gte($nowTime)) {
                //未过期
                //记录登陆时间
                $log = time();
                DB::table('student')->updateOrInsert(['email' => $code['codeEmail']],['log' => $log]);
                //存入session
                session(['email' => $user->email]);
                return response()->json([
                    'code' => 'success',
                    'status' => 200
                ]);
            }
            }else{
            return response()->json([
                'code' => 'error',
                'status' => 403
            ]);
            }
        }

}









