<form action="{{ route('BookCarControllerStore') }}" method="POST" class="px-20 py-20 bg-yellow-50">
    @csrf

    {{-- If has message - From BookCarController --}}
    @if (Session::has('msg'))
    <p class="bg-red-100 py-10 px-12">{{ Session::get('msg') }}</p>
    @endif
        
    @if ($errors->any())
    <div class="bg-red-100 py-10 px-12">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="font-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <section id="search_form" class="search space-y-10 md:px-36 md:py-20 bg-no-repeat"
        style="background-image: url('./img/search_sectino_bg.svg'); background-position: 65% 100%;">

        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </div>
            {{-- Person --}}
            <input name="personCount" type="number" id="personCount"
                class="outline-none border-none placeholder:gray-100 text-gray-900 text-sm rounded-lg pl-12 py-4"
                placeholder="How Many Person, Example: 4">
                @error('personCount')
                <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
        </div>

        <div class="relative">
            <div class="col-span-full">
                <label for="journeyDetails" class="block text-sm font-medium leading-6 text-gray-900">Journey
                    Details</label>
                <div class="mt-2">
                    {{-- Journey Details --}}
                    <textarea id="journeyDetails" name="journeyDetails" rows="3"
                        class="block w-full md:w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        @error('journeyDetails')
                        <span class="text-red-500 font-bold">{{ $message }}</span>
                        @enderror
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a full description. Example: Your Pickup full
                    address, Destination all details. You can write all extra details which you want.</p>
            </div>
        </div>

        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.8909 23.5735L21.582 18.2645C21.3424 18.0249 21.0175 17.8918 20.6767 17.8918H19.8088C21.2785 16.0121 22.1518 13.6478 22.1518 11.0759C22.1518 4.95752 17.1942 0 11.0759 0C4.95752 0 0 4.95752 0 11.0759C0 17.1942 4.95752 22.1518 11.0759 22.1518C13.6478 22.1518 16.0121 21.2785 17.8918 19.8088V20.6767C17.8918 21.0175 18.0249 21.3424 18.2645 21.582L23.5735 26.8909C24.0741 27.3915 24.8834 27.3915 25.3787 26.8909L26.8856 25.384C27.3862 24.8834 27.3862 24.0741 26.8909 23.5735ZM11.0759 17.8918C7.31114 17.8918 4.25995 14.8459 4.25995 11.0759C4.25995 7.31114 7.30582 4.25995 11.0759 4.25995C14.8406 4.25995 17.8918 7.30582 17.8918 11.0759C17.8918 14.8406 14.8459 17.8918 11.0759 17.8918Z"
                        fill="#9C9494" />
                </svg>
            </div>
            {{-- Pickup --}}
            <input name="pickup" type="text" id="pickup" value="{{ $_GET['pickup'] }}"
                class="outline-none border-none placeholder:gray-100 text-gray-900 text-sm rounded-lg pl-12 py-4"
                placeholder="Pick Up Location">
                @error('pickup')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
        </div>

        <div class="relative">
            <div class="absolute top-1/2 -translate-y-1/2 left-0 pl-3.5">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.8909 23.5735L21.582 18.2645C21.3424 18.0249 21.0175 17.8918 20.6767 17.8918H19.8088C21.2785 16.0121 22.1518 13.6478 22.1518 11.0759C22.1518 4.95752 17.1942 0 11.0759 0C4.95752 0 0 4.95752 0 11.0759C0 17.1942 4.95752 22.1518 11.0759 22.1518C13.6478 22.1518 16.0121 21.2785 17.8918 19.8088V20.6767C17.8918 21.0175 18.0249 21.3424 18.2645 21.582L23.5735 26.8909C24.0741 27.3915 24.8834 27.3915 25.3787 26.8909L26.8856 25.384C27.3862 24.8834 27.3862 24.0741 26.8909 23.5735ZM11.0759 17.8918C7.31114 17.8918 4.25995 14.8459 4.25995 11.0759C4.25995 7.31114 7.30582 4.25995 11.0759 4.25995C14.8406 4.25995 17.8918 7.30582 17.8918 11.0759C17.8918 14.8406 14.8459 17.8918 11.0759 17.8918Z"
                        fill="#9C9494" />
                </svg>
            </div>
            {{-- Destination --}}
            <input name="destination" type="text" id="destination" value="{{ $_GET['destination'] }}"
                class="outline-none border-none placeholder:gray-100 text-gray-900 text-sm rounded-lg pl-12 py-4"
                placeholder="Destination">
                @error('destination')
                <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
        </div>

        <div class="relative">
            <span class="absolute top-1 left-12 text-xs text-gray-500 font-bold">Pickup Date</span>
            {{-- Journey Date --}}
            <input name="journeyDate" value="{{ $_GET['journeyDate'] }}" type="date" id="journeyDate"
                class="outline-none border-none text-gray-500 rounded-lg pl-14 pt-7 pb-4 text-2xl">
                @error('journeyDate')
                <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
        </div>

        <div class="relative">
            <span class="absolute top-1 left-12 text-xs text-gray-500 font-bold">Chose Estimate Time</span>
            {{-- Journey Time --}}
            <input name="journeyTime" value="{{ $_GET['journeyTime'] }}" type="time" id="journeyTime"
                class="outline-none border-none text-gray-500 rounded-lg pl-14 pt-7 pb-4 text-2xl">
                @error('journeyTime')
                <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
        </div>


        <p class="mt-1 text-sm leading-6 text-gray-600"><b class="text-red-500">Note:&nbsp;</b>Tell us about
            your perfect
            booking request details. This request will redirect to Driver/Car Owner who want's to be share their
            car for
            Long Drive or Rent A CAR.</p>

        <input id="search_submit" type="submit" type="butto" value="SUBMIT REQUEST FOR CAR"
            class="rounded-lg bg-red-400 hover:bg-blue-400 text-white cursor-pointer font-bold text-2xl transition-all ease-in-out delay-150 duration-300">

    </section>
</form>
