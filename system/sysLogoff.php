<?

if(isset($_POST['logOff'])){
    $_SESSION['auth']=NULL;
    $_SESSION['login']=NULL;
    header("location: /login");
}

    
?>