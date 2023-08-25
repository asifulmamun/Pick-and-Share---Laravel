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


        // users.role == 2 // Driver    ------- drivers.status == 1 // active
        $allDrivers = Driver::join('users', 'users.id', '=', 'drivers.user_id')
        ->select(
            // Select columns from the users table
            'users.name', 'users.email', 'users.phone_number',
    
            // Select columns from the drivers table
            'drivers.present_address',
            'drivers.permanent_address',
            'drivers.license_number',
            'drivers.license_expire_date',
            'drivers.nid', 'drivers.date_of_birth',
            'drivers.status'
        )
        ->orderByDesc('users.updated_at')
        ->paginate(6);
        // {{ $allDrivers->links() }}


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
                'allDrivers', 
                'allActiveDriversCount', 
                'allPendingDriversCount',
                'allRequestedForActivationDriversCount'
            )
        );

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
