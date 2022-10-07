{{-- you can use success or error instead of message depending on the session at controller. --}}
@if(session()->has('message'))
    {{-- alpine js -> x-data is the state, x-initialize and x-show if the value of x-data is true then it will show --}}
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
    <p>
        {{session('message')}}
    </p>
    </div>
@endif