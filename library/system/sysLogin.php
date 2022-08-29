<?

function clearValue($value){
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}


if(isset($_POST['signup'])){

    $query = $db -> prepare("SELECT * FROM library.users WHERE login = :login");

    $query -> execute([
        ":login" => clearValue($_POST['login'])
    ]);

    if($query -> rowCount() > 0){
        $password = $query -> fetch()['password'];
        if(password_verify($_POST['password'], $password)){
            header("location: /main");
        }
    }
}

    

    





            
          
        



    




    
?>