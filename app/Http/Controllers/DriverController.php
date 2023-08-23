<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class DriverController extends Controller
{

    public function index()
    {
        // if ther driver doesn't exist any profile
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        if (!$driver) {
            return redirect()->route('driver.apply'); // Replace 'driver.apply' with your actual route name
        }

        // Assuming you have a logged-in user and can access their ID via Auth or any other method.
        $loggedInUserId = auth()->user()->id;



        // Active
        $activeContracts = Contract::where('driver_user_id', $loggedInUserId)
        ->where('status', 1)
        ->leftJoin('users', 'users.id', '=', 'contracts.requester_user_id')
        ->leftJoin('book_requests', function ($join) {
            $join->on('book_requests.user_id', '=', 'contracts.requester_user_id')
                ->whereColumn('book_requests.contracted_id', '=', 'contracts.id');
        })
        ->select(
            // users table
            'users.name',
            'users.phone_number',
            'users.email',

            // book_requests table
            'book_requests.pickup',
            'book_requests.destination',
            'book_requests.journeyDate',
            'book_requests.journeyTime',
            'book_requests.personCount',
            'book_requests.journeyDetails',

            // contracts table
            'contracts.id',
            'contracts.book_request_id',
            'contracts.driver_request_amount',
        )
        ->paginate(6);




        // Pending
        $pendingContracts = Contract::where('driver_user_id', $loggedInUserId)
        ->where('status', 2)
        ->leftJoin('users', 'users.id', '=', 'contracts.requester_user_id')
        ->leftJoin('book_requests', function ($join) {
            $join->on('book_requests.user_id', '=', 'contracts.requester_user_id')
                ->whereColumn('book_requests.contracted_id', '=', 'contracts.id');
        })
        ->select(
            // users table
            'users.name',
            'users.phone_number',
            'users.email',

            // book_requests table
            'book_requests.pickup',
            'book_requests.destination',
            'book_requests.journeyDate',
            'book_requests.journeyTime',
            'book_requests.personCount',
            'book_requests.journeyDetails',

            // contracts table
            'contracts.id',
            'contracts.book_request_id',
            'contracts.driver_request_amount',
        )
        ->paginate(6);




        // No Response
        $noContracts = Contract::where('driver_user_id', $loggedInUserId)
        ->where('status', 0)
        ->leftJoin('users', 'users.id', '=', 'contracts.requester_user_id')
        ->leftJoin('book_requests', function ($join) {
            $join->on('book_requests.user_id', '=', 'contracts.requester_user_id')
                ->whereColumn('book_requests.contracted_id', '=', 'contracts.id');
        })
        ->select(
            // users table
            'users.name',
            'users.phone_number',
            'users.email',

            // book_requests table
            'book_requests.pickup',
            'book_requests.destination',
            'book_requests.journeyDate',
            'book_requests.journeyTime',
            'book_requests.personCount',
            'book_requests.journeyDetails',

            // contracts table
            'contracts.id',
            'contracts.book_request_id',
            'contracts.driver_request_amount',
        )
        ->paginate(6);


        
        return view('driver.dashboard', compact('activeContracts', 'pendingContracts', 'noContracts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        // if user id found in Driver column as 'user_id' then redirect to profile of derver (driver/profile)
        if ($driver) {
            return redirect()->route('driver.dashboard'); // Replace 'driver.apply' with your actual route name
        }

        $data = $request->validate([
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'license_number' => 'required|string|unique:drivers',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'license_expire_date' => 'required|date_format:Y-m-d',
            'nid' => 'required|integer|unique:drivers,nid',
        ]);
    
        // Add the user_id and default status to the data array
        $data['user_id'] = $user_id;
        $data['status'] = 0;
        
    
        // Create a new Driver record with the provided data
        Driver::create($data);


        $crud = User::where('id', $user_id)->first();;
        $crud->role = '2';
        $crud->save();

        $request->session()->flash('msg', 'Your book request has been sent successfully.');
        return redirect()->back()->withInput();

        // return redirect()->route('driver.profile'); // Redirect after successful creation
    }

    public function show($id)
    {
        //
    }

    // Profile Show
    public function profileShow()
    {
        // if ther driver doesn't exist any profile
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)
        ->join('users', 'users.id', '=', 'drivers.user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',
            'drivers.present_address', 'drivers.permanent_address', 'drivers.license_number', 'drivers.license_expire_date', 'drivers.nid', 'drivers.date_of_birth', 'drivers.status'
        )
        ->first();
        if (!$driver) {
            return redirect()->route('driver.apply'); // Replace 'driver.apply' with your actual route name
        }

        $user = $driver;
        // if has exist profile of driver
        return view('driver.profile', ['user' => $user]);

    }

    // apply for driver profile activation
    public function driverApply(){
        
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        // if user id found in Driver column as 'user_id' then redirect to profile of derver (driver/profile)
        if(auth()->check()){
            if ($driver) {
                return redirect()->route('driver.dashboard');
            }else{
                return view('driver.profile-apply');
            }
        } else{
            return redirect()->route('login');
        }


    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        // without id go to for apply
        if (!$driver) {
            return redirect()->route('driver.profile'); // Replace 'driver.apply' with your actual route name
        }

        $rules = [
            'present_address' => 'required|string',
        ];
        $this->validate($request, $rules);

        $crud = $driver;
        $crud->present_address = $request->present_address;
        $crud->save();
        // Session::flash('msg', 'Your information updated successfully');
        return redirect()->back()->with('msg', 'Your information updated successfully');

        // return $request->all();

    }

    // Status Request change active or inactive
    public function updateProfileStatusRequest(Request $request){
        $user_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $user_id)->first();
        // without id go to for apply
        if (!$driver) {
            return redirect()->route('driver.profile'); // Replace 'driver.apply' with your actual route name
        }

        $crud = $driver;
        $crud->status = '2';
        $crud->save();
        // Session::flash('msg', 'Your information updated successfully');
        return redirect()->back()->with('msg', 'Your request for Account activation has been sent successfully');
    }


    public function destroy($id)
    {
        //
    }
}
