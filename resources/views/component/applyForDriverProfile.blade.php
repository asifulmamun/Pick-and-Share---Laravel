@php
    use App\Models\Driver;
@endphp
@auth
@if (auth()->user()->role == 0)
    <h1 class="font-bold my-5 py-5 text-center text-2xl"><a class="py-2 px-3 text-white bg-red-400 hover:bg-blue-400" href="{{ route('driver.apply') }}">Apply</a> for driver profile.</h1>
@elseif (Driver::where('user_id', Auth::user()->id)->value('status') == 0 && auth()->user()->role == 2)
    <h1 class="font-bold my-5 py-5 text-center text-2xl">You have already applied but your profile is <span class="text-red-500">inactive</span>&nbsp;<a class="text-white bg-red-400 hover:bg-blue-400 px-3 py-2 font-bold" href="{{ route('driver.profile') }}">Apply for Profile Activation</a><br><small class="text-center text-gray-500">In <a class="text-red-400 font-bold" href="{{ route('driver.profile') }}">profile</a> page you can see the request activation button.</small></h1>
@elseif (Driver::where('user_id', Auth::user()->id)->value('status') == 2 && auth()->user()->role == 2)
    <h1 class="font-bold my-5 py-5 text-center text-2xl">You have already applied but your profile is <span class="text-red-400">Pending</span>&nbsp;wait for confirm by Admin or contact with Admin.</h1>
@endif
@endauth