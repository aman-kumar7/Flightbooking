<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\client;

use Carbon\Carbon;

use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('createreservation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name'=>'required',
            'middle_name'=>'required_if:type,individual',
            'last_name'=>'required',
            'phone'=>'required_if:type,individual',
            'email'=>'required_if:type,individual',
            'date'=>'required_if:type,individual',
            'from_city'=>'required_if:type,individual',
            'from_country'=>'required_if:type,individual',
            'to_city'=>'required_if:type,individual',
            'to_country'=>'required_if:type,individual',
            
           
          ]);

        DB::table('client1')
        ->insert([
            'first_name'=>$request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'), 
            'date'=>$request->get('date'),
            'from_city'=>$request->get('from_city'),
            'from_country'=>$request->get('from_country'),
            'to_city'=>$request->get('to_city'),
            'to_country'=>$request->get('to_country'),
            'created_at'=>Carbon::now(),
            

        ]);

        return redirect()->action('ClientController@index')
                        ->withSuccess(['Your Response has been Saved']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}
