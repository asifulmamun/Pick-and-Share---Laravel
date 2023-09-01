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


@if (!isset($contracted->status)){{-- If contracted apply system off --}}

{{-- Apply JOB/BID --}}
@isset($driver)

{{-- DRIVER --}}
@if ($bookingRequest->user_id == auth()->user()->id )
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
            <div>
                <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, {{ $driver->name; }}! You can not apply
                    for this contract.</h2>
                <p class="text-gray-600">This is your request, you can see details. </p>
            </div>

            <a href="#"
                class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">SEE
                DETAILS</a>
        </div>
    </div>
</div>
@elseif ($driver->status == '0')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
            <div>
                <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span
                        class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You cann't apply for
                    this contract.</h2>
                <p class="text-gray-600">Your profile is not activate yet (Inacvite). Go to for apply from your driver
                    profile.</p>
            </div>

            <a href="{{ route('driver.profile') }}"
                class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Request
                for Activation</a>
        </div>
    </div>
</div>
@elseif ($driver->status == '2')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
            <div>
                <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span
                        class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You cann't apply for
                    this contract.</h2>
                <p class="text-gray-600">Your profile is not activate yet (Pending). Go to for apply from your driver
                    profile.</p>
            </div>

            <a href="{{ route('driver.profile') }}"
                class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Request
                for Activation</a>
        </div>
    </div>
</div>
@elseif ($driver->status == '1')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="grid grid-cols-10 sm:flex-row p-4 md:p-8 items-center justify-between gap-4 rounded-lg bg-gray-100">

            <div class="col-span-6">
                <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">HELLO, <span
                        class="col-span-4 text-red-400 font-bold">{{ $driver->name; }}!</span>&nbsp;You can apply for
                    this contract.</h2>
                <p class="text-gray-600">Enter your bid amount and apply. If your bid amount preferable for
                    user/requester then the requester will contract with you.</p>
            </div>

            @if (isset($contract->driver_request_amount))
            <b class="col-span-4 text-red-400 font-bold text-xl">You have already applied for
                {{ $contract->driver_request_amount }} amount.</b>
            @else
            {{-- APPLY --}}
            <form action="{{ route('driver.applyContract') }}" method="POST" class="col-span-4">
                @csrf
                <input type="hidden" name="book_request_id" value="{{ $bookingRequest->id }}">
                <label class="block font-bold text-gray-700" for="proposal">Proposal Details:</label>
                <textarea name="proposal" id="proposal" cols="30" rows="5"
                    placeholder="Hello, I am interested for ride with you and my proposal amount are given also.. etc..">Hello, I am interested for ride with you and my proposal amount are given also.</textarea>
                <input name="driver_request_amount" placeholder="Amount" type="text">
                @error('driver_request_amount')
                <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
                <button type="submit"
                    class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Apply</button>
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
@endisset
{{-- Apply JOB/BID --}}

@endif {{-- /If contracted apply system off --}}


