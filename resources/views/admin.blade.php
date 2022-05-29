<?php 
use Illuminate\Support\Facades\DB;
$items = DB::select('SELECT * FROM categories WHERE is_main = true');
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
    </form>
    <ol>
    <?php 
            foreach ($items as $item) {
                $name = $item->name;
                echo "<li name='{$name}'>{$name}</li>";
            }
        ?>
    </ol>
</body>
</html>