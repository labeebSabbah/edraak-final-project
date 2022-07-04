<?php 
use Illuminate\Support\Facades\Auth;

if (Auth::user()->name != $order->customerName) {
	header("Location: https://edraak-final-project.herokuapp.com/myOrders");
	exit();
}

if (!isset($admin)) {
	$admin = false;
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="/css/app.css"> -->
	<title>Order #{{$order->id}}</title>
	<style type="text/css">
		table,tr,td {
			background: #47B5FF;
			border: 2px solid #06283D;
		}
		table {
			border-radius: 6px;
		}
		h1 {
			font-size: xx-large;
		}
		h2 {
			font-size: x-large;
		} h3 {
			font-size: large;
		}
	</style>
</head>
<body bgcolor="#1363DF">
	
	<?php $items = unserialize($order->items); $totalItems = 0; ?>
	@include ('components.backIcon')
	<table border="1px solid black" width="70%" style="text-align: center; margin: auto;">
		<tr>
			<td><div><h1>Order #{{$order->id}}</h1></div></td>
		</tr>
		<tr>
			<td><div><h2>Customer:- {{$order->customerName}}</h2></div></td>
		</tr>
		<tr>
			<td><div><h3>Ordered At:- {{$order->created_at}}</h3></div></td>
		</tr>
		<tr>
			<td>
				<ul>
					@foreach ($items as $item)
					<?php $totalItems += $item['quantity']; ?>
					<h3><li>{{$item['name']}}&nbsp x{{$item['quantity']}}&nbsp {{floatval($item['price']) * floatval($item['quantity'])}}$</li></h3>
					@endforeach
				</ul>
			</td>
		</tr>
		<tr>
			<td><h3>Total Order Items:- {{$totalItems}}</h3></td>
		</tr>
		<tr>
			<td><h3>Total Order Cost:- {{$order->total}}$</h3></td>
		</tr>
		<tr>
			<td><h3>Status:- {{ucfirst($order->status)}}</h3></td>
		</tr>
		@if ($admin)
		<tr>
			<td>
				<form method="get" action="/updateStatus" id="updateForm">
					<label for="status">Update Status</label>
					<select name="status" id="status">
						<option selected></option>
						<option value="Processing">Processing</option>
						<option value="Shipped">Shipped</option>
						<option value="Delivered">Delivered</option>
						<option value="Completed">Completed</option>
						<option value="Canceled">Canceled</option>
					</select>
					<button type="submit" name="id" value="{{$order->id}}">Update</button>
					<button type="button" onclick="history.back();">Cancel</button>
				</form>
			</td>
		</tr>
		@endif
	</table>
	<script type="text/javascript">
		
		const updateForm = document.getElementById('updateForm');
		const status = document.getElementById('status');

		updateForm.addEventListener('submit', function (e) {
			if (status.value == "Canceled") {
				if (prompt("Please Type \"Confirm\" To Cancel The Order. ") === "Confirm") {
					alert("Order Canceled Successfully");
				} else {
					e.preventDefault();
				}
			}
		});

	</script>
</body>
</html>