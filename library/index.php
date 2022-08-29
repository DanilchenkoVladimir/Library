<?
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
session_start();


if($_SERVER['REDIRECT_URL'] == "/" or $_SERVER['REDIRECT_URL'] == "/main"):
    require_once "$path/public/main.php";

elseif($_SERVER['REDIRECT_URL'] == "/login"):
    require_once "$path/public/login.php";

elseif($_SERVER['REDIRECT_URL'] == "/signup"):
    require_once "$path/public/signup.php";

else:    
    require_once "$path/public/404.php";
endif;    

?>
