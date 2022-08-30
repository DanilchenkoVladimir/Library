<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
require_once "$path/system/sysLogin.php";
?>

<!DOCTYPE html>
<html lang="en">
    <? include_once "$path/private/head.php"; ?>
<body>
    <div class="container">

        <? include_once "$path/private/header.php"; ?>
      
        <div class="form__wrap">
            <div class="input-field ">
                <h3 class="reg__header">Добро пожаловать в нашу библиотеку !</h3>
                <p class="reg__descr">для входа введите логин и пароль</p>

                <div class="row">
                <form class="col s6 offset-s3" id="formLogin" method="post">

                        <div class="error__block">
                            <?
                                if(isset($_SESSION['signup'])){
                                    echo "<span class='reg_success'>Вы успешно зарегистрированы!</span>";
                                    $_SESSION['signup']=NULL;
                                }
                            ?>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="login" name="login" type="text" class="validate" <? if(isset($_POST['login'])) echo "value='$_POST[login]'"; ?>>
                                <label for="login">Логин</label>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Пароль</label>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="btn-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="LOGIN">Вход
                                <i class="material-icons right">lock_open</i>
                                </button>
                            </div>
                        </div>  
                </form> 
            </div>
        </div>

    </div>

    <? include_once "$path/private/script.php"; ?>

</body>
</html>