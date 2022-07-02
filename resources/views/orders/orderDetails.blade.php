<?php if (!isset($admin)) {
	$admin = false;
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order #{{$order->id}}</title>
</head>
<body>
	<?php $items = unserialize($order->items); $totalItems = 0; ?>
<div onclick="history.back()" style="cursor: pointer;">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="50" height="50" viewBox="0 0 20 20" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="position: absolute;">
   		<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   		<line x1="5" y1="12" x2="19" y2="12"></line>
   		<line x1="5" y1="12" x2="11" y2="18"></line>
   		<line x1="5" y1="12" x2="11" y2="6"></line>
	</svg>
</div>
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