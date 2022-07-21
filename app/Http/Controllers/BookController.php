<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Student\EmailController;
use App\Model\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // | POST      | library                    | library.store




    //| GET|HEAD  | library                    | library.index 首页方法
    public function index(){

        return view('library.index');
    }


    // GET|HEAD  | library/create             | library.create
    public function create(Request $request){
        $email = $request->all();
        dd($email);
    }




    // | PUT|PATCH | library/{library}          | library.update




    // | GET|HEAD  | library/{library}          | library.show 登录注册
    public function show(Request $request){
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
            return 0;

        }else{
            //登录
            $regEmail = new EmailController();
            $regEmail->index($Email['email'],"library.email",1);

            DB::table('student')->where('email',$Email['email'])->update(['log'=>time()]);
            return 1;
        }
    }





    //| DELETE    | library/{library}          | library.destroy
    // | GET|HEAD  | library/{library}/edit     | library.edit
}
