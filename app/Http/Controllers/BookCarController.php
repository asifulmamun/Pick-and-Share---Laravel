<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\BookRequest;
use App\Models\Driver;
use App\Models\Contract;
use Session;

class BookCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bookingRequests = BookRequest::select(
            'book_requests.id',
            'book_requests.pickup',
            'book_requests.destination',
            'book_requests.journeyDate',
            'book_requests.journeyTime',
            'book_requests.personCount',
            DB::raw('COUNT(contracts.id) as contract_count')
        )
        ->leftJoin('contracts', 'contracts.book_request_id', '=', 'book_requests.id')
        ->groupBy('book_requests.id')
        ->orderByDesc('book_requests.id') // Order by id in descending order
        ->paginate(9);

        return view('showRequests', compact('bookingRequests'));
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
        // Validate the incoming data
        $validatedData = $request->validate([
            'pickup' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'journeyDate' => ['required', 'date'],
            'journeyTime' => ['required', 'date_format:H:i'],
            'personCount' => ['nullable', 'integer'],
            'journeyDetails' => ['nullable', 'string', 'max:500'],
        ]);

        // Create a new booking request associated with the logged-in user
        $bookingRequest = auth()->user()->bookRequests()->create($validatedData);
        
        // Flash a success message to the session
        $request->session()->flash('msg', 'Your book request has been sent successfully.');

        // Redirect back to the previous page
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Get the logged-in user's ID
        $userID = auth()->user()->id;

         // Retrieve all booking requests associated with the user
        $bookingRequests = BookRequest::where('user_id', $userID)
        ->select(
            'book_requests.id',
            'book_requests.pickup',
            'book_requests.destination',
            'book_requests.journeyDate',
            'book_requests.journeyTime',
            'book_requests.personCount',
            DB::raw('COUNT(contracts.id) as contract_count')
        )
        ->leftJoin('contracts', 'contracts.book_request_id', '=', 'book_requests.id')
        ->groupBy('book_requests.id')
        ->orderByDesc('book_requests.id') // Order by id in descending order
        ->paginate(9);
        
    

        return view('dashboard', compact('bookingRequests'));
    }

    public function showBookingRequestDetails($id)
    {

        // Retrieve Booking Details and user(requester) details
        $bookingRequest = BookRequest::join('users', 'users.id', '=', 'book_requests.user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',
            'book_requests.id',
            'book_requests.user_id',
            'book_requests.pickup',
            'book_requests.destination', 
            'book_requests.journeyDate', 
            'book_requests.journeyTime',
            'book_requests.personCount',
            'book_requests.journeyDetails',
            'book_requests.created_at',
        )
        ->find($id);

        // if result not found or booking request are not available
        if(!isset($bookingRequest)){
            return Redirect::route('home')->with('msg', 'There are no requests available.');
        }

        // Driver Details
        $driver_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $driver_id)
        ->join('users', 'users.id', '=', 'drivers.user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',
            'drivers.present_address', 'drivers.permanent_address', 'drivers.license_number', 'drivers.license_expire_date', 'drivers.nid', 'drivers.date_of_birth', 'drivers.status'
        )
        ->first();

        // All Contracts Details for this request
        $allContracts = Contract::where('book_request_id', $id)
        ->join('users', 'users.id', '=', 'contracts.driver_user_id')
        ->select(
            'users.name', 'users.email', 'users.phone_number',
            'contracts.id', 'contracts.driver_user_id', 'contracts.driver_request_amount', 'contracts.proposal'
        )
        ->groupBy('contracts.id')
        ->orderByDesc('contracts.id') // Order by contracts.id in descending order
        ->paginate(10);
        
        // total contracts count
        $allContractsCount = Contract::count();

        // Retrive Contract Details
        $contract = Contract::where('book_request_id', $id)
        ->where('driver_user_id', $driver_id)
        ->select('id', 'requester_user_id', 'driver_user_id', 'driver_request_amount')
        ->first();


        return view('showRequestDetails', compact('bookingRequest', 'driver', 'allContracts', 'allContractsCount', 'contract'));

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
