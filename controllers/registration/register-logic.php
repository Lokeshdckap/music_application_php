<?php
unset($_SESSION['Already Exists']);

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if($email&&$password){
    $statement = $conn['db']->query("select * from users where email ='$email'");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['Already Exists'] = "Already Exists";
        header('Location:/registration');
    }
    else{
        $statement = $conn['db']->query("insert into users (name,email,password) values ('$username ','$email', md5('$password'))");
        $_SESSION['login'] = [
            'email' => $email
        ];
        header('Location:/');
    }



    $statement = $conn['db']->query("select name from users where email ='$email'");
    $exists = $statement->fetchAll();
    
    foreach($exists as $exist){
        $_SESSION['name'] = $exist['name'];
    }
}




