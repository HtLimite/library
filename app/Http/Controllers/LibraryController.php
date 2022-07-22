<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //首页 get
    public function index(){

        return view('library.index')->with('status',0);
    }
}
