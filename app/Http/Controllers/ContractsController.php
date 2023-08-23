<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\BookRequest;
use App\Models\Driver;

class ContractsController extends Controller
{
    //

    public function createContract(Request $request)
    {

        // Retrive Driver Info
        $driver_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $driver_id)->where('status', 1)
        ->select('user_id')
        ->first();
        
        // without id go to for apply   
        if (!$driver) {
            return redirect()->route('driver.profile'); // Replace 'driver.apply' with your actual route name
        }

        // Retrieve booking requester user id
        $bookRequesterUserID = BookRequest::where('id', $request->book_request_id)
        ->select('user_id')
        ->first();


        // Retrieve booking requester user id
        $contract = Contract::where('book_request_id', $request->book_request_id)
        ->where('driver_user_id', $driver_id)
        ->select('requester_user_id', 'driver_user_id', 'driver_request_amount')
        ->first();
        

        // if contract found then redirect or not found exist contract then make contract request
        if(!isset($contract)){
            // Saving the request
            $rules = [
                'book_request_id' => 'required|exists:book_requests,id',
                'driver_request_amount' => 'required|numeric',
                'proposal' => 'nullable|string',
            ];
            $this->validate($request, $rules); // This will automatically handle validation
        
            $crud = new Contract();
            $crud->book_request_id = $request->book_request_id;
            $crud->requester_user_id = $bookRequesterUserID->user_id;
            $crud->driver_user_id = $driver_id;
            $crud->driver_request_amount = $request->driver_request_amount;
            $crud->proposal = $request->proposal;
            $crud->save();
            return redirect()->back()->with('msg', 'Your contract request has been sent successfully');
        }else{
            return redirect()->back()->with('msg', 'Your have already requested for a contract. Contract amount was: ' . $contract->driver_request_amount);
            
        }
    }

    public function contractAcceptByDriver(Request $request)
    {

        // VAR
        $contractID = $request->contractID;
        $contractAmount = $request->contractAmount;
        $loggedUserId = auth()->id();

        // Checking Booking Info and (This Booking Requested By LOGGED USER or NOT)
        $contract = Contract::
        where('id', $contractID)
        ->where('driver_user_id', $loggedUserId)
        ->where('status', 2)
        ->select('id', 'driver_user_id')
        ->first();


        if($contract){
            
            $crud = Contract::where('id', $contractID)->first();

            if ($crud) {
                $crud->status = 1;
                $crud->contract_amount = (int)$contractAmount;
                $crud->save();
            }
            
            return redirect()->back()->with('msg', 'Contracted amount ' . $contractAmount . ' TAKA');
        }else{
            return redirect()->back()->with('msg', 'Request Not Accepted.');
        }


    }
}
