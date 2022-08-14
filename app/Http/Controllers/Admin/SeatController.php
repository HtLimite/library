<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    //| GET|HEAD  | admin/seat                    | seat.index   首页
    public function index()
    {
        $totSeat=\DB::table('seat')->count();
        $seat = \DB::table('seat')->paginate(10);
        return view('admin.seat',['seat' => $seat,'totSeat' => $totSeat]);
    }
    //        | GET|HEAD  | seat/create             | seat.create  添加
    public function create(Request $request)
    {
        $str = $request->get('str');
        //表单数组化
        parse_str($str,$arr);
        $arr['status'] = '未使用';
        if(!DB::table('seat')->insert($arr)){
           return 0;
        }
        return 1;
    }

    //        | GET|HEAD  | seat/{admin}            | admin.show  搜索/分页
    public function show(Request $request)
    {

        $searText = $request->get('searText');
        $page = $request->get('page');
        //模糊查询
        $results = DB::table('seat')->where('id','like','%'.$searText.'%')
            ->orWhere('name','like','%'.$searText.'%')
            ->orWhere('student','like','%'.$searText.'%')
            ->orWhere('status','like','%'.$searText.'%')
            ->orWhere('reserve','like','%'.$searText.'%')
            ->get()->toArray();
        $count = count($results);
        //设置每一页 展示数据
        $pageNum = 10;
        //总页数
        $pageTot = ceil($count / $pageNum);
        //数据偏移
        $offset = ($page - 1) * $pageNum;
        $pageArray = array_slice($results,$offset,10,true);

        return view('admin.search_seat',[
            'result' => $pageArray,
            'searText' => $searText,
            'pageTot' => $pageTot,
            'page' => $page,
            'total' => $count]);
    }

    //        | DELETE    | seat/{admin}            | seat.destroy  删除
    public function destroy($idArr)
    {
        //批量删除
        if(DB::delete("delete from seat where id in ($idArr)")){
            return 1;
        }else{
            return 0;
        }
    }

}
