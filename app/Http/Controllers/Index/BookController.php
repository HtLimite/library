<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Student\EmailController;
use App\Model\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;


class BookController extends Controller
{
    // | POST      | library                    | library.store 登录注册
    public function store(Request $request): array
    {
        //获取qq邮箱
        $Email = $request->all();
        //查询是否存在邮箱
        $user = new Library();
        $user1 = $user->where('email', $Email['email'])->first();
        if (empty($user1)) {
            //注册
            //注册时间
            $user->reg = time();
            //调用邮箱注册
            $regEmail = new EmailController();
            $resul = $regEmail->index($Email['email'], "library.email", 0);
            if(!$resul){
                return ['code'=>0];
            }
            //邮件类获取验证码,验证过期时间
            $user->verification_code = $regEmail->codeN;
            $user->verification_expire = $regEmail->expireTime;
            //默认激活
            $user->is_verification = 1;
            $user->email = $Email['email'];
            //存入数据库
            $user->save();
            return ['code' => 2];
        } else {
            //登录
            //限制登录时间间隔
            if (time() - $user1->log < 30) {
                //登陆时间小于30s 返回 3
                return ['code' => 3];
            }
            $regEmail = new EmailController();
            $regEmail->index($Email['email'], "library.email", 1);
            //邮件类获取验证码,验证过期时间
            $user1->verification_code = $regEmail->codeN;
            $user1->verification_expire = $regEmail->expireTime;
            $user1->log = time();
            $user1->save();

            return ['code'=>1,'avatar' => $user1->avatar];
        }
    }

    //| GET|HEAD  | library                    | library.index 首页方法
    public function index()
    {
        //首页
        return view('library.index');

    }

    //自定义  exit                                |退出登录方法
    public function exit(Request $request)
    {
        $request->session()->flush();
        return redirect('/library');
    }

    // GET|HEAD  | library/create             | library.create
    public function create(Request $request)
    {

    }

    // | PUT|PATCH | library/{library}          | library.update
    public function update(){



    }



    // | GET|HEAD  | library/{library}          | library.show  座位展示
    public function show(Request $request)
    {
        //获取ajax请求状态 status
        $status = $request->get('status');

        //获取ajax请求页数 page
        $page = $request->get('page');
        if (empty($page)) {
            //初始值
            $page = 1;
        }
        //筛选ajax请求数据库操作
        if (!empty($status)) {
            //初始值
            //获取总数据数
            switch ($status) {
                case ("weishiyong"):
                    $status = "未使用";
                    break;
                case ("yuyuezhong"):
                    $status = "预约中";
                    break;
                case ("yiyuyue"):
                    $status = "已预约";
                    break;
                case ("shiyongzhong"):
                    $status = "使用中";
                    break;
                case ("likai"):
                    $status = "离开";
                    break;
                default:
                    $status;
            }
            //更新 已结束 初始化

            //获取 status 种类总数目
            $count = DB::table('seat')->where('status', $status)->count();

            //设置每一页 展示数据
            $pageNum = 50;
            //总页数
            $pageTot = ceil($count / $pageNum);
            //数据偏移
            $offset = ($page - 1) * $pageNum;
            //种类 status 数据库查询记录
            $seatInfo = DB::table('seat')->where('status',$status)->offset($offset)
                ->limit($pageNum)->get();
            if (empty($seatInfo)) {
                return 0;
            } else {
                return view('library.seatStatus', [
                    'seatInfo' => $seatInfo,
                    'count' => $count,
                    'pageTot' => $pageTot,
                    'page' => $page,
                    'status' => $status]);
            }

        }

        //获取总数据数
        $count = DB::table('seat')->count();
        //设置每一页 展示数据
        $pageNum = 50;
        //总页数
        $pageTot = ceil($count / $pageNum);
        //数据偏移
        $offset = ($page - 1) * $pageNum;
        //数据库查询记录
        $seatInfo = DB::table('seat')->offset($offset)
            ->limit($pageNum)->get();
        if (empty($seatInfo)) {
            return 0;
        } else {
            return view('library.seat', [
                'seatInfo' => $seatInfo,
                'count' => $count,
                'pageTot' => $pageTot,
                'page' => $page]);
        }

    }


    //| DELETE    | library/{library}          | library.destroy
    public function destroy(Request $request)
    {

    }
    // | GET|HEAD  | library/{library}/edit     | library.edit 搜索
    public function edit(Request $request){
        //获取搜索值
        $result = $request->get('value');
        //获取展示页数
        $page = $request->get('page');
        $array= DB::select("select id,name,student,status,reserve from seat where
                                            id like '%$result%'
                                       or name like '%$result%'
                                       or student like '%$result%'
                                       or status like '%$result%'
                                       or reserve like '%$result%' ");
        $count = count($array);
        //设置每一页 展示数据
        $pageNum = 50;
        //总页数
        $pageTot = ceil($count / $pageNum);
        //数据偏移
        $offset = ($page - 1) * $pageNum;
        $pageArray = array_slice($array,$offset,50,true);
        $pageArray = (object)$pageArray;


        return view('library.search', [
            'seatInfo' => $pageArray,
            'count' => $count,
            'pageTot' => $pageTot,
            'page' => $page,
            'value' => $result]);

    }

}
