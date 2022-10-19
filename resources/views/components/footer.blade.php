
 {{-- footer section --}}
 {{-- <footer class ='bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black
    text-white h-20 mt-24 md:justify-center'> --}}
<footer {{ $attributes->merge(['class' => 'w-full flex items-center justify-start font-bold bg-black
    text-white h-20 mt-24 md:justify-center'])}}>
    <div class='flex justify-between items-center w-full flex-wrap px-4'>
        <p class="ml-2"> © 2022 All Rights Reserved</p>
        <p class="ml-2">Bryan Palad | Made with Laravel & Tailwind CSS</p>
        <a
            href="/listings/create"
            class="top-1/3 right-10 bg-white text-black py-2 px-5"
            >Post Job</a
        >
    </div>

 <x-flash-message/>
 </footer>