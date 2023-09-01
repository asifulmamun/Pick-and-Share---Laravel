<!-- Header -->
<header class="fixed top-0 left-0 w-full z-50">
  <nav class="bg-white border-gray-200">
    <div class="relative max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="{{ url('/') }}" class="flex items-center">
          <img src="{{ asset('img/logo.png') }}" class="h-8 mr-3" alt="{{ config('app.name', 'PickShare') }}" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ config('app.name', 'PickShare') }}</span>
      </a>
      <div class="hidden items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
          <li>
            <a href="{{ url('/') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
          </li>
          <li>
            <a href="{{ url('/') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:active:text-blue-700 md:focus:text-blue-700 md:p-0">About</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Services</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Pricing</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Contact</a>
          </li>
        </ul>
      </div>
      
      <div class="flex items-center md:order-2 relative">
        {{-- Logged User --}}
        @auth
        <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email))) }}?s=200" alt="{{ auth()->user()->name }}">
        </button>
        <!-- Dropdown menu -->
        <div class="hidden absolute top-5 right-0 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
          <div class="px-4 py-3">
            <a href="{{ route('profile.show') }}" class="block text-sm text-gray-900">{{ Auth::user()->name }}</a>
            <span class="block text-sm  text-gray-500 truncate">{{ Auth::user()->email }}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
  
            @if (Auth::user()->role == 2 && Route::has('driver.dashboard')) {{-- Driver --}}
            <li><a href="{{ route('driver.dashboard')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a></li>
            <li><a href="{{ route('driver.profile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Driver Profile</a></li>
            
            @elseif(Auth::user()->role == 1 && Route::has('admin.dashboard')) {{-- Admin --}}
            <li><a href="{{ route('admin.dashboard')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a></li>
            @endif {{-- Logged User --}}
            <li><a href="{{ route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a></li>
            <li><a href="{{ route('dashboard')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">User Dashboard</a></li>
  
            {{-- logout --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit"
                  class="block w-full text-left px-4 py-2 text-sm text-white bg-red-400 hover:bg-blue-400">Sign Out
                  </button>
              </form>
            </li>
            {{-- /logout --}}
          </ul>
        </div>
        @else {{-- This else for !@auth --}}
        <span class="group relative">
          <a href="{{ route('login') }}">
            <svg class="w-6 h-6 mt-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
          </a>&nbsp;&nbsp;
          
          <div class="hidden group-hover:block absolute top-10 right-0 z-30 bg-white px-3 py-2">
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign In</a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ragistration</a>
          </div>
        </span>
        @endauth
        {{-- /Logged User --}}

          <button id="navbar-user-toggle" data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
      </div>
  
  
    </div>
  </nav>
</header>
<!-- /Header -->





<script>
  // Get references to the button and dropdown elements
  const userMenuButton = document.getElementById('user-menu-button');
  const userDropdown = document.getElementById('user-dropdown');

  // navbar user
  const navbarUserButton = document.getElementById('navbar-user-toggle');
  const navbarUser = document.getElementById('navbar-user');

if(userMenuButton && userDropdown){
    // Add a click event listener to the button
    userMenuButton.addEventListener('click', () => {
    // Toggle the 'hidden' class to show/hide the dropdown
    userDropdown.classList.toggle('hidden');
  });

};

if(navbarUserButton && navbarUser){
  // Add a click event listener to the button
  navbarUserButton.addEventListener('click', () => {
    // Toggle the 'hidden' class to show/hide the dropdown
    navbarUser.classList.toggle('hidden');
    navbarUser.classList.toggle('absolute');
    navbarUser.classList.toggle('top-14');
    navbarUser.classList.toggle('right-0');
    navbarUser.classList.toggle('z-40');
  });
};

</script>
