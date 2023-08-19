<!-- Search Section -->
<section class="search space-y-4 md:px-36 md:py-20 bg-no-repeat"
    style="background-image: url('./img/search_sectino_bg.svg'); background-position: 65% 100%;">
    <h1 class="text-4xl font-extrabold">Car Hire – Search, Compare & Save</h1>
    <ul class="features flex text-sm space-x-3">
        <li><i><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.1115 0C4.52704 0 0 4.52704 0 10.1115C0 15.6959 4.52704 20.2229 10.1115 20.2229C15.6959 20.2229 20.2229 15.6959 20.2229 10.1115C20.2229 4.52704 15.6959 0 10.1115 0ZM10.1115 1.95705C14.6181 1.95705 18.2658 5.60415 18.2658 10.1115C18.2658 14.6181 14.6188 18.2658 10.1115 18.2658C5.60484 18.2658 1.95705 14.6188 1.95705 10.1115C1.95705 5.60484 5.60415 1.95705 10.1115 1.95705ZM15.8278 7.2683L14.909 6.34204C14.7187 6.15021 14.4089 6.14894 14.2171 6.33927L8.45391 12.0562L6.01607 9.59854C5.82579 9.40671 5.516 9.40544 5.32417 9.59573L4.39787 10.5146C4.20604 10.7048 4.20477 11.0146 4.3951 11.2065L8.09642 14.9378C8.2867 15.1296 8.59649 15.1309 8.78832 14.9406L15.8251 7.96024C16.0169 7.76992 16.0181 7.46013 15.8278 7.2683Z"
                        fill="#6C63FF" />
                </svg></i>
            <span class="pl-0.5">Free cancellations on most bookings</span>
        </li>
        <li class=""><i><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.1115 0C4.52704 0 0 4.52704 0 10.1115C0 15.6959 4.52704 20.2229 10.1115 20.2229C15.6959 20.2229 20.2229 15.6959 20.2229 10.1115C20.2229 4.52704 15.6959 0 10.1115 0ZM10.1115 1.95705C14.6181 1.95705 18.2658 5.60415 18.2658 10.1115C18.2658 14.6181 14.6188 18.2658 10.1115 18.2658C5.60484 18.2658 1.95705 14.6188 1.95705 10.1115C1.95705 5.60484 5.60415 1.95705 10.1115 1.95705ZM15.8278 7.2683L14.909 6.34204C14.7187 6.15021 14.4089 6.14894 14.2171 6.33927L8.45391 12.0562L6.01607 9.59854C5.82579 9.40671 5.516 9.40544 5.32417 9.59573L4.39787 10.5146C4.20604 10.7048 4.20477 11.0146 4.3951 11.2065L8.09642 14.9378C8.2867 15.1296 8.59649 15.1309 8.78832 14.9406L15.8251 7.96024C16.0169 7.76992 16.0181 7.46013 15.8278 7.2683Z"
                        fill="#6C63FF" />
                </svg></i>
            <span class="pl-2">24/7 Supports</span>
        </li>
    </ul>

    <form id="search_form" action="{{ route('book') }}"
        class="grid grid-cols-5 gap-3 rounded-md bg-yellow-400 py-4 px-4 shadow-md mix-blend-multiply">
        @csrf
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.8909 23.5735L21.582 18.2645C21.3424 18.0249 21.0175 17.8918 20.6767 17.8918H19.8088C21.2785 16.0121 22.1518 13.6478 22.1518 11.0759C22.1518 4.95752 17.1942 0 11.0759 0C4.95752 0 0 4.95752 0 11.0759C0 17.1942 4.95752 22.1518 11.0759 22.1518C13.6478 22.1518 16.0121 21.2785 17.8918 19.8088V20.6767C17.8918 21.0175 18.0249 21.3424 18.2645 21.582L23.5735 26.8909C24.0741 27.3915 24.8834 27.3915 25.3787 26.8909L26.8856 25.384C27.3862 24.8834 27.3862 24.0741 26.8909 23.5735ZM11.0759 17.8918C7.31114 17.8918 4.25995 14.8459 4.25995 11.0759C4.25995 7.31114 7.30582 4.25995 11.0759 4.25995C14.8406 4.25995 17.8918 7.30582 17.8918 11.0759C17.8918 14.8406 14.8459 17.8918 11.0759 17.8918Z"
                        fill="#9C9494" />
                </svg>
            </div>
            {{-- Pickup --}}
            <input name="pickup" type="text" id="search_from"
                class="outline-none border-none placeholder:gray-100 text-gray-900 text-sm rounded-lg pl-12 py-4"
                placeholder="Pick Up Location">
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
            <input name="destination" type="text" id="search_destination"
                class="outline-none border-none placeholder:gray-100 text-gray-900 text-sm rounded-lg pl-12 py-4"
                placeholder="Destination">
        </div>


        <div class="relative">
            <span class="absolute top-1 left-12 text-xs text-gray-500 font-bold">Pickup Date</span>
            {{-- Journey Date --}}
            <input name="journeyDate" type="date" id="search_date" class="outline-none border-none text-gray-500 rounded-lg pl-14 pt-7 pb-4 text-2xl">
            <script>
                const searchDateInput = document.getElementById('search_date');

                // Get the current date in Bangladesh time (BDT) YYYY-MM-DD format
                const nowDate = new Date();
                const utcOffsetBD = 6; // Bangladesh time is UTC+6
                nowDate.setHours(nowDate.getHours() + utcOffsetBD); // Adjust for UTC offset
                const currentDateBDT = nowDate.toISOString().substr(0, 10);

                // Set the current date in BDT as the default value and min date
                searchDateInput.value = currentDateBDT;
                searchDateInput.min = currentDateBDT;

            </script>
        </div>

        <div class="relative">
            <span class="absolute top-1 left-12 text-xs text-gray-500 font-bold">Chose Time</span>
            {{-- Journey Time --}}
            <input name="journeyTime" type="time" id="search_time" class="outline-none border-none text-gray-500 rounded-lg pl-14 pt-7 pb-4 text-2xl">
            <script>
                const searchTimeInput = document.getElementById('search_time');

                // Get the current time in Bangladesh time (BDT) HH:MM format
                const now = new Date();
                const utcOffset = 6; // Bangladesh time is UTC+6
                now.setHours(now.getHours() + utcOffset); // Adjust for UTC offset
                const currentTimeBDT = now.toISOString().substr(11, 5);

                // Set the current time in BDT as the default value
                searchTimeInput.value = currentTimeBDT;

            </script>
        </div>

        <input id="search_submit" type="submit" type="butto" value="SEARCH"
            class="rounded-lg bg-red-400 hover:bg-blue-400 text-white cursor-pointer font-bold text-2xl transition-all ease-in-out delay-150 duration-300">
    </form>