{{-- Contracted --}}
@isset($contracted->status)    
@if ($contracted->status == 1)
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-lg px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-8 md:mb-12">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Congratulations..! Successfully Contracted..!</h2>
            {{-- if rquester it will be show the CONFIDENTIAL DATA --}}
            @if ($bookingRequest->user_id == auth()->id() OR $contracted->driver_user_id == auth()->id())
                @if ($bookingRequest->user_id == auth()->id())     
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Your contracted has been
                    successfully created. You can now contact with Driver and travel with the Driver. Make sure your safety
                    with details of <span class="text-red-400 font-bold">Driver</span> and Your's.</p>
                @else
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Your contracted has been
                    successfully created. You can now contact with the Owner and travel. Make sure your safety
                    with details of <span class="text-red-400 font-bold">Owner/Requester</span> and your's.</p>
                @endif
                {{-- User/Requester Details --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th colspan="2"
                                class="text-center pt-8 px-6 py-3 bg-gray-50 font-extrabold text-gray-700 text-xl uppercase tracking-wider">
                                Travel Requester Details
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Name
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $bookingRequest->name }}
                                &nbsp;&nbsp;<a class="w-10 h-10 inline-block border border-gray-400 rounded-full p-0.5" href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($bookingRequest->email))) }}?s=1024">
                                    <img class="w-full h-full rounded-full"
                                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($bookingRequest->email))) }}?s=200"
                                    alt="{{ $bookingRequest->name }}">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Phone Number
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $bookingRequest->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Date of Birth
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $bookingRequest->email }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- /User/Requester Details --}}

                {{-- Driver Details --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th colspan="2"
                                class="text-center pt-8 px-6 py-3 bg-gray-50 font-extrabold text-gray-700 text-xl uppercase tracking-wider">
                                Driver Details
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Name
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->name }}
                                &nbsp;&nbsp;<a class="w-10 h-10 inline-block border border-gray-400 rounded-full p-0.5" href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($contracted->email))) }}?s=1024">
                                    <img class="w-full h-full rounded-full"
                                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($contracted->email))) }}?s=200"
                                    alt="{{ $contracted->name }}">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Phone Number
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Date of Birth
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->date_of_birth }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Driver Email
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->email }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Driving License Number
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->license_number }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                License Expire Date
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->license_expire_date }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Present Address
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->present_address }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Parmanent Address
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $contracted->permanent_address }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Rating --}}
                <h3 class="text-center pt-8 px-6 py-3 bg-gray-50 font-extrabold text-gray-700 text-xl uppercase tracking-wider">Give Feedback</h3><br>
                <div class="container">
                    <div class="feedback">
                        <div class="rating">
                            <input type="radio" name="rating" onclick="rated(5)" id="rating-5">
                            <label for="rating-5"></label>
                            <input type="radio" name="rating" onclick="rated(4)" id="rating-4">
                            <label for="rating-4"></label>
                            <input type="radio" name="rating" onclick="rated(3)" id="rating-3">
                            <label for="rating-3"></label>
                            <input type="radio" name="rating" onclick="rated(2)" id="rating-2">
                            <label for="rating-2"></label>
                            <input type="radio" name="rating" onclick="rated(1)" id="rating-1">
                            <label for="rating-1"></label>
                            <div class="emoji-wrapper">
                                <div class="emoji">
                                    <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                        <path
                                            d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z"
                                            fill="#f4c534" />
                                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829"
                                            rx="56.146" ry="56.13" fill="#fff" />
                                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048"
                                            ry="28.08" fill="#3e4347" />
                                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016"
                                            ry="5.296" fill="#5a5f63" />
                                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819"
                                            rx="56.146" ry="56.13" fill="#fff" />
                                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048"
                                            ry="28.08" fill="#3e4347" />
                                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987"
                                            rx="8.016" ry="5.296" fill="#5a5f63" />
                                        <path
                                            d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z"
                                            fill="#3e4347" />
                                    </svg>
                                    <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                            fill="#f4c534" />
                                        <path
                                            d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z"
                                            fill="#3e4347" />
                                        <path
                                            d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z"
                                            fill="#f4c534" />
                                        <path
                                            d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z"
                                            fill="#fff" />
                                        <path
                                            d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z"
                                            fill="#3e4347" />
                                        <path
                                            d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z"
                                            fill="#fff" />
                                        <path
                                            d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z"
                                            fill="#f4c534" />
                                        <path
                                            d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z"
                                            fill="#fff" />
                                        <path
                                            d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z"
                                            fill="#3e4347" />
                                        <path
                                            d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z"
                                            fill="#fff" />
                                    </svg>
                                    <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                            fill="#f4c534" />
                                        <path
                                            d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z"
                                            fill="#3e4347" />
                                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff" />
                                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347" />
                                        <g fill="#fff">
                                            <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10" />
                                            <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                        </g>
                                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347" />
                                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5"
                                            fill="#fff" />
                                    </svg>
                                    <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                        <path
                                            d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z"
                                            fill="#3e4347" />
                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                            fill="#f4c534" />
                                        <g fill="#fff">
                                            <path
                                                d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                            <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81" />
                                        </g>
                                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                        <g fill="#fff">
                                            <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1" />
                                            <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81" />
                                        </g>
                                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1"
                                            fill="#fff" />
                                    </svg>
                                    <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                            fill="#f4c534" />
                                        <path
                                            d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                            fill="#e24b4b" />
                                        <path
                                            d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z"
                                            fill="#d03f3f" />
                                        <path
                                            d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                            fill="#fff" />
                                        <path
                                            d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                            fill="#e24b4b" />
                                        <path
                                            d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z"
                                            fill="#d03f3f" />
                                        <path
                                            d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                            fill="#fff" />
                                        <path
                                            d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z"
                                            fill="#3e4347" />
                                        <path
                                            d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z"
                                            fill="#e24b4b" />
                                    </svg>
                                    <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <g fill="#ffd93b">
                                            <circle cx="256" cy="256" r="256" />
                                            <path
                                                d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                        </g>
                                        <path
                                            d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z"
                                            fill="#e9eff4" />
                                        <path
                                            d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                            fill="#45cbea" />
                                        <path
                                            d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                            fill="#e84d88" />
                                        <g fill="#38c0dc">
                                            <path
                                                d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                        </g>
                                        <g fill="#d23f77">
                                            <path
                                                d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                        </g>
                                        <path
                                            d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z"
                                            fill="#3e4347" />
                                        <path
                                            d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z"
                                            fill="#e24b4b" />
                                        <path
                                            d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z"
                                            fill="#fff" opacity=".2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .container {
                        display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        justify-content: center;
                        padding: 0 20px;
                    }

                    .rating {
                        display: flex;
                        width: 100%;
                        justify-content: center;
                        overflow: hidden;
                        flex-direction: row-reverse;
                        height: 150px;
                        position: relative;
                    }

                    .rating-0 {
                        filter: grayscale(100%);
                    }

                    .rating>input {
                        display: none;
                    }

                    .rating>label {
                        cursor: pointer;
                        width: 40px;
                        height: 40px;
                        margin-top: auto;
                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 76%;
                        transition: .3s;
                    }

                    .rating>input:checked~label,
                    .rating>input:checked~label~label {
                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                    }


                    .rating>input:not(:checked)~label:hover,
                    .rating>input:not(:checked)~label:hover~label {
                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                    }

                    .emoji-wrapper {
                        width: 100%;
                        text-align: center;
                        height: 100px;
                        overflow: hidden;
                        position: absolute;
                        top: 0;
                        left: 0;
                    }

                    .emoji-wrapper:before,
                    .emoji-wrapper:after {
                        content: "";
                        height: 15px;
                        width: 100%;
                        position: absolute;
                        left: 0;
                        z-index: 1;
                    }

                    .emoji-wrapper:before {
                        top: 0;
                        background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
                    }

                    .emoji-wrapper:after {
                        bottom: 0;
                        background: linear-gradient(to top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
                    }

                    .emoji {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        transition: .3s;
                    }

                    .emoji>svg {
                        margin: 15px 0;
                        width: 70px;
                        height: 70px;
                        flex-shrink: 0;
                    }

                    #rating-1:checked~.emoji-wrapper>.emoji {
                        transform: translateY(-100px);
                    }

                    #rating-2:checked~.emoji-wrapper>.emoji {
                        transform: translateY(-200px);
                    }

                    #rating-3:checked~.emoji-wrapper>.emoji {
                        transform: translateY(-300px);
                    }

                    #rating-4:checked~.emoji-wrapper>.emoji {
                        transform: translateY(-400px);
                    }

                    #rating-5:checked~.emoji-wrapper>.emoji {
                        transform: translateY(-500px);
                    }

                    .feedback {
                        max-width: 360px;
                        background-color: #fff;
                        width: 100%;
                        padding: 30px;
                        border-radius: 8px;
                        display: flex;
                        flex-direction: column;
                        flex-wrap: wrap;
                        align-items: center;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, .05);
                    }
                </style>
                <center>
                <form action="">
                    @csrf
                    <input type="hidden" value="" id="rated" name="rated">
                    <textarea name="ratingComment" id="ratingComment" cols="15" rows="5">It was an amazing travel, The driver was very friendly.</textarea><br>
                    <input class="bg-blue-400 text-white px-4 py-2 rounded" type="submit" value="Complete Contract">
                </form>
                </center>
                <script>

                    
                    function rated(rating){

                        console.log(rating)
                        document.getElementById('rated').value = rating;



                    }
                </script>
                {{-- /Rating --}}

                {{-- /Driver Details --}}
            @endif
            {{-- if rquester it will be show the CONFIDENTIAL DATA --}}
        </div>
        <!-- text - end -->

        <div class="grid grid-cols-1 gap-6 rounded-lg bg-indigo-500 p-6 md:grid-cols-3 md:gap-8 md:p-8">
            <!-- stat - start -->
            <div class="flex flex-col items-center">
                <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $contracted->contract_amount }}
                    TAKA</div>
                <div class="text-sm text-indigo-200 sm:text-base">Contracted Amount</div>
            </div>
            <!-- stat - end -->

            <!-- stat - start -->
            <div class="flex flex-col items-center">
                <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $contracted->name }}</div>
                <div class="text-sm text-indigo-200 sm:text-base">Driver Name</div>
            </div>

            <!-- stat - start -->
            <div class="flex flex-col items-center">
                <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $contracted->id }}</div>
                <div class="text-sm text-indigo-200 sm:text-base">Contract ID</div>
            </div>
            <!-- stat - end -->
        </div>
    </div>
