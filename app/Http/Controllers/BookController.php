<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Student\EmailController;
use App\Model\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // | POST      | library                    | library.store 登录注册
    public function store(Request $request): int
    {
        //获取qq邮箱
        $Email = $request->all();
        //查询是否存在邮箱
        $user = new Library();
        $count = $user->where('email',$Email['email'])->count();
        if($count == 0){
            //注册
            //注册时间
            $user->reg = time();
            $user->log = time();
            //调用邮箱注册
            $regEmail = new EmailController();
            $regEmail->index($Email['email'],"library.email",0);
            //存入数据库
            $user->email = $Email['email'];
            $user->save();
            //存入session
            session(['email'=> $Email['email']]);
            return 2;

        }else{
            //登录
            //限制登录时间间隔
            $logtime = $user->where('email',$Email['email'])->first();
            if( time() - $logtime->log < 30){
                //登陆时间小于30s 返回 3
                return 3;
            }
            $regEmail = new EmailController();
            $regEmail->index($Email['email'],"library.email",1);


            DB::table('student')->where('email',$Email['email'])->update(['log'=>time()]);
            session(['email'=> $Email['email']]);
            return 1;
        }
    }

    //| GET|HEAD  | library                    | library.index 首页方法
    public function index(){
        //首页
        //登录用户展示座位信息
        $seatIfo = DB::table('seat')->paginate(20);
        return view('library.index',['seatInfo' => $seatIfo]);
    }

    //exit 退出登录方法
    public function exit(Request $request){
        $request->session()->flush();
        return redirect('/library');
    }

    // GET|HEAD  | library/create             | library.create
    public function create(Request $request){

    }




    // | PUT|PATCH | library/{library}          | library.update




    // | GET|HEAD  | library/{library}          | library.show  座位展示
    public function show(Request $request){
        $statu = $request->get('statu');
        $seatIfo = DB::table('seat')->paginate(10);
        return view('library.index',['seatInfo' => $seatIfo]);
    }





    //| DELETE    | library/{library}          | library.destroy
    public function destroy(Request $request){

    }
    // | GET|HEAD  | library/{library}/edit     | library.edit
}
