{{-- <ul class="flex md:flex-row space-x-6 mr-6 text-black text-lg items-end justify-center">
    @auth
    <li>
       <span class="font-bold uppercase">
        Welcome {{auth()->user()->name}}
       </span>
    </li>
    <li>
        <a href="/listings/manage" class="hover:text-title"
            ><i class="fa-solid fa-gear"></i>
            Manage Listings</a
        >
    </li>
    <li>
        <form class='inline' method="POST" action="/logout">
           @csrf
           <button type='submit' class='hover:text-title'>
            <i class="fa-solid fa-door-closed"></i> Logout
           </button> 
        </form>
    </li>
    @else
    <li>
        <a href="/register" class="hover:text-title"
            ><i class="fa-solid fa-user-plus"></i> Register</a
        >
    </li>
    <li>
        <a href="/login" class="hover:text-title"
            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</a
        >
    </li>
    @endauth
</ul> --}}

<div x-data="{ open: false }" class="relative inline-block text-left">
    @auth
    <div>
      <button @click="open = ! open" type="button" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" id="menu-button" aria-expanded="true" aria-haspopup="true">
        {{auth()->user()->name}}
        <!-- Heroicon name: mini/chevron-down -->
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <div x-show="open" @click.outside="open = false" class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
      <div class="py-1" role="none">
        <a href="/listings/manage" class="text-gray-700 block px-4 py-2 text-sm hover:text-title hover:font-medium" role="menuitem" tabindex="-1" id="menu-item-1">Manage Jobs</a>
      </div>
      <div class="py-1" role="none">
        <form action="/logout" method="POST">
        @csrf
        <button type='submit' href="#" class="text-gray-700 block px-4 py-2 text-sm hover:text-title hover:font-medium" role="menuitem" tabindex="-1" id="menu-item-6">Log Out</button>
        </form>
      </div>
    </div>
    @else
    <ul class='flex md:flex-row space-x-6 mr-6 text-black text-lg items-end justify-center'>
    <li>
        <a href="/register" class="hover:text-title"
            ><i class="fa-solid fa-user-plus"></i> Register</a
        >
    </li>
    <li>
        <a href="/login" class="hover:text-title"
            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</a
        >
    </li>
    </ul>
    @endauth
  </div>