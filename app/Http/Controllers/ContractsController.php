<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\BookRequest;
use App\Models\Driver;
use App\Models\User;

class ContractsController extends Controller
{
    //

    public function update(Request $request)
    {
        $driver_id = auth()->id(); // Get the currently logged-in user's id
        $driver = Driver::where('user_id', $driver_id)->where('status', 2)->first();
        // without id go to for apply   
        if (!$driver) {
            return redirect()->route('driver.profile'); // Replace 'driver.apply' with your actual route name
        }



        $rules = [
            'book_request_id' => 'required|exists:book_requests,id',
            'requester_user_id' => 'required|exists:users,id',
            'driver_user_id' => 'required|exists:drivers,user_id',
            'driver_request_amount' => 'required|numeric',
            'contract_amount' => 'required|numeric',
            'currency' => 'nullable|string|max:3', // Adjust the validation rules as needed
            'contracted_date' => 'nullable|date',
            'status' => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $crud = new Contract();
        $crud->book_request_id = $request->booking_id;
        $crud->requester_user_id = $request->requester_user_id;
        $crud->driver_user_id = $driver_id;
        $crud->driver_request_amount = $request->driver_request_amount;
        $crud->currency = 'BDT';
        $crud->contracted_date = 'null';
        $crud->status = '0';

        $crud->save();

        return redirect()->back()->with('msg', 'Your information updated successfully');





        // $rules = [
        //     'present_address' => 'required|string',
        // ];
        // $this->validate($request, $rules);

        // $crud = new Contract();
        // $crud->present_address = $request->present_address;
        // $crud->save();
        // // Session::flash('msg', 'Your information updated successfully');
        // return redirect()->back()->with('msg', 'Your information updated successfully');

        // return $request->all();

    }
}
