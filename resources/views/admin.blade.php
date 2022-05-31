<?php 
use Illuminate\Support\Facades\DB;
$mainCats = DB::select('SELECT * FROM categories WHERE is_main = true');
$subCats = DB::select('SELECT * FROM categories WHERE is_main = false');
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
    <form action="/createCat" method="get" id="mainForm">
        <input type="text" name="name" placeholder="Add Product" id="mainName">
        <button type="submit" name="main" value="1">Add</button> <br>
    </form>
    <ol>
    <?php 
            foreach ($mainCats as $item) {
                $name = $item->name;
                echo "<li name='{$name}' class='names'>{$name}</li>";
            }
        ?>
    </ol>
    <div style="margin-left: 200px;">
    <h2>Sub-Categories</h2>
    <form action="/createCat" method="get" id="secForm">
        <input type="text" name="name" placeholder="Add Product" id="secName">
        <button type="submit" name="main" value="0">Add</button> <br>
    </form>
    <ol>
        <form method="get" action="/deleteCat" id="deleteForm">
    <?php 
            foreach ($subCats as $item) {
                $name = $item->name;
                echo "<li name='{$name}' class='names'>{$name}<button type='submit' name='cat' value='{$name}'>Delete</button></li>";
            }
        ?>
    </form>
    </ol>
        </div>
    <script>
        const mainForm = document.getElementById('mainForm');
        const secForm = document.getElementById('secForm');
        const mainName = document.getElementById('mainName');
        const secName = document.getElementById('secName');
        const names = document.getElementsByClassName('names');
        const deleteForm = document.getElementById('deleteForm');

        function addCategory(name) {
            let error = '';
            if (name.value == "") {
                e.preventDefault();
                alert("Enter A Name!");
                error += "error";
            }
            for (let i = 0; i < names.length; i++) {
                if (name.value == names[i].innerHTML) {
                    error += name.value + " Already Exists";
                    if (error) {
                        e.preventDefault();
                        alert(error);
                    }
                }
            }
            if (!error) {
                alert("Added Successfully");
            }
        }
        
        mainForm.addEventListener("submit", function (e) {
            addCategory(mainName);
        }
            // let error = '';
            // if (mainName.value == "") {
            //     e.preventDefault();
            //     alert("Enter A Name!");
            //     error += "error";
            // }
            // for (let i = 0; i < names.length; i++) {
            //     if(mainName.value == names[i].innerHTML)  {
            //         error += mainName.value + " Already Exists";
            //         if (error) {
            //             e.preventDefault();
            //             alert(error);
            //         }
            //     }
            // }
            // if (!error) {
            //     alert("Added Successfully");
            // }
        );

        secForm.addEventListener("submit", function (e) {
            let error = '';
            if (secName.value == "") {
                e.preventDefault();
                alert("Enter A Name!");
                error += "error";
            }
            for (let i = 0; i < names.length; i++) {
                if(secName.value == names[i].innerHTML)  {
                    error += secName.value + " Already Exists";
                    if (error) {
                        e.preventDefault();
                        alert(error);
                    }
                }
            }
            if(!error) {
                alert("Added Successfully");
            }
        });

        deleteForm.addEventListener("submit", function (e) {
            let error = '';
            let choice = confirm("Are you sure that you want to Delete it ??");
            if (!choice) {
                e.preventDefault();
            } else {}
            if(error) {
                e.preventDefault();
                alert("Can't Delete the file");
            } else {
                alert("File Deleted Successfully");
            }
        });
    </script>
</body>
</html>