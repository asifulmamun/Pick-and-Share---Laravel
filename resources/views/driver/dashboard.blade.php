@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Main Content --}}
@section('main')

{{-- Personal Info --}}
<div class="flex justify-center items-center h-screen">
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
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <h2 class="mb-8 text-center text-2xl font-bold text-gray-800 md:mb-12 lg:text-3xl">What others say about us</h2>

        <div class="grid gap-4 md:grid-cols-2 md:gap-8">
            <!-- quote - start -->
            <div class="flex flex-col items-center gap-4 rounded-lg bg-indigo-500 px-8 py-6 md:gap-6">
                <div class="max-w-md text-center text-white lg:text-lg">“This is a section of some simple filler text,
                    also known as placeholder text.”</div>

                <div class="flex flex-col items-center gap-2 sm:flex-row md:gap-3">
                    <div
                        class="h-12 w-12 overflow-hidden rounded-full border-2 border-indigo-100 bg-gray-100 md:h-14 md:w-14">
                        <img src="https://images.unsplash.com/photo-1567515004624-219c11d31f2e??auto=format&q=75&fit=crop&w=112"
                            loading="lazy" alt="Photo by Radu Florin"
                            class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="text-center text-sm font-bold text-indigo-50 sm:text-left md:text-base">John
                            McCulling</div>
                        <p class="text-center text-sm text-indigo-200 sm:text-left md:text-sm">CEO / Datadrift</p>
                    </div>
                </div>
            </div>
            <!-- quote - end -->
        </div>
    </div>
</div>
{{-- /JOB LISTS --}}

{{-- <pre>
{{ var_dump($contracts) }}
</pre> --}}

@foreach ($contracts as $allContracts)
    {{ $allContracts->book_request_id }}
@endforeach

@endsection
{{-- /Main Content --}}
