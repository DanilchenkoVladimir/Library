<?
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "system/db.php"; //подключили базу
// // $db->query("insert")




// блок проверки подключена ли база, выводит данные в переменной $db
// echo "<pre>"; 
// print_r($db);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

    <? include_once "$path/private/head.php"; ?>
    
<body>
    <div class="container">

        <? include_once "$path/private/header.php"; ?>

        <main class="main_startPage">
            <a href="/public/login.php">
                <div id="btn1" class="btn">Login</div>
            </a> 

            <a href="/public/signup.php">
                <div id="btn2" class="btn">Sign Up</div>
            </a>
        </main> 

        <? include_once "$path/private/footer.php"; ?>

    </div>
    
    <!-- <script>
        $.ajax({
            type:"post",
            url:"add.php",
            deat: {
                age: 23,
                name: "bobik"
            },
            success: function(){

            }

        })


        // fetch("add.php?age=23&name=bobik"); get запрос фетч

    </script> -->
</body>
</html>