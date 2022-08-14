<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //       | GET|HEAD  | admin/student                    | student.index   首页
    public function index(){
        $totStu=\DB::table('student')->count();
        $student = \DB::table('student')->paginate(10);
        return view('admin.student',['student' => $student,'totStu' => $totStu]);
    }


    //        | PUT|PATCH | student/{admin}            | student.update  更新状态 (禁用)
    public function update(Request $request ): int
    {
        // 剔除数据
        $arr=$request->except(['_token','_method']);

        if(DB::table('student')->where('id',$request['id'])->update(['is_verification' => $request['status']])){
            return 1;
        }else{
            return 0;
        }
    }

    //        | DELETE    | student/{admin}            | student.destroy  删除
    public function destroy($idArr)
    {
        //批量删除
        if(DB::delete("delete from student where id in ($idArr)")){
            return 1;
        }else{
            return 0;
        }
    }

}
