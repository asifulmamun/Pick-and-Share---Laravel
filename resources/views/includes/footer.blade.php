<footer class="bg-white pt-4 sm:pt-10 lg:pt-12">
    <footer class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-16 grid grid-cols-2 gap-12 border-t pt-10 md:grid-cols-4 lg:gap-8 lg:pt-12">
            <div class="col-span-full lg:col-span-2">
                <!-- logo - start -->
                <div class="mb-4 lg:-mt-2">
                    <a href="{{ url('/') }}" class="w-1/4 inline-flex items-center gap-2 text-xl font-bold text-black md:text-2xl"
                        aria-label="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'PickShare') }}">

                        {{ config('app.name', 'PickShare') }}
                    </a>
                </div>
                <!-- logo - end -->

                <p class="mb-6 text-gray-500 sm:pr-8">"Pick and Share" revolutionizes long-distance travel with its unique ride-sharing concept. Users request rides between districts, and drivers competitively bid with their best offers. Choose the perfect ride that fits your budget and preferences. Experience cost-effective, convenient, and personalized inter-district travel like never before.</p>

                <!-- social - start -->
                <div class="flex gap-4">
                    <a href="https://github.com/asifulmamun/Pick-and-Share-Laravel" target="_blank"
                        class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                        <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                </div>
                <!-- social - end -->
            </div>

            <!-- nav - start -->
            <div>
                <div class="mb-4 font-bold uppercase tracking-widest text-gray-800">Products</div>

                <nav class="flex flex-col gap-4">
                    <div>
                        <a href="#"
                            class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Overview</a>
                    </div>

                    <div>
                        <a href="#"
                            class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Solutions</a>
                    </div>

                    <div>
                        <a href="#"
                            class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Pricing</a>
                    </div>

                    <div>
                        <a href="#"
                            class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Customers</a>
                    </div>
                </nav>
            </div>
            <!-- nav - end -->

            <!-- nav - start -->
            <div>
                <span class="inline-block h-1 w-10 rounded bg-yellow-500 mt-8 mb-6"></span>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm"><a title="Profile" target="_blank" href="https://asifulmamun.info.bd">AL MAMUN</a></h2>
                <p class="text-gray-500">Team Leader</p><br>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">MD. RAFIUL ISLAM & TASMINA YASMIN</h2>
                <p class="text-gray-500">Team Members</p>
            </div>
            <!-- nav - end -->
        </div>

        <div class="border-t py-8 text-center text-sm text-gray-400">© 2023 - Project of National University, Bangladesh.
        </div>
    </footer>
</footer>