<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<style type="text/css">
		button {
			margin-right: 10px;
		}
	</style>
</head>
<body bgcolor="#1363DF">
	@include('components.admin-nav')

	<div class="flex justify-center">
  			<ul class="rounded-lg border border-gray-200 text-gray-900 " style="width: 75%; margin-left: 15em; background: #47B5FF;">
  				<li class="px-6 py-2 border-b border-gray-200 w-full"><a href="/createMain"><button >Add</button></a></li>
  				<form method="get" action="/deleteCat" id="deleteForm">
    			@foreach ($mainCat as $main)
    			<li class="px-6 py-2 border-b border-gray-200 w-full">
    				<span>{{$main->id}}</span>
    				<span style="margin-left: 20px;">{{$main->name}}</span>
    				<span style="float: right; display: block;">
    					<a href="/createSub?id={{$main->id}}"><button type="button" >Add</button></a>
    					<a href="/updateCat/{{$main->name}}"><button type="button" >Update</button></a>
    					<button type='submit' name='name' value='{{$main->id}}' >Delete</button>
    				</span>
    				<ul style="margin: auto;margin-top: 0.5em; width: 70%;">
    					@foreach ($subCat as $sub)
    					@if ($sub->main_id == $main->id)
    					<li>
    						<span style="margin-left: 20px;">{{$sub->name}}</span>
    						<span style="float: right; display: block;">
    							<a href="/updateCat/{{$sub->name}}"><button type="button" >Update</button></a>
    							<button type='submit' name='name' value='{{$sub->name}}' >Delete</button>
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

	<script type="text/javascript" src="./js/confirm.js"></script>
</body>
</html>