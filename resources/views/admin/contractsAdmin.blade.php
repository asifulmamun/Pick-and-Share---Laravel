@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Righ menu class for selected/highlighter --}}
@section('contractsAdmin')
!bg-gray-700
@endsection


{{-- Main Content --}}
@section('main')

{{-- msg --}}
@include('component.sesionMsg')

<div class="flex bg-gray-200">
    <!-- Side Menu -->
    <div class="bg-gray-800 text-white w-64 py-20 flex flex-col items-center">
        @include('admin.contentPart.rightNav')
    </div>

    <!-- Content -->
    <div class="flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="max-w-5xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Tailwind CSS styles for container -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Styling for the containing element -->
                    <div class="p-6 bg-white border-b border-gray-200"> <!-- Styling for the inner content -->
                        <h2 class="text-xl font-semibold mb-4">All Contracts</h2>
                        <ul class="grid grid-cols-1 gap-4">
                            @foreach($allContracts as $contracts)
                            <li class="bg-white p-4 shadow rounded flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div>
                                        <div class="font-semibold text-red-400">
                                            <a href="{{ route('showBookingRequestDetails', ['id' => $contracts->book_request_id]) }}">{{ $contracts->pickup }} >> {{ $contracts->destination }}</a>
                                            <small class="text-gray-500 font-light">(
                                                Status:
                                                @if ($contracts->status == 0)
                                                    <span class="text-red-400 ">User not responsed, Driver already bid/requested</span>
                                                @elseif ($contracts->status == 2)
                                                    <span class="text-yellow-500 ">User Responded, Driver not accepted yet</span>
                                                @elseif ($contracts->status == 1)
                                                    <span class="text-blue-500 font-bold">Contracted</span>
                                                @endif
                                            )</small>
                                        </div>
                                        <small class="text-gray-600">
                                            Contract Request: {{ $contracts->created_at }}, Name: {{ $contracts->name }}
                                            <br>
                                            {{-- License: {{ $pendingDriver->license_number }}, --}}
                                            Amount:
                                            @if ($contracts->contract_amount > 0 && $contracts->contract_amount < $contracts->driver_request_amount)
                                                <b class="text-red-400">{{ $contracts->contract_amount }}&nbsp;<del>{{ $contracts->driver_request_amount }}</del> TAKA</b>,
                                            @else
                                                <b class="text-red-400">{{ $contracts->driver_request_amount }} TAKA</b>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('showBookingRequestDetails', ['id' => $contracts->book_request_id]) }}" class="bg-blue-400 text-white px-4 py-2 rounded">Details</a>
                                </div>
                            </li>
                            @endforeach
                            {{ $allContracts->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- /Main Content --}}