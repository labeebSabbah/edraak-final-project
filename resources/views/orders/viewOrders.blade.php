<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<style type="text/css">
		span {
			margin-left: 90px;
		}
	</style>
</head>
<body>
	@include('components.admin-nav')
	<div class="flex justify-center">
  			<ul class="bg-white rounded-lg border border-gray-200 text-gray-900 " style="width: 75%; margin-left: 15em;">
  				<li class="px-6 py-2 border-b border-gray-200 w-full">
    					<span>ID</span>
    					<span>Customer</span>
    					<span style="margin-left: 116px;">Creation Date</span>
    					<span style="margin-left: 55px;">Total Items</span>
    					<span style="margin-left: 30px;">Total Price</span>
    					<span style="margin-left: 78px;">Status</span>
    				</li>
    			@foreach ($orders as $order)
    			<a href="#">
    				<li class="px-6 py-2 border-b border-gray-200 w-full">
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
</body>
</html>