<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
require_once "$path/system/sysSignup.php";
?>

<!DOCTYPE html>
<html lang="en">
    <? include_once "$path/private/head.php"; ?>
<body>
    <div class="container">
        <? include_once "$path/private/header.php";?>

        <div class="input-field ">
            <h3 class="reg__header">Для входа пройдите регистрацию</h3>
                <div class="row">
                    <form id="formSignup" method="post"  class="col s6 offset-s3">

                        <div class="error__block">
                            <?
                                if(empty($errors)){
                                    echo "";

                                }else{
                                    echo "<span>$errors[0]</span>" ;
                                }
                            ?>
                        </div> 
                
                        <div class="row">

                            <div class="input-field col s12">
                                <input id="login" name="login" type="text" class="validate" <? if(isset($_POST['login'])) echo "value='$_POST[login]'"; ?>>
                                <label for="login">Логин</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Пароль</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="passwordCheck" name="passwordCheck" type="password" class="validate">
                                <label for="password">Введите пароль еще раз</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="first_name" name="first_name" type="text" class="validate">
                                <label for="first_name">Имя</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="last_name" name="last_name" type="text" class="validate">
                                <label for="last_name">Фамилия</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="b_date" name="b_date" type="date" class="validate">
                            </div>

                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate">
                                <label for="email">Электронная почта / email@email.com</label>
                            </div>

                            <div class="btn-field col s12">
                                <button  class=" offset-s12 btn waves-effect waves-light " type="submit" name="signup">Зарегистрироваться
                                    <i class="material-icons right">send</i>
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





