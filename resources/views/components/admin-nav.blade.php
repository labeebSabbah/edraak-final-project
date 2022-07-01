<div class="w-60 h-full shadow-md bg-white px-1 absolute">
  	<ul class="relative" style="margin-top: 13vw;">
    	<li class="relative">
      		<a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="/categories" data-mdb-ripple="true" data-mdb-ripple-color="dark">Categories</a>
    	</li>
    	<li class="relative">
      		<a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="/products" data-mdb-ripple="true" data-mdb-ripple-color="dark">Products</a>
    	</li>
    	<li class="relative">
      		<a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="/orders" data-mdb-ripple="true" data-mdb-ripple-color="dark">Orders</a>
    	</li>
    	<li class="relative">
    		<form method="POST" action="{{ route('logout') }}">
    			@csrf
      	<x-dropdown-link :href="route('logout')" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
             </x-dropdown-link></form>
    	</li>
  	</ul>
</div>