<?php

$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

if(isset($_POST['send'])){

    $errors=[];

    if($_POST['login'] == "") $errors[]="Введите логин!";
    
    if($_POST['password'] == "") $errors[]="Введите пароль!";
    
    if($_POST['password'] !=$_POST['password2']) $errors[]="Пароли не совпадают!";
    

    if(empty($errors)){
        $db->query("INSERT INTO `users` (`login`, `password`, `time_signup`) VALUES ('$_POST[login]', '$_POST[password]', 3333) ");
        $_SESSION['signup']=true;
        header("location: /public/login.php");
    }

    else {
        echo $errors[0];
    }
    
}

// function generateSalt()
//                     {
//                         $salt = '';
//                         $saltLength = 8; //длина соли
//                         for($i=0; $i<$saltLength; $i++) {
//                             $salt .= chr(mt_rand(33,126)); //символ из ASCII-table
//                         }
//                         return $salt;
//                     }
?>

<!DOCTYPE html>
<html lang="en">

    <? include_once "$path/private/head.php"; ?>
    
<body>
    <div class="container">

        <? include_once "$path/private/header.php"; ?>

        <main class="main_startPage">
            <div class="signupWindow">
                <h3>SignUp</h3>
                <form action="" method="post">
                    <input type="text" name="login" id="login" autocomplete="off" placeholder="login">
                    <span id="searchLogin"></span>
                    <input type="text" name="password" id="password" placeholder="password">
                    <input type="text" name="password2" id="password2" placeholder="password2">
                    <input type="submit" name="send" value="Sign Up">
                </form>
            </div>
        </main>

        <script>
            login.oninput=()=>{
                if(login.value.length>2){
                    $.ajax({
                            type: "post",
                            url: "/system/searchLogin.php",
                            data:{
                                "searchLogin": login.value
                        },
                            success:data=>{
                            searchLogin.innerHTML=data;
                        }
                    })
                }
                
            }
        </script>

        <? include_once "$path/private/footer.php"; ?>

    </div>
</body>
</html>