@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection

{{-- Main Content --}}
@section('main')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            {{-- msg --}}
            @include('component.sesionMsg')
            {{-- /msg --}}

            {{-- Profile Picture --}}
            <div class="relative group h-24 w-24 block mx-auto my-4">
                <a href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($driver->email))) }}?s=1024" target="_blank" class="group-hover:opacity-75 transition-opacity">
                    <img class="w-full h-full" src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($driver->email))) }}?s=200" alt="{{ $driver->name }}" class="w-32 h-32 rounded-full">
                </a>
                <div class="hidden group-hover:block absolute -right-30 -top-30 transform bg-gray-800 text-white py-2 px-4 rounded-lg">
                    <a href="https://gravatar.com/" class="block mx-auto mb-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">
                        Change Image
                    </a>
                </div>
            </div>
            {{-- /Profile Picture --}}

            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ $driver->name }} - Profile</h2>
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">E-mail: {{ $driver->email }} | Phone: {{ $driver->phone_number }}</p>
        
            <p class="text-center pt-2">
                {{-- Profile Status --}}
                @if($driver->status == 1)
                    <span class="py-2 px-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Profile Status</span>
                    <span class="py-2 px-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Activated</span>
                @else
                    <span class="py-2 px-4 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Profile Status</span>
                    @if($driver->status == 2)
                        <span class="py-2 px-4 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Pending</span>
                    @elseif($driver->status == 0)
                        <span class="py-2 px-4 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Inactive</span>
                    @endif
                    {{-- Apply for Activation Profile --}}
                    <a href="" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">ACTIVE</a>
                    {{-- /Apply for Activation Profile --}}
                @endif
                {{-- /Profile Status --}}
            </p>
        
        
        
        </div>
        <!-- text - end -->


    
        
        <!-- Profile Data - start -->
        <div class="max-w-screen-md mx-auto">
            <div class="grid gap-4 sm:grid-cols-2">
        
                {{-- Present Address --}}
                <div class="col-span-2">
                    <p class="text-blue-700 mb-2 text-sm sm:text-base font-semibold">Present Address</p>
                    <p class="text-gray-800">{{ $driver->present_address }}</p>
                </div>
        
                {{-- Parmanent Address --}}
                <div class="col-span-2">
                    <p class="text-sm text-gray-800">Parmanent Address</p>
                    <p class="text-gray-800">{{ $driver->permanent_address }}</p>
                </div>
        
                {{-- License Number --}}
                <div class="col-span-2">
                    <p class="text-sm text-gray-800">License Number</p>
                    <p class="text-gray-800">{{ $driver->license_number }}</p>
                </div>
        
                {{-- Date of Birth --}}
                <div class="col-span-2">
                    <p class="text-sm text-gray-800">Date of Birth</p>
                    <p class="text-gray-800">{{ $driver->date_of_birth }}</p>
                </div>
        
                {{-- License Expire Date --}}
                <div class="col-span-2">
                    <p class="text-sm text-gray-800">License Expire Date</p>
                    <p class="text-gray-800">{{ $driver->license_expire_date }}</p>
                </div>
        
                {{-- NID --}}
                <div class="col-span-2">
                    <p class="text-sm text-gray-800">NID</p>
                    <p class="text-gray-800">{{ $driver->nid }}</p>
                </div>
            </div>
        </div>
        
        <!-- /Profile Data - end -->
    </div>
</div>
@endsection
{{-- /Main Content --}}
