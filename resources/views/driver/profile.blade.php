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
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ $user->name }} - Profile</h2>
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">E-mail: {{ $user->email }} | Phone: {{ $user->phone_number }}</p>

            <p class="text-center pt-2">
                {{-- Profile Status --}}
                @if($user->status == 1)
                    <span class="py-2 px-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Profile Status</span>
                    <span class="py-2 px-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Activated</span>
                @else
                    <span class="py-2 px-4 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Profile Status</span>
                    @if($user->status == 2)
                        <span class="py-2 px-4 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Pending</span>
                    @elseif($user->status == 0)
                        <span class="py-2 px-4 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Inactive</span>
                    @endif
                    {{-- Apply for Activation Profile --}}
                    <a href="{{ route('driver.profile.update.status.request') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Apply for Activation</a>
                    {{-- /Apply for Activation Profile --}}
                @endif
                {{-- /Profile Status --}}
            </p>

            <p class="text-center pt-14">
                <a href="{{ route('profile.show') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Change Profile Information</a>
            </p>

            <p class="text-center">
                <h2 class="pt-4 text-center text-red-500 font-bold text-2xl">You can only change your present address.</h2><h3 class="pt-4 text-center text-green-500 font-bold mb-10">If you need to change other's information please contact with Administrator.</h3>
            </p>
        </div>
        <!-- text - end -->


        {{-- All Error --}}
        @if ($errors->any())
        <div class="bg-red-100 py-10 px-12">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="font-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- /All Error --}}
        
        <!-- form - start -->
        <form action="{{ route('driver.profile.update') }}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
            @csrf

            {{-- Present Address --}}
            <div>
                <label for="present_address" class="text-blue-700 mb-2 inline-block text-sm sm:text-base">Present Address*</label>
                <input name="present_address" placeholder="Kishoreganj, Bangladesh" type="text" value="{{ $user->present_address }}"
                    class="border-blue-700 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- Parmanent Address --}}
            <div>
                <label for="permanent_address" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Parmanent Address*</label>
                <input name="permanent_address" placeholder="Adabor, Dhaka, Bangladesh" type="text" value="{{ $user->permanent_address }}" disabled
                    class="border-red-200 cursor-not-allowed w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- License Number --}}
            <div class="sm:col-span-2">
                <label for="license_number" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">License Number</label>
                <input name="license_number" type="text" placeholder="NHOD1555NH" value="{{ $user->license_number }}" disabled
                    class="border-red-200 cursor-not-allowed w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- Date of Birth --}}
            <div class="sm:col-span-2">
                <label for="date_of_birth" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Date of Birth*</label>
                <input name="date_of_birth" type="date"  value="{{ $user->date_of_birth }}" disabled
                    class="border-red-200 cursor-not-allowed w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- License Expire Date --}}
            <div class="sm:col-span-2">
                <label for="license_expire_date" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">License Expire Date*</label>
                <input name="license_expire_date" type="date" value="{{ $user->license_expire_date }}" disabled
                    class="border-red-200 cursor-not-allowed w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- NID --}}
            <div class="sm:col-span-2">
                <label for="nid" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">NID*</label>
                <input name="nid" type="number" placeholder="Number only: 0000000000" value="{{ $user->nid }}" disabled
                    class="border-red-200 cursor-not-allowed w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            <div class="flex items-center justify-between sm:col-span-2">
                <button
                    class="inline-block rounded-lg bg-red-400 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-blue-600 focus-visible:ring active:bg-red-400 md:text-base">UPDATE</button>

                <span class="text-sm text-gray-500">*Required</span>
            </div>

            <p class="text-xs text-gray-400">By update your information please read our <a href="#"
                    class="underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">Privacy
                    Policy</a>.</p>
        </form>
        <!-- form - end -->
    </div>
</div>
@endsection
{{-- /Main Content --}}
