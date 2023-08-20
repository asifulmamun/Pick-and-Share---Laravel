<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    // Profile Show
    public function profileShow()
    {
        //

        $user_id = auth()->id(); // Get the currently logged-in user's id

        $driver = Driver::where('user_id', $user_id)->first();

        if (!$driver) {
            return redirect()->route('driver.apply'); // Replace 'driver.apply' with your actual route name
        }

        
    }

    // apply for driver profile activation
    public function driverApply(){
        
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        
        // if user id found in Driver column as 'user_id' then redirect to profile of derver (driver/profile)
        if ($driver) {

            return redirect()->route('driver.profile'); // Replace 'driver.apply' with your actual route name
        
        }else{

            return view('driver.driver-profile-apply');

        }


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