</div>
@endif
@endisset
{{-- /Contracted --}}




{{-- ALL Contracts --}}
<div class="bg-gray-100 p-4">
    <div class="flex items-center justify-center mb-6">
        <h2 class="text-2xl font-bold text-red-400">Applied Results:
            {{ $allContracts->count() . ' of ' . $allContractsCount }}</h2>
    </div>
    <ul class="grid grid-cols-1 gap-4">
        @foreach($allContracts as $allContract)
        <li class="bg-white p-4 shadow rounded flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 mr-6">
                    <img class="w-full h-full rounded-full"
                        src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($allContract->email))) }}?s=200"
                        alt="{{ $allContract->name }}">
                </div>
                <div>
                    <div class="font-semibold text-red-400">{{ $allContract->name }}</div>
                    <small>Contract ID: {{ $allContract->id }}<br>Driver ID: {{ $allContract->driver_user_id }}</small>
                    <div>Request Amount:
                        @if ($allContract->contract_amount > 0 && $allContract->contract_amount < $allContract->
                            driver_request_amount)
                            <span class="font-bold text-red-400">{{ $allContract->contract_amount }}</span>
                            &nbsp;<del>{{ $allContract->driver_request_amount }}</del>&nbsp;TAKA
                            @else
                            <span class="font-bold text-red-400">{{ $allContract->driver_request_amount }} TAKA</span>
                            @endif
                    </div>
                </div>
            </div>

            @auth
            {{-- Requester/Proposal Sender Will show this --}}
            @if ($bookingRequest->user_id == auth()->user()->id OR $allContract->driver_user_id == auth()->user()->id)
            <div>{{ $allContract->proposal }}</div>
            @endif
            {{-- /Requester/Proposal Sender Will show this --}}


            {{-- Request Accept BTN --}}
            @if ($bookingRequest->user_id == auth()->user()->id && !isset($contracted->status))
                @if ($allContract->status == 0)
                <form action="{{ route('bookingReqAcceptByRequester') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bookingID" value="{{ $bookingRequest->id }}">
                    <input type="hidden" name="driverID" value="{{ $allContract->driver_user_id }}">
                    <button type="submit" class="bg-red-400 hover:bg-blue-400 text-white px-4 py-2 rounded">Agree</button>
                </form>
                @endif

                @if($allContract->status == 2)
                    <button class="bg-blue-400 hover:bg-red-400 text-white px-4 py-2 rounded">Request Sended</button>
                @endif
            @endif
            {{-- /Request Accept BTN --}}


            @endauth
            @isset($contracted->status)
            @if ($allContract->driver_user_id == $contracted->driver_user_id)
            <button class="bg-blue-400 text-white px-4 py-2 rounded">Contracted</button>
            @endif
            @endisset
        </li>
        @endforeach
        {{ $allContracts->links() }}
    </ul>
</div>
{{-- /ALL Contracts --}}

<div class="text-center my-8">
    <a href="{{ route('showBookingRequestDetails', ['id' => $bookingRequest->id-1]) }}"
        class="btn bg-red-500 text-white font-bold py-2 px-4 rounded">Previous</a>
    <a href="{{ route('showBookingRequestDetails', ['id' => $bookingRequest->id+1]) }}"
        class="btn bg-blue-500 text-white font-bold py-2 px-4 rounded">Next</a>&nbsp;&nbsp;
</div>

@endsection
{{-- /Main Content --}}
