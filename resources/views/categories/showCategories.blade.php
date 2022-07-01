<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
</head>
<body>
	@include('components.admin-nav')

	<div class="flex justify-center">
  			<ul class="bg-white rounded-lg border border-gray-200 text-gray-900 " style="width: 75%; margin-left: 15em;">
  				<li class="px-6 py-2 border-b border-gray-200 w-full"><a href="/createMain"><button>Add</button></a></li>
  				<form method="get" action="/deleteCat" id="deleteForm">
    			@foreach ($mainCat as $main)
    			<li class="px-6 py-2 border-b border-gray-200 w-full">
    				<span>{{$main->id}}</span>
    				<span style="margin-left: 20px;">{{$main->name}}</span>
    				<span style="float: right; display: block;">
    					<a href="/createSub?id={{$main->id}}"><button>Add</button></a>
    					<a href="/updateCat/{{$main->name}}"><button>Update</button></a>
    					<button type='submit' name='name' value='{{$main->id}}'>Delete</button>
    				</span>
    				<ul>
    					@foreach ($subCat as $sub)
    					@if ($sub->main_id == $main->id)
    					<li>
    						<span style="margin-left: 20px;">{{$sub->name}}</span>
    						<span style="float: right; display: block;">
    							<a href="/updateCat/{{$sub->name}}"><button>Update</button></a>
    							<button type='submit' name='name' value='{{$sub->id}}'>Delete</button>
    						</span>
    					</li>
    					@endif
    					@endforeach
    				</ul>
    			</li>
    			@endforeach
    			</form>
  			</ul>
	</div>

	<script type="text/javascript">

			const deleteForms = document.getElementsByClassName('deleteForms');

			for (let i = 0; i < deleteForms.length; i++) {
				deleteForms[i].addEventListener('submit', function (e) {
					var error = '';
					var choice = confirm('Are You Sure That You Want To Delete It ?');
					if (!choice) {
						e.preventDefault();
					} else {
						alert("Category Deleted Successfully");
					}
					if (error) {
						alert(error);
					}
				});
			}
	</script>
</body>
</html>