<?
    $path=$_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";

    $query=$db->query("SELECT id FROM `users` WHERE `login`='$_POST[searchLogin]' ");
    if($query->num_rows>0){
        echo "данный логин занят!";
    }
    else {
        echo "логин свободен";
    }

    // "$_POST[dddd]"
    // $_POST['dddd']
?>