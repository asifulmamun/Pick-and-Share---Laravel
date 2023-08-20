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
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Apply For Driver Profile</h2>

            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Please fillup with correct information for active your profile</p>
        </div>
        <!-- text - end -->

        <!-- form - start -->
        <form action="" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
            @csrf

            {{-- Present Address --}}
            <div>
                <label for="present_address" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Present Address*</label>
                <input name="present_address" placeholder="Kishoreganj, Bangladesh" type="text"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- Parmanent Address --}}
            <div>
                <label for="permanent_address" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Parmanent Address*</label>
                <input name="permanent_address" placeholder="Adabor, Dhaka, Bangladesh" type="text"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- License Number --}}
            <div class="sm:col-span-2">
                <label for="license_number" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">License Number</label>
                <input name="license_number" type="number" placeholder="NHOD1555NH"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- Date of Birth --}}
            <div class="sm:col-span-2">
                <label for="date_of_birth" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Date of Birth*</label>
                <input name="date_of_birth" type="date"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- License Expire Date --}}
            <div class="sm:col-span-2">
                <label for="license_expire_date" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">License Expire Date*</label>
                <input name="license_expire_date" type="date"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            {{-- NID --}}
            <div class="sm:col-span-2">
                <label for="nid" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">NID*</label>
                <input name="nid" type="number" placeholder="Number only: 0000000000"
                    class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            <div class="flex items-center justify-between sm:col-span-2">
                <button
                    class="inline-block rounded-lg bg-red-400 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-blue-600 focus-visible:ring active:bg-red-400 md:text-base">SUBMIT</button>

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
