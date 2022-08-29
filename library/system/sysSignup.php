<?

function clearValue($value){
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}

function hashPassword($password){
    $password = password_hash($password,PASSWORD_DEFAULT);
    return $password;
}

if(isset($_POST['signup'])){

    $errors=[];                                           
    if($_POST['login'] == "") $errors[]="Введите логин!";
    if($_POST['password'] == "") $errors[]="Введите пароль!";
    if($_POST['email'] == "") $errors[]="Введите электронную почту!";
    if($_POST['password'] != $_POST['passwordCheck']) $errors[]="Пароли не совпадают!";

    if(empty($errors)){
        $query = $db -> prepare("INSERT INTO 
                    library.users(
                        login, 
                        password, 
                        first_name, 
                        last_name, 
                        b_date, 
                        email
                    ) VALUES (
                        :login, 
                        :password, 
                        :first_name, 
                        :last_name, 
                        :b_date, 
                        :email
                    )");
        $query -> execute([
            ":login"=>clearValue($_POST['login']), 
            ":password"=>hashPassword($_POST['password']), 
            ":first_name"=>clearValue($_POST['first_name']), 
            ":last_name"=>clearValue($_POST['last_name']), 
            ":b_date"=>clearValue($_POST['b_date']), 
            ":email"=>clearValue($_POST['email'])
        ]);
    
        $_SESSION['signup']=true;
        header("location: /login");
    }     
}
?>