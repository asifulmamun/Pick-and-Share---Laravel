@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Main Content --}}
@section('main')

{{-- Personal Info --}}
<div class="flex justify-center mt-20">
    <div class="bg-white shadow-md rounded-lg p-8">
        <div class="flex justify-center mb-4">
            <a href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email))) }}?s=1024"><img
                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email))) }}?s=200"
                    alt="{{ auth()->user()->name }}" class="w-32 h-32 rounded-full border-4 border-blue-500"></a>
        </div>
        <div class="text-center">
            <h2 class="text-2xl font-semibold">{{ auth()->user()->name }}</h2>
        </div>
        <div class="mt-4">
            <div class="flex justify-between">
                <div class="text-gray-500">Email:</div>
                <div>&nbsp;{{ auth()->user()->email }}</div>
            </div>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('driver.profile') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Edit
                Profile</a>
        </div>
    </div>
</div>
{{-- /Personal Info --}}


{{-- JOB LISTS --}}
<section class="grid grid-cols-3 gap-4 px-8">
    {{-- Contracted --}}
    <div class="col-span-3 md:col-span-1 max-w-md mx-auto mt-8 bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl mb-4 border-b border-red-400 text-red-400 font-extrabold">Contracted</h2>
        <ul class="space-y-4">
            <!-- Repeat this list item for each request -->
            @foreach ($activeContracts as $activeContract)
            <li class="flex items-start space-x-4 border-b border-gray-300 py-8">
                <a class="w-12 h-12 rounded-full"  href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($activeContract->email))) }}?s=1024"><img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($activeContract->email))) }}?s=200" alt="{{ $activeContract->name }}" class=""> </a>
                <div class="flex-grow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ $activeContract->name }}</h3>
                    </div>
                    <small>Contract ID: {{ $activeContract->id }}</small>
                    <br><small class="text-gray-500">Phone: {{ $activeContract->phone_number }}</small>
                    <br><small class="text-gray-500">Email: {{ $activeContract->email }}</small>
                    <br><span class="text-gray-700 bg-yellow-200 px-2 py-1 font-bold inline-block my-2">{{ $activeContract->driver_request_amount }} TAKA</span>
                    <br><span class="text-gray-700 bg-yellow-200 px-2 py-1 font-bold inline-block my-1">{{ $activeContract->journeyDate }} || {{ $activeContract->journeyTime }}</span>
                    <br><a class="bg-red-400 hover:bg-blue-400 text-white px-3 mt-2 inline-block py-1 rounded-sm focus:outline-none focus:ring-2 focus:ring-red-400" href="{{ route('showBookingRequestDetails', [$activeContract->book_request_id]) }}">Details</a>
                </div>
            </li>
            @endforeach
            <!-- Repeat other list items here -->
        </ul>
    </div>
    {{-- /Contracted --}}

    {{-- Pending Contracts --}}
    <div class="col-span-3 md:col-span-1 max-w-md mx-auto mt-8 bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl mb-4 border-b border-red-400 text-red-400 font-extrabold">Pending Contracts</h2>
        <ul class="space-y-4">
            <!-- Repeat this list item for each request -->
            @foreach ($pendingContracts as $pendingContract)
            <li class="flex items-start space-x-4 border-b border-gray-300 py-8">
                <a class="w-12 h-12 rounded-full"  href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($pendingContract->email))) }}?s=1024"><img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($pendingContract->email))) }}?s=200" alt="{{ $pendingContract->name }}"></a>
                <div class="flex-grow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ $pendingContract->name }}</h3>
                    </div>
                    <small>Contract ID: {{ $pendingContract->id }}</small>
                    <br><small class="text-gray-500">Phone: {{ $pendingContract->phone_number }}</small>
                    <br><small class="text-gray-500">Email: {{ $pendingContract->email }}</small>

                    <br><span class="text-gray-700 bg-yellow-200 px-2 py-1 font-bold inline-block my-2">{{ $pendingContract->driver_request_amount }} TAKA</span>
                    <br><span class="text-gray-700 bg-yellow-200 px-2 py-1 font-bold inline-block my-1">{{ $pendingContract->journeyDate }} || {{ $pendingContract->journeyTime }}</span>

                    <br><button class="bg-red-400 hover:bg-blue-400 text-white px-3 py-1 rounded-sm focus:outline-none focus:ring-2 focus:ring-red-400">Accept</button>
                    <a class="bg-red-400 hover:bg-blue-400 text-white px-3 mt-2 inline-block py-1 rounded-sm focus:outline-none focus:ring-2 focus:ring-red-400" href="{{ route('showBookingRequestDetails', [$pendingContract->book_request_id]) }}">Details</a>

                    <p class="font-bold py-2"><a class="text-blue-400" href="{{ route('showBookingRequestDetails', [$pendingContract->book_request_id]) }}">{{ $pendingContract->pickup }} >> {{ $pendingContract->destination }}</a></p>
                    <p class="text-gray-500">Journey Description: {{ $pendingContract->journeyDetails }}</p>
                </div>
            </li>
            @endforeach
            <!-- Repeat other list items here -->
        </ul>
    </div>
    {{-- /Pending Contracts --}}


    {{-- Not Response --}}
    <div class="col-span-3 md:col-span-1 max-w-md mx-auto mt-8 bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl mb-4 border-b border-red-400 text-red-400 font-extrabold">No Response</h2>
        <ul class="space-y-4">
            <!-- Repeat this list item for each request -->
            @foreach ($noContracts as $noContract)
            <li class="flex items-start space-x-4 border-b border-gray-300 py-8">
                <a class="w-12 h-12 rounded-full"  href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($noContract->email))) }}?s=1024"><img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($noContract->email))) }}?s=200" alt="{{ $noContract->name }}" class=""> </a>
                <div class="flex-grow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ $noContract->name }}</h3>
                    </div>
                    <small>Contract ID: {{ $noContract->id }}</small>
                    <br><small class="text-gray-500">Phone: {{ $noContract->phone_number }}</small>
                    <br><small class="text-gray-500">Email: {{ $noContract->email }}</small>
                    <br><span class="text-gray-700 bg-yellow-200 px-2 py-1 font-bold inline-block my-2">{{ $noContract->driver_request_amount }} TAKA</span>
                    <br><a class="bg-red-400 hover:bg-blue-400 text-white px-3 mt-2 inline-block py-1 rounded-sm focus:outline-none focus:ring-2 focus:ring-red-400" href="{{ route('showBookingRequestDetails', [$noContract->book_request_id]) }}">{{ $noContract->pickup }} Details {{ $noContract->destination }}</a>
                </div>
            </li>
            @endforeach
            <!-- Repeat other list items here -->
        </ul>
    </div>
    {{-- /Not Response --}}
</section>
{{-- /JOB LISTS --}}

{{-- <pre>
{{ var_dump($contracts) }}
</pre> --}}


@endsection
{{-- /Main Content --}}
