<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    //        | post|HEAD  | admin/record                | admin.index   首页
    public function index(){
        $totR=\DB::table('record')->count();
        $record = \DB::table('record')->paginate(10);
        return view('Admin.record',['record' => $record,'totR' => $totR]);
    }

}
