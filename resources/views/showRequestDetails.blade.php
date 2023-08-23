@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Show All Requests For Car
@endsection
{{-- /Page Title --}}


{{-- Main Content --}}
@section('main')

    {{-- msg --}}
    @include('component.sesionMsg')


    {{-- Booking Results --}}
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                    {{ $bookingRequest->pickup }} >> {{ $bookingRequest->destination }}
                </h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Requested Date & Time:
                    {{ $bookingRequest->created_at }}</p>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Journey Date (Y-M-D) & Time (H-M-S):
                    <span
                        class="text-red-500">{{ $bookingRequest->journeyDate . ' | ' . $bookingRequest->journeyTime }}</span>
                </p><br><br>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                    {{ $bookingRequest->journeyDetails }}</p>

            </div>
            <!-- text - end -->

            <div class="grid grid-cols-2 gap-8 md:grid-cols-4 md:gap-0 md:divide-x">
                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">
                        {{ $bookingRequest->journeyDate }}</div>
                    <div class="text-sm font-semibold sm:text-base">JOURNEY DATE</div>
                </div>
                <!-- stat - end -->

                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">
                        {{ $bookingRequest->journeyTime }}</div>
                    <div class="text-sm font-semibold sm:text-base">JOURNEY TIME</div>
                </div>

                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">
                        {{ $bookingRequest->personCount }}</div>
                    <div class="text-sm font-semibold sm:text-base">PERSONS</div>
                </div>
                <!-- stat - end -->

                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ $bookingRequest->name }}</div>
                    <div class="text-sm font-semibold sm:text-base">USER</div>
                </div>
                <!-- stat - end -->
            </div>
        </div>
    </div>
    {{-- Booking Results --}}


    {{-- Apply JOB/BID --}}
    @if (isset($driver))

        {{-- DRIVER --}}
        @if ($bookingRequest->user_id == auth()->user()->id )
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
                        <div>
                            <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, {{ $driver->name; }}! You can not apply for this contract.</h2>
                            <p class="text-gray-600">This is your request, you can see details. </p>
                        </div>

                        <a href="#"
                            class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">SEE DETAILS</a>
                    </div>
                </div>
            </div>
        @elseif ($driver->status == '0')
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
                        <div>
                            <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You cann't apply for this contract.</h2>
                            <p class="text-gray-600">Your profile is not activate yet (Inacvite). Go to for apply from your driver profile.</p>
                        </div>
        
                        <a href="{{ route('driver.profile') }}"
                            class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Request for Activation</a>
                    </div>
                </div>
            </div>
        @elseif ($driver->status == '2')
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
                        <div>
                            <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You cann't apply for this contract.</h2>
                            <p class="text-gray-600">Your profile is not activate yet (Pending). Go to for apply from your driver profile.</p>
                        </div>

                        <a href="{{ route('driver.profile') }}"
                            class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Request for Activation</a>
                    </div>
                </div>
            </div>
        @elseif ($driver->status == '1')
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="grid grid-cols-10 sm:flex-row p-4 md:p-8 items-center justify-between gap-4 rounded-lg bg-gray-100">
                        
                        <div class="col-span-6">
                            <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You can apply for this contract.</h2>
                            <p class="text-gray-600">Enter your bid amount and apply. If your bid amount preferable for user/requester then the requester will contract with you.</p>
                        </div>

                        @if (isset($contract->driver_request_amount))
                        <b class="col-span-4 text-red-400 font-bold text-xl">You have already applied for {{ $contract->driver_request_amount }} amount.</b>
                        @else
                        {{-- APPLY --}}
                        <form action="{{ route('driver.applyContract') }}" method="POST" class="col-span-4">
                            @csrf
                            <input type="hidden" name="book_request_id" value="{{ $bookingRequest->id }}">
                            <label class="block font-bold text-gray-700" for="proposal">Proposal Details:</label>
                            <textarea name="proposal" id="proposal" cols="30" rows="5" placeholder="Hello, I am interested for ride with you and my proposal amount are given also.. etc..">Hello, I am interested for ride with you and my proposal amount are given also.</textarea>
                            <input name="driver_request_amount" placeholder="Amount" type="text">
                            @error('driver_request_amount')
                            <span class="text-red-500 font-bold">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Apply</button>
                        </form>
                        {{-- /APPLY --}}
                        @endif 
                    </div>
                </div>
            </div>
        @endif
        {{-- /DRIVER --}}
    @else
    {{-- GUEST/LOGGED USER --}}
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
                    <div>
                        <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">You can not apply for this contract.</h2>
                        <p class="text-gray-600">You need to apply as a driver.</p>
                    </div>

                    <a href="{{ route('driver.profile') }}"
                        class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Start
                        now</a>
                </div>
            </div>
        </div>
        {{-- /GUEST/LOGGED USER --}}
    @endif
    {{-- Apply JOB/BID --}}


    {{-- Contracts --}}
    <div class="bg-gray-100 p-4">
        <div class="flex items-center justify-center mb-6">
            <h2 class="text-2xl font-bold text-red-400">Applied Results: {{ $allContracts->count() . ' of ' . $allContractsCount }}</h2>
        </div>
        <ul class="grid grid-cols-1 gap-4">
            @foreach($allContracts as $allContract)
                <li class="bg-white p-4 shadow rounded flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 mr-6">
                            <img class="w-full h-full rounded-full" src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($allContract->email))) }}?s=200" alt="{{ $allContract->name }}">
                        </div>
                        <div>
                            <div class="font-semibold text-red-400">{{ $allContract->name }}</div>
                            <div>Request Amount: <span class="font-bold text-red-400">{{ $allContract->driver_request_amount }} TAKA</span></div>
                            <div>Driver ID: {{ $allContract->driver_user_id }}</div>
                            <div>Email: {{ $allContract->email }}</div>
                            <div>Phone: {{ $allContract->phone_number }}</div>
                        </div>
                    </div>

                    @auth                    
                        {{-- Requester/Proposal Sender Will show this --}}
                        @if ($bookingRequest->user_id == auth()->user()->id OR $allContract->driver_user_id == auth()->user()->id )
                        <div>{{ $allContract->proposal }}</div>
                        @endif
                        {{-- /Requester/Proposal Sender Will show this --}}

                        {{-- Request Accept BTN --}}
                        @if ($bookingRequest->user_id == auth()->user()->id )
                            <form action="{{ route('bookingReqAcceptByRequester') }}" method="POST">
                                @csrf
                                <input type="hidden" name="bookingID" value="{{ $bookingRequest->id }}">
                                <input type="hidden" name="driverID" value="{{ $allContract->driver_user_id }}">
                                <button type="submit" class="bg-red-400 hover:bg-blue-400 text-white px-4 py-2 rounded">Agree</button>
                            </form>
                        @endif
                        {{-- /Request Accept BTN --}}
                    @endauth

                </li>
            @endforeach
            {{ $allContracts->links() }}
        </ul>
    </div>
    {{-- /Contracts --}}

<div class="text-center my-8">
    <a href="{{ route('showBookingRequestDetails', ['id' => $bookingRequest->id-1]) }}" class="btn bg-red-500 text-white font-bold py-2 px-4 rounded">Previous</a>
    <a href="{{ route('showBookingRequestDetails', ['id' => $bookingRequest->id+1]) }}" class="btn bg-blue-500 text-white font-bold py-2 px-4 rounded">Next</a>&nbsp;&nbsp;
</div>

@endsection
{{-- /Main Content --}}
