<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    //       | GET|HEAD  | admin/student                    | student.index   首页
    public function index(){
        $totStu=\DB::table('student')->count();
        $student = \DB::table('student')->paginate(10);
        return view('Admin.student',['student' => $student,'totStu' => $totStu]);
    }

}
