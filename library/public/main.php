

<!DOCTYPE html>
<html lang="en">
    <? include_once "$path/private/head.php"; ?>
<body>
    <div class="container">
<? include_once "$path/private/header.php";?>

страница майн

<?
    if(isset($_SESSION['login'])){
        

        echo   $_SESSION['login'];
    }
?>

<? include_once "$path/private/script.php"; ?>
</body>
</html>