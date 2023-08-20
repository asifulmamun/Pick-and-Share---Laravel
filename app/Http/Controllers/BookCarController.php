<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
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
        //

        echo 'hi';
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
        
        
        // $rules = [
        //     'pickup' => ['required', 'string', 'max:255'],
        //     'destination' => ['required', 'string', 'max:255'],
        //     'journeyDate' => ['required', 'date'],
        //     'journeyTime' => ['required', 'date_format:H:i'],
        //     'personCount' => ['nullable', 'integer'],
        //     'journeyDetails' => ['nullable', 'string', 'max:500'],
        // ];
        // $this->validate($request, $rules);
    
        // $crud = new BookRequest();
        // $crud->pickup = $request->pickup;
        // $crud->destination = $request->destination;
        // $crud->journeyDate = $request->journeyDate;
        // $crud->journeyTime = $request->journeyTime;
        // $crud->personCount = $request->personCount;
        // $crud->journeyDetails = $request->journeyDetails;
        // $crud->save();
        // $request->session()->flash('msg', 'Your book request has been sent successfully.');
        // return redirect()->back();
        // // return $request->all();
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
        $bookingRequests = BookRequest::where('user_id', $userID)->latest()->paginate(6); // Change '10' to your desired number of items per page

        // Count the total number of booking requests
        $totalBookingRequests = BookRequest::where('user_id', $userID)->count();

        return view('dashboard', compact('bookingRequests', 'totalBookingRequests'));


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
