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

    public function create()
    {
        //
    }

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
            'book_requests.contracted_id',
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
            'contracts.id', 'contracts.driver_user_id', 'contracts.driver_request_amount', 'contracts.proposal', 'contracts.contract_amount', 'contracts.status',
        )
        ->groupBy('contracts.id')
        ->orderByDesc('contracts.id') // Order by contracts.id in descending order
        ->paginate(10);
        

            // total contracts count
            $allContractsCount = Contract::where('book_request_id', $id)
            ->count();

            // Retrive Contract Details
            $contract = Contract::where('book_request_id', $id)
            ->where('driver_user_id', $driver_id)
            ->select('id', 'requester_user_id', 'driver_user_id', 'driver_request_amount',)
            ->first();

        // Contracted
        $contracted = Contract::where('contracts.book_request_id', $id)
        ->where('contracts.id', $bookingRequest->contracted_id) // Specify 'contracts.id'
        ->leftJoin('users', 'users.id', '=', 'contracts.driver_user_id')
        ->leftJoin('drivers', 'drivers.user_id', '=', 'contracts.driver_user_id')
        ->select(

            // users table
            'users.name',
            'users.email',
            'users.phone_number',

            // drivers table
            'drivers.license_number',
            'drivers.license_expire_date',
            'drivers.date_of_birth',
            'drivers.present_address',
            'drivers.permanent_address',


            // contracts table
            'contracts.id',
            'contracts.book_request_id',
            'contracts.requester_user_id',
            'contracts.driver_user_id',
            'contracts.driver_request_amount',
            'contracts.contract_amount',
            'contracts.currency',
            'contracts.contracted_date',
            'contracts.status',
            'contracts.proposal'
        )
        ->first();

        return view('showRequestDetails', compact('bookingRequest', 'driver', 'allContracts', 'allContractsCount', 'contract', 'contracted'));

    }

    public function edit($id)
    {
        //
    }

    public function bookingReqAcceptByRequester(Request $request)
    {
        // VAR
        $bookingID = $request->bookingID;
        $driverID = $request->driverID;
        $loggedUserId = auth()->id();

        // Checking Booking Info and (This Booking Requested By LOGGED USER or NOT)
        $booking = BookRequest::where('id', $bookingID)
        ->where('user_id', $loggedUserId)
        ->select('id', 'user_id', 'contracted_id')
        ->first();


        // if request accept before this 0 have another contracted id/ then make shure this contracted id is acccepted or not, if accepted status is 1 then not permission another request accept
        if($booking->contracted_id !== 0){
            
            // Contracted check
            $contracted = Contract::where('id', $booking->contracted_id )
            // ->where('status', 1)
            ->select('id', 'contract_amount', 'status',)
            ->first();

            // if book_request.contracted_id exist any id and this contracted_id status is 1 means already contracted confirmd/ else doing make another request
            if($contracted->status == 1){

                return redirect()->back()->with('msg', 'You have already contracted with ' . $contracted->contract_amount . ' TAKA, Contract ID: ' . $contracted->id . '. If you want to cancel this please contact with Administrator.');
            
            } else{
                
                // Accepting
                if($booking->id == $bookingID){
                
                    // checking Driver was sended job req or not
                    $contractInfo = Contract::
                    where('book_request_id', $booking->id)
                    ->where('requester_user_id', $loggedUserId)
                    ->where('driver_user_id', $driverID)
                    ->select('id', 'driver_user_id', 'driver_request_amount')
                    ->first();
    
                    // Update the contracted_id field
                    $bookRequest = BookRequest::findOrFail($bookingID);
                    $bookRequest->contracted_id = $contractInfo->id;
                    $bookRequest->save();
    
                    // Update contracts.status
                    $contracts = Contract::findOrFail($contractInfo->id);
                    $contracts->status = 2;
                    $contracts->save();
    
                    return redirect()->back()->with('msg', 'Contract Requst sended successfully, for ' . $contractInfo->driver_request_amount . ' TAKA, Contracted ID: ' . $contractInfo->id . ', Driver ID: ' . $contractInfo->driver_user_id);
                } // Accepting
                

            }
        }
        
        elseif($booking->contracted_id == 0){
                            
            // Accepting
            if($booking->id == $bookingID){
            
                // checking Driver was sended job req or not
                $contractInfo = Contract::
                where('book_request_id', $booking->id)
                ->where('requester_user_id', $loggedUserId)
                ->where('driver_user_id', $driverID)
                ->select('id', 'driver_user_id', 'driver_request_amount')
                ->first();

                // Update the contracted_id field
                $bookRequest = BookRequest::findOrFail($bookingID);
                $bookRequest->contracted_id = $contractInfo->id;
                $bookRequest->save();

                // Update contracts.status
                $contracts = Contract::findOrFail($contractInfo->id);
                $contracts->status = 2;
                $contracts->save();

                return redirect()->back()->with('msg', 'Contract Requst sended successfully, for ' . $contractInfo->driver_request_amount . ' TAKA, Contracted ID: ' . $contractInfo->id . ', Driver ID: ' . $contractInfo->driver_user_id);
            } // Accepting
                
        }

        else{
            return redirect()->back()->with('msg', 'Your booking request not accepatble');
        }
    }


    public function destroy($id)
    {
        //
    }
}
