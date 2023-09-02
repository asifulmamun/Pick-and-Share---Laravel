<div class="px-8 py-10">
    <h1 class="text-2xl font-semibold">Dashboard ss</h1>
</div>
<ul class="flex-grow w-full">
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('adminDashboardMenuClass')"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('activeDriversMenuClass')"><a href="{{ route('admin.activeDrivers') }}">Active Drivers</a></li>
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('pendingDriversMenuClass')"><a href="{{ route('admin.pendingDrivers') }}">Pending Drivers</a></li>
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('inActiveDriversMenuClass')"><a href="{{ route('admin.inActiveDrivers') }}">In-Active Drivers</a></li>
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('contractsAdmin')"><a href="{{ route('admin.contracts') }}">All Contracts</a></li>
    <li class="p-4 hover:bg-gray-700 cursor-pointer @yield('contractedAdmin')"><a href="{{ route('admin.contracted') }}">All Contracted</a></li>

</ul>