</section>
<!-- End - Search Section -->


<!-- Choice Features -->
<section class="grid grid-cols-12 md:px-36 md:py-20">

    <!-- Quick Choice -->
    <div class="col-span-5 bg-no-repeat"
        style="background-image: url('./img/quick_choice_bg.svg'); background-position: 0% 0%;">
        <h2 class="font-extrabold text-lg">Quick Choice</h2>

        <div class="w-fit px-6 py-3 mt-6 border border-solid rounded-2xl border-gray-500">
            <a class="grid grid-cols-3 py-2 text-gray-600 hover:bg-yellow-100 px-2 font-semibold" href="./">
                <span>Dhaka</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg></span><span>Chittagon</span>
            </a>
            <a class="grid grid-cols-3 py-2 text-gray-600 hover:bg-yellow-100 px-2 font-semibold" href="./">
                <span>Rajshahi</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg></span><span>Dhaka</span>
            </a>
            <a class="grid grid-cols-3 py-2 text-gray-600 hover:bg-yellow-100 px-2 font-semibold" href="./">
                <span>Cox's Bazar</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg></span><span>Dhaka</span>
            </a>
            <a class="grid grid-cols-3 py-2 text-gray-600 hover:bg-yellow-100 px-2 font-semibold" href="./">
                <span>Dhaka</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg></span><span>Mymensing</span>
            </a>
        </div>

    </div>
    <!-- /Quick Choice -->

    <!-- Features -->
    <div class="col-span-7 pt-8 bg-no-repeat"
        style="background-image: url('./img/features_bg_car.svg'); background-position: 100% 50%; background-size: contain;">
        <!-- Feature - 1 -->
        <div class="flex p-3">
            <div
                class="w-20 h-20 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0">
                <svg width="47" height="62" viewBox="0 0 47 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M40.6875 7.75H31C31 3.47539 27.5246 0 23.25 0C18.9754 0 15.5 3.47539 15.5 7.75H5.8125C2.60352 7.75 0 10.3535 0 13.5625V56.1875C0 59.3965 2.60352 62 5.8125 62H40.6875C43.8965 62 46.5 59.3965 46.5 56.1875V13.5625C46.5 10.3535 43.8965 7.75 40.6875 7.75ZM23.25 4.84375C24.8605 4.84375 26.1562 6.13945 26.1562 7.75C26.1562 9.36055 24.8605 10.6562 23.25 10.6562C21.6395 10.6562 20.3438 9.36055 20.3438 7.75C20.3438 6.13945 21.6395 4.84375 23.25 4.84375ZM40.6875 55.4609C40.6875 55.8605 40.3605 56.1875 39.9609 56.1875H6.53906C6.13945 56.1875 5.8125 55.8605 5.8125 55.4609V14.2891C5.8125 13.8895 6.13945 13.5625 6.53906 13.5625H11.625V17.9219C11.625 18.7211 12.2789 19.375 13.0781 19.375H33.4219C34.2211 19.375 34.875 18.7211 34.875 17.9219V13.5625H39.9609C40.3605 13.5625 40.6875 13.8895 40.6875 14.2891V55.4609Z"
                        fill="#665757" />
                </svg>
            </div>
            <div class="flex-row">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Flexible rentals</h2>
                <p class="leading-relaxed text-base">Cancel or change most bookings for free up to 48 hours before
                    pick-up</p>
            </div>
        </div>
        <!-- /Feature - 1 -->

        <!-- Feature - 2 -->
        <div class="flex p-3">
            <div
                class="w-20 h-20 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0">
                <svg width="49" height="66" viewBox="0 0 49 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.4106 60.5272V62.6188C18.4106 64.348 22.6233 65.7539 27.8157 65.7539C33.0082 65.7539 37.2209 64.348 37.2209 62.6188V60.5272C35.1978 61.9526 31.4994 62.6188 27.8157 62.6188C24.1321 62.6188 20.4337 61.9526 18.4106 60.5272ZM34.0858 46.9437C39.2782 46.9437 43.4909 45.5378 43.4909 43.8086C43.4909 42.0795 39.2782 40.6736 34.0858 40.6736C28.8934 40.6736 24.6807 42.0795 24.6807 43.8086C24.6807 45.5378 28.8934 46.9437 34.0858 46.9437ZM18.4106 55.3887V57.9163C18.4106 59.6454 22.6233 61.0513 27.8157 61.0513C33.0082 61.0513 37.2209 59.6454 37.2209 57.9163V55.3887C35.1978 57.0541 31.4945 57.9163 27.8157 57.9163C24.137 57.9163 20.4337 57.0541 18.4106 55.3887ZM38.7884 55.9275C41.5952 55.3838 43.4909 54.3747 43.4909 53.2137V51.1221C42.3545 51.9254 40.6841 52.4741 38.7884 52.812V55.9275ZM27.8157 48.5112C22.6233 48.5112 18.4106 50.2648 18.4106 52.43C18.4106 54.5951 22.6233 56.3488 27.8157 56.3488C33.0082 56.3488 37.2209 54.5951 37.2209 52.43C37.2209 50.2648 33.0082 48.5112 27.8157 48.5112ZM38.5581 51.269C41.4972 50.74 43.4909 49.7015 43.4909 48.5112V46.4195C41.752 47.649 38.7639 48.3103 35.619 48.4671C37.0641 49.1676 38.1271 50.1081 38.5581 51.269Z"
                        fill="#665757" />
                    <path
                        d="M0.658737 41.8798L10.0923 32.4482C10.518 32.0225 11.0951 31.7859 11.7006 31.7859H13.2427C10.6315 28.4462 9.07993 24.2465 9.07993 19.6769C9.07993 8.8072 17.889 0 28.7596 0C39.6303 0 48.4403 8.8072 48.4403 19.6769C48.4403 30.5466 39.6312 39.3538 28.7596 39.3538C24.19 39.3538 19.9884 37.8022 16.6487 35.1909V36.7331C16.6487 37.3386 16.4122 37.9157 15.9864 38.3414L6.55291 47.7731C5.66358 48.6624 4.22551 48.6624 3.34565 47.7731L0.668198 45.0956C-0.22113 44.2063 -0.22113 42.7692 0.658737 41.8798ZM28.7596 33.2988C36.2849 33.2988 42.3834 27.2116 42.3834 19.6769C42.3834 12.1526 36.2953 6.05501 28.7596 6.05501C21.2344 6.05501 15.1359 12.1422 15.1359 19.6769C15.1359 27.2012 21.224 33.2988 28.7596 33.2988ZM26.1948 18.867L30.4532 17.5898C30.9413 17.4431 31.2829 16.9483 31.2829 16.3854C31.2829 15.6976 30.7815 15.1375 30.1665 15.1375H27.507C27.0756 15.1375 26.6593 15.2596 26.2941 15.4895C25.9876 15.6815 25.5978 15.6702 25.3357 15.4204L24.2241 14.3598C23.8901 14.041 23.909 13.4885 24.278 13.2113C25.1389 12.5651 26.1778 12.1923 27.2459 12.1375V10.5963C27.2459 10.1781 27.5846 9.83939 28.0028 9.83939H29.5165C29.9347 9.83939 30.2734 10.1781 30.2734 10.5963V12.1214C32.509 12.181 34.3113 14.0656 34.3113 16.3854C34.3113 18.2748 33.0824 19.9626 31.3236 20.4905L27.0652 21.7677C26.577 21.9144 26.2355 22.4092 26.2355 22.9721C26.2355 23.6599 26.7369 24.22 27.3519 24.22H30.0104C30.4418 24.22 30.8581 24.098 31.2233 23.8681C31.5298 23.676 31.9196 23.6874 32.1817 23.9371L33.2933 24.9977C33.6273 25.3166 33.6084 25.8691 33.2394 26.1463C32.3785 26.7925 31.3396 27.1652 30.2715 27.2201V28.7613C30.2715 29.1795 29.9328 29.5182 29.5146 29.5182H28.0009C27.5827 29.5182 27.244 29.1795 27.244 28.7613V27.2362C25.0084 27.1766 23.2061 25.2929 23.2061 22.9721C23.2061 21.0828 24.435 19.3949 26.1948 18.867Z"
                        fill="#665757" />
                </svg>
            </div>
            <div class="flex-row">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">No hidden fees</h2>
                <p class="leading-relaxed text-base">Know exactly what you’re paying</p>
            </div>
        </div>
        <!-- /Feature - 2 -->
    </div>
    <!-- /Features -->
</section>
<!-- End - Choice Features -->
