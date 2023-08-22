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

        // Saving the request
        $rules = [
            'book_request_id' => 'required|exists:book_requests,id',
            'driver_request_amount' => 'required|numeric',
        ];
        $this->validate($request, $rules); // This will automatically handle validation
    
        $crud = new Contract();
        $crud->book_request_id = $request->book_request_id;
        $crud->requester_user_id = $bookRequesterUserID->user_id;
        $crud->driver_user_id = $driver_id;
        $crud->driver_request_amount = $request->driver_request_amount;
        $crud->save();
        return redirect()->back()->with('msg', 'Your contract request has been sent successfully');
    }
}
