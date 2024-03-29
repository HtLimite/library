<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use function session;
use function view;

class ReserveController extends Controller
{
    //| GET|HEAD  | reserve                | reserve.index  查询预约信息
    public function index(Request $request)
    {
        $email = $request->get('email');
        $mySeatInfo = DB::table('seat')->where('student', $email)->exists();
        if(!$mySeatInfo){
            //不存在预约
            return 0;
        }else{
            return 1;
        }


    }

    //| POST      | reserve                | reserve.store   预约
    public function store(Request $request)
    {
        $timeData = $request->all();
        //解析时间 格式化
        $format = 'H:i';
        $beginTime = DateTime::createFromFormat($format, $timeData['beginTime']);
        $endTime = DateTime::createFromFormat($format, $timeData['endTime']);
        $updated_at = Date::now();
        if (!$beginTime || !$endTime) {
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
            //记录用户预约信息
            $record = DB::table('record')->where('email', session('email'))->first();
            $differT = strtotime($timeData['endTime']) - strtotime($timeData['beginTime']);
            if (empty($record)) {
                //首次记录 初始化
                $recordData = array(
                    'email' => session('email'),
                    'total_num' => 1,
                    'total_time' => $differT,
                    'integrity' => 0,
                    'total_day' => 1
                );

            } else {
                $recordData = array(
                    'total_num' => 1 + $record->total_num,
                    'total_time' => $differT + $record->total_time,
                    'integrity' => 1 + $record->integrity,
                    'total_day' => 1 + $record->total_day
                );
            }
            //存入record表
            $recordResult = DB::table('record')->updateOrInsert(['email' => session('email')], $recordData);
            if (!$recordResult) {
                //记录失败
            }
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
        //预约人信息
        $studentInfo = DB::table('student')->where('email', $email)->first();
//        dd($studentInfo);
        //预约记录
        $record = DB::table('record')->where('email', $email)->first();
        //事件处理
        if(!empty($record)){
            //小时转化
            $record->total_time = ($record->total_time)/3600;
        }
        if (empty($mySeatInfo) || empty($record)) {
            //无预约信息  预约记录
            return view('library.myInfo',['studentInfo' => $studentInfo,'record' => $record]);
        }
        //更新我的预约状况
        $nowT = Date::now();
        if ($nowT >= $mySeatInfo->beginTime && $nowT <= $mySeatInfo->endTime && $mySeatInfo->status != '离开') {
            $status = '使用中';
        } else if ($nowT > $mySeatInfo->endTime) {
            $status = '已结束';
        } else if($mySeatInfo->status != '离开'){
            $status = '已预约';

        }
        $update = DB::table('seat')->where('id', $mySeatInfo->id)->update(['status' => $status]);


        //反解析时间 格式化
        $format = 'Y-m-d H:i:s';
        $beginTime = DateTime::createFromFormat($format, $mySeatInfo->beginTime);
        $endTime = DateTime::createFromFormat($format, $mySeatInfo->endTime);
        $mySeatInfo->beginT = $beginTime->format('H:i');
        $mySeatInfo->endT = $endTime->format('H:i');


        return view('library.mySeatInfo', [
            'mySeatInfo' => $mySeatInfo,
            'studentInfo' => $studentInfo,
            'record' => $record
        ]);
    }

    public function isYuYue($email)
    {
        //查询数据库展示
        $mySeatInfo = DB::table('seat')->where('student', $email)->first();
        if (!isset($mySeatInfo)) {
            return 0;
        }
        return 1;
    }

    //| PUT|PATCH | reserve/{reserve}      | reserve.update   暂时离开
    public function update($id): int
    {

        $result = DB::table('seat')->where('id', $id)->first();
//        dd($result);
        if ($result->status == '离开') {

            if (DB::table('seat')->where('id', $id)->update(['status' => '使用中'])) {
                //使用状态
                return 2;
            }
            //失败
            return 0;
        }else if ($result->status == '使用中') {
            //离开状态
            if (DB::table('seat')->where('id', $id)->update(['status' => '离开'])) {
                //使用状态
                return 1;
            }
            return 0;
        }
        return 0;
    }


    //| DELETE    | reserve/{reserve}      | reserve.destroy  结束预约
    public function destroy($id): int
    {
        //清空座位预约
        $result = DB::table('seat')->where('id', $id)->update([
            'student' => null,
            'beginTime' => null,
            'endTime' => null,
            'status' => '未使用']);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
}
