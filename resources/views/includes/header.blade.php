<!-- Header -->
<header class="bg-yellow-300 text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ url('/') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img class="w-32" src="{{ asset('img/logo.png') }}" alt="Pick & Share Logo">
            <span class="ml-3 text-2xl">Pick & Share</span>
        </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900">Home</a>
            <a class="mr-5 hover:text-gray-900">About</a>
            <a class="mr-5 hover:text-gray-900">Terms & Conditions</a>
            <a class="mr-5 hover:text-gray-900">Privacy & Policy</a>
            <a class="mr-5 hover:text-gray-900">Contact</a>
        </nav>

        @if (Route::has('login'))
        @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>&nbsp;&nbsp;
        <a href="{{ route('profile.show')}}">Profile</a>&nbsp;&nbsp;
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Log
                Out
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </form>
        @else
        <a href="{{ route('login') }}">Log in</a>&nbsp;&nbsp;
        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Register
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        @endif
        @endauth
        @endif

    </div>
</header>
<!-- /Header -->
