<nav style="border: 1px solid black; padding: 10px 0px;">
    <a href="/">
        
    </a>
    <a href="/cart" style="">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="6" cy="19" r="2"></circle>
   <circle cx="17" cy="19" r="2"></circle>
   <path d="M17 17h-11v-14h-2"></path>
   <path d="M6 5l14 1l-1 7h-13"></path>
</svg>
    </a>
    <a href="/logout">
        <form method="POST" action="{{route('logout')}}" style="width: 50%;">
            <x-dropdown-link :href="route('logout')" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
             </x-dropdown-link>
        </form>
    </a>
</nav>