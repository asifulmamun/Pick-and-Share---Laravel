@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Main Content --}}
@section('main')

{{-- msg --}}
@include('component.sesionMsg')

<div class="flex h-screen bg-gray-200">
    <!-- Side Menu -->
    <div class="bg-gray-800 text-white w-64 py-20 flex flex-col items-center">
        @include('admin.contentPart.rightNav')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

        <div class="bg-white py-6 sm:py-8 lg:py-12">



            <div class="max-w-5xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Tailwind CSS styles for container -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Styling for the containing element -->
                    <div class="p-6 bg-white border-b border-gray-200"> <!-- Styling for the inner content -->
                        <h2 class="text-xl font-semibold mb-4">Pending Drivers</h2>
        
                        <ul>
                            @foreach($pendingDrivers as $pendingDriver)
                                <li class="border-b py-3 flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $pendingDriver->name }}</h3>
                                        <p class="text-gray-600">{{ $pendingDriver->email }}</p>
                                        <!-- Display other driver information here -->
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.driverProfile', ['id' => $pendingDriver->user_id]) }}" class="text-blue-500 hover:underline">View Details</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>



        </div>
        
    </div>
</div>
@endsection
{{-- /Main Content --}}