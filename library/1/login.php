<?
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";


if(isset($_POST['send'])){ 
    $searchLogin=$db->query("SELECT `password` FROM `users` WHERE `login`='$_POST[login]'");
        if($searchLogin->num_rows>0){
            if($_POST['password'] == $searchLogin->fetch_assoc()['password']){
                $_SESSION['auth']=true; //записываем в глобальную перемеенную SESSION инф о авторизации
                $_SESSION['login']=$_POST['login']; //записываем в глобальную перемеенную SESSION инф о пользователе, его логин
                header("location: /public/chat.php");
            }
            else{
                echo "пароль не подходит";
            }
        }   
}
?>

<!DOCTYPE html>
<html lang="en">

    <? include_once "$path/private/head.php"; ?>
    
<body>
    <div class="container">

        <? include_once "$path/private/header.php"; ?>

        <main class="main_startPage">
        <div class="signupWindow">
                <h3>Log In</h3>                
                <form action="" method="post">
                    <?
                        if(isset($_SESSION['signup'])){
                            echo "<span>Signup sucess</span>";
                            $_SESSION['signup']=NULL;
                        }
                    ?>

                    <input type="text" name="login" id="login" placeholder="login" <? if(isset($_POST['login'])) echo "value='$_POST[login]'";?>>
                    <input type="text" name="password" id="password" placeholder="password">
                    <input type="submit" name="send" value="Log In">

                </form>
            </div>
        </main> 

        <? include_once "$path/private/footer.php"; ?>

    </div>
</body>
</html>