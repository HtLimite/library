<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    //| GET|HEAD  | reserve                | reserve.index


    //| POST      | reserve                | reserve.store


    //| GET|HEAD  | reserve/create         | reserve.create   预约
    public function create(Request $request)
    {
        $times = $request->all();
        dd($times);
    }

    //| GET|HEAD  | reserve/{reserve}      | reserve.show
    //| PUT|PATCH | reserve/{reserve}      | reserve.update
    //| DELETE    | reserve/{reserve}      | reserve.destroy
}
