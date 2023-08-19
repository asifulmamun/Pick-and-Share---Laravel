<form class="px-20 py-20">
    @csrf



    <div class="pb-12">
        {{-- Inputed Details --}}
        <input name="pickup" type="hidden" value="{{ $_GET['pickup'] }}">
        <input name="destination" type="hidden" value="{{ $_GET['destination'] }}">
        <input name="journeyDate" type="hidden" value="{{ $_GET['journeyDate'] }}">
        <input name="journeyTime" type="hidden" value="{{ $_GET['journeyTime'] }}">


        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <label for="journeyDetails" class="block text-sm font-medium leading-6 text-gray-900">Person Count (Number):</label>
            <input id="personCount" name="personCount" type="number" placeholder="Person count" value="4" class="outline-none">
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
                <label for="journeyDetails" class="block text-sm font-medium leading-6 text-gray-900">Journey Details</label>
                <div class="mt-2">
                    <textarea id="journeyDetails" name="journeyDetails" rows="3"
                        class="block w-full md:w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a full description. Example: Your Pickup full address, Destination all details. You can write all extra details which you want.</p>
                <p class="mt-1 text-sm leading-6 text-gray-600"><b class="text-red-500">Note:&nbsp;</b>Tell us about your perfect
                    booking request details. This request will redirect to Driver/Car Owner who want's to be share their car for
                    Long Drive or Rent A CAR.</p>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ url('/') }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>&nbsp;&nbsp;
        <button type="submit"
            class="md:w-1/4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit Request For Car</button>
    </div>

    <section class="col-span-6 text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{ $_GET['pickup'] }}
                    </h2>
                    <p class="leading-relaxed">Pickup</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">
                        {{ $_GET['destination'] }}</h2>
                    <p class="leading-relaxed">Destination</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">
                        {{ $_GET['journeyDate'] }}</h2>
                    <p class="leading-relaxed">Journey Date</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">
                        {{ $_GET['journeyTime'] }}</h2>
                    <p class="leading-relaxed">Estimate Journy Time</p>
                </div>
            </div>
        </div>
    </section>


</form>
