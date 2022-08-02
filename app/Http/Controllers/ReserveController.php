<?php

namespace App\Http\Controllers;

use DateTime;
use http\Exception\BadMessageException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Exception\PcreException;

class ReserveController extends Controller
{
    //| GET|HEAD  | reserve                | reserve.index
    public function index()
    {

    }

    //| POST      | reserve                | reserve.store


    //| GET|HEAD  | reserve/create         | reserve.create   预约
    public function create(Request $request)
    {
        $timeData = $request->all();
        //解析时间 格式化
        $format = 'H:i';
        $beginTime = DateTime::createFromFormat($format, $timeData['beginTime']);
        $endTime = DateTime::createFromFormat($format, $timeData['endTime']);
        if(!$beginTime || !$endTime ){
            return 0;
        }
        //更新座位信息
        $message = DB::table('seat')->where('id', $timeData['id'])->update([
            'beginTime' => $beginTime,
            'endTime' => $endTime,
            'status' => "已预约",
            'student' => session('email')
        ]);

        if ($message) {
            //预约成功
            return [1, session('email')];
        }
        return 0;
    }

    //| GET|HEAD  | reserve/{reserve}      | reserve.show  我的信息
    public function show($email)
    {
        //查询数据库展示
        $mySeatInfo = DB::table('seat')->where('student', $email)->first();
        if (empty($mySeatInfo)) {
            //无预约信息
            return 0;
        }

        //反解析时间 格式化
        $format = 'Y-m-d H:i:s';
        $beginTime = DateTime::createFromFormat($format, $mySeatInfo->beginTime);
        $endTime = DateTime::createFromFormat($format, $mySeatInfo->endTime);
        $mySeatInfo->beginTime = $beginTime->format('H:i');
        $mySeatInfo->endTime = $endTime->format('H:i');


        return view('library.mySeatInfo', ['mySeatInfo' => $mySeatInfo]);
    }


    //| PUT|PATCH | reserve/{reserve}      | reserve.update
    //| DELETE    | reserve/{reserve}      | reserve.destroy
}
