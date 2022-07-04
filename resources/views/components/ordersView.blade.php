<div class="flex justify-center">
  			<ul class="bg-white rounded-lg border border-gray-200 text-gray-900 " style="width: 75%; background: #47B5FF;  <?php if (Auth::user()->is_admin) {echo "margin-left: 15em";} else {echo "margin: auto";} ?>;">
  				<li class="px-6 py-2 border-b border-gray-200 w-full">
    					<span>ID</span>
    					<span>Customer</span>
    					<span style="margin-left: 116px;">Creation Date</span>
    					<span style="margin-left: 55px;">Total Items</span>
    					<span style="margin-left: 30px;">Total Price</span>
    					<span style="margin-left: 78px;">Status</span>
    				</li>
    			@foreach ($orders as $order)
    			<a <?php if (Auth::user()->is_admin) {echo "href='/orders/{$order->id}'";} else {echo "href='/myOrders/{$order->id}'";} ?>>
    				<li class="px-6 py-2 border-b border-gray-200 w-full hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out">
    					<span>{{$order->id}}</span>
    					<span>{{$order->customerName}}</span>
    					<span>{{$order->created_at}}</span>
    					<span>{{$order->numberOfItems}}</span>
    					<span>{{$order->total}}</span>
    					<span>{{$order->status}}</span>
    				</li>
    			</a>
    			@endforeach
  			</ul>
  		{{ $orders->links() }}
	</div>