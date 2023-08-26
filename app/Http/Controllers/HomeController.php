<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;


class HomeController extends Controller
{
    public function index()
    {
        // Retrieve all booking requests associated with the user
        $bookingRequests = BookRequest::latest()->simplePaginate(6); // Change '10' to your desired number of items per page
        return view('welcome', compact('bookingRequests'));
    }

}
