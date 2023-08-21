@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Show All Requests For Car
@endsection

{{-- Main Content --}}
@section('main')

{{-- Booking Results --}}
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                {{ $bookingRequest->pickup }} >> {{ $bookingRequest->destination }}
            </h2>

            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Requested Date & Time: {{ $bookingRequest->created_at }}</p>
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Journey Date (Y-M-D) & Time (H-M-S): <span class="text-red-500">{{ $bookingRequest->journeyDate . ' | ' . $bookingRequest->journeyTime }}</span></p><br><br>
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">{{ $bookingRequest->journeyDetails }}</p>
            
        </div>
        <!-- text - end -->

        <div class="grid grid-cols-2 gap-8 md:grid-cols-4 md:gap-0 md:divide-x">
            <!-- stat - start -->
            <div class="flex flex-col items-center md:p-4">
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ $bookingRequest->journeyDate }}</div>
                <div class="text-sm font-semibold sm:text-base">JOURNEY DATE</div>
            </div>
            <!-- stat - end -->

            <!-- stat - start -->
            <div class="flex flex-col items-center md:p-4">
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ $bookingRequest->journeyTime }}</div>
                <div class="text-sm font-semibold sm:text-base">JOURNEY TIME</div>
            </div>

            <!-- stat - start -->
            <div class="flex flex-col items-center md:p-4">
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ $bookingRequest->personCount }}</div>
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

@endsection