<?php 
use Illuminate\Support\Facades\DB;
$items = DB::table('categories')->select('*')->where('is_main', true)->value('name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h2>Main Categories</h2>
    <form action="/create" method="get">
        <input type="text" name="name" placeholder="Add Product">
        <button type="submit" name="main" value="1">Add</button> <br>
        <?php 
            print_r($items);
        ?>
    </form>
</body>
</html>