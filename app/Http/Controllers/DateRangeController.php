<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DateRangeController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->date))
      {
       $data = DB::table('client1')
         ->where('date', $request->date)
         ->get();
      }
      else
      {
       $data = DB::table('client1')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('daterange');
    }
}
