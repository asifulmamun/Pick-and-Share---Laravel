<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // All User/Included Drivers
        $allUsersCount = User::count();

        // Simple Users/Non Driver
        $simpleUsersCount = User::where('role', 0)
        ->count();

        // All Activated Drivers
        $allActiveDriversCount = Driver::where('status', 1)
        ->count();


        // All Pending Drivers
        $allPendingDriversCount = Driver::where('status', 0)
        ->count();


        // All Pending Drivers
        $allRequestedForActivationDriversCount = Driver::where('status', 2)
        ->count();


        return view('admin.dashboard',
            compact(
                'allUsersCount',
                'simpleUsersCount',
                'allActiveDriversCount', 
                'allPendingDriversCount',
                'allRequestedForActivationDriversCount'
            )
        );

    }

    public function pendingDrivers(){


        // All Pending Drivers
        $pendingDrivers = Driver::where('status', 2)
        ->join('users', 'users.id', '=', 'drivers.user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',

            'drivers.user_id',
            'drivers.present_address',
            'drivers.permanent_address',
            'drivers.license_number',
            'drivers.license_expire_date',
            'drivers.nid', 'drivers.date_of_birth',
            'drivers.status'
        )
        ->groupBy('drivers.id')
        ->orderByDesc('drivers.id') // Order by contracts.id in descending order
        ->paginate(10);


        return view('admin.pendingDrivers', compact('pendingDrivers'));

    }


    // Driver Profile by ID
    public function driverProfile($id){

        $driver = Driver::where('user_id', $id)
        ->join('users', 'users.id', '=', 'drivers.user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',

            'drivers.user_id',
            'drivers.present_address',
            'drivers.permanent_address',
            'drivers.license_number',
            'drivers.license_expire_date',
            'drivers.nid', 'drivers.date_of_birth',
            'drivers.status'
        )
        ->first();

        return view('driver.profileDetailsByAdmin', compact('driver'));
    }


    // Driver Profile Activate
    public function driverProfileActiveByAdmin($id){
        $user_id = $id;
        $driver = Driver::where('user_id', $user_id)->first();
        // without id go to for apply
        if (!$driver) {
            return redirect()->back()->with('msg', 'There are no driver profile.'); // Replace 'driver.apply' with your actual route name
        }

        $crud = $driver;
        $crud->status = '1';
        $crud->save();
        // Session::flash('msg', 'Your information updated successfully');
        return redirect()->back()->with('msg', 'This Driver profile has been activated');
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
