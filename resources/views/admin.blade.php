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
    <form action="/create" method="get" id="mainForm">
        <p id="message"></p>
        <input type="text" name="name" placeholder="Add Product" id="mainName">
        <button type="submit" name="main" value="1">Add</button> <br>
    </form>
    <ol>
    <?php 
            foreach ($items as $item) {
                $name = $item->name;
                echo "<li name='{$name}' class='mainNames' value='{$name}'>{$name}</li>";
            }
        ?>
    </ol>
    <script>
        const mainForm = document.getElementById('mainForm');
        const mainName = document.getElementById('mainName');
        const messages = document.getElementById('message');
        const mainNames = document.getElementsByClassName('mainNames');
        
        mainForm.addEventListener("submit", function (e) {
            let error = '';
            for (let i = 0; i < mainNames.length; i++) {
                if(mainName.value == mainNames[i].innerHTML)  {
                    error += mainName.value + "Already Exists";
                    if (error) {
                        e.preventDefault();
                        messages.innerHTML = error;
                    }
                }
            }
        });
    </script>
</body>
</html>