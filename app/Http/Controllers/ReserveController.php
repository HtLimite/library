<?php

namespace App\Http\Controllers;

use DateTime;
use http\Exception\BadMessageException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Exception\PcreException;

class ReserveController extends Controller
{
    //| GET|HEAD  | reserve                | reserve.index
    public function index()
    {

    }

    //| POST      | reserve                | reserve.store   预约
    public function store(Request $request){
        $timeData = $request->all();
        //解析时间 格式化
        $format = 'H:i';
        $beginTime = DateTime::createFromFormat($format, $timeData['beginTime']);
        $endTime = DateTime::createFromFormat($format, $timeData['endTime']);
        $updated_at = Date::now();
        if(!$beginTime || !$endTime ){
            return 0;
        }
        //更新座位信息
        $message = DB::table('seat')->where('id', $timeData['id'])->update([
            'beginTime' => $beginTime,
            'endTime' => $endTime,
            'status' => "已预约",
            'student' => session('email'),
            'updated_at' => $updated_at
        ]);

        if ($message) {
            //预约成功
            return [1, session('email')];
        }
        return 0;
}


    //| GET|HEAD  | reserve/create         | reserve.create
    public function create(Request $request)
    {

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
        //更新我的预约状况
        $nowT = Date::now();
        if($nowT >= $mySeatInfo->beginTime && $nowT <= $mySeatInfo->endTime && $mySeatInfo->status != '离开'){
            $status = '使用中';
        }else if ($nowT > $mySeatInfo->endTime){
            $status = '已结束';
        }else{
            $status = '已预约';

        }
        $update = DB::table('seat')->where('id',$mySeatInfo->id)->update(['status' => $status]);



        //反解析时间 格式化
        $format = 'Y-m-d H:i:s';
        $beginTime = DateTime::createFromFormat($format, $mySeatInfo->beginTime);
        $endTime = DateTime::createFromFormat($format, $mySeatInfo->endTime);
        $mySeatInfo->beginT = $beginTime->format('H:i');
        $mySeatInfo->endT = $endTime->format('H:i');


        return view('library.mySeatInfo', ['mySeatInfo' => $mySeatInfo]);
    }


    //| PUT|PATCH | reserve/{reserve}      | reserve.update   暂时离开
    public function update($id): int
    {

        $result = DB::table('seat')->where('id',$id)->update(['status'=>'离开']);
        if(!$result){
            if(DB::table('seat')->where('id',$id)->update(['status'=>'使用中'])){
                //使用状态
                return 2;
            }
            //失败
            return 0;
        }
        //离开状态
        return 1;
    }


    //| DELETE    | reserve/{reserve}      | reserve.destroy  结束预约
    public function destroy($id): int
    {
        //清空座位预约
        $result = DB::table('seat')->where('id',$id)->update([
            'student'=> null,
            'beginTime' => null,
            'endTime' => null,
            'status'=>'未使用']);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
}
