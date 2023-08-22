{{-- msg --}}
@if (session('msg'))
<h1 class="text-red-500 font-bold pt-24 pb-3 text-center text-2xl">{{ session('msg') }}</h1>
{{-- apply btn or not --}}
@include('component.applyForDriverProfile')
@endif
{{-- /msg --}}