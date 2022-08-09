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
        return view('Admin.seat',['seat' => $seat,'totSeat' => $totSeat]);
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
