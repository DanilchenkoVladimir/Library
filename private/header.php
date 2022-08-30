<?php
$path=$_SERVER['DOCUMENT_ROOT'];

require_once "$path/system/sysLogoff.php";

if(isset($_POST['logIn'])){
  header("location: /catalog");
}
?>

<nav class="nav-extended ">
    <div class="nav-wrapper teal lighten-1">
      <a href="/main" class="brand-logo">Библиотека БУКИНИСТ</a>
    </div>

    <div class="nav-content teal lighten-1">      
      <div class="row">
        <div class="col s4 offset-s8">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Читательский Билет</span>
                
                <?
                  if(isset($_SESSION['login'])){
                    echo   "<div class='card__descr'>Логин: $_SESSION[login]</div>";
                    echo  "<div class='card__descr'>Имя: $_SESSION[login]</div>";
                    echo  "<div class='card__descr'>Фамилия: $_SESSION[login]</div>";
                  }else{
                    echo  '<p>Гость</p>';
                  }
                ?>

            </div>

            <div class="card-action">                         
                <?
                  if(isset($_SESSION['login'])){?>
                      <form action="" method="post">
                        <input class="header__button" type="submit" name="logOff" value="ВЫХОД">
                      </form>
                      
                  <?}else{
                      echo  '<a href="/login">Войти</a>';
                      echo  '<a href="/signup">Зарегистрироваться</a>';
                  }
                ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
</nav>