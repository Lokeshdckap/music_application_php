<?php

$email = $_POST['email'];
$password = $_POST['password'];



if($email && $password){
    $statement = $conn['db']->query("select * from users where email ='$email' and password = md5('$password')");
    $exists = $statement->fetchAll();


    // var_dump();
    if($exists[0]['role_as'] == 1){

        $_SESSION['login'] = [
            'email' => $email
        ];
        header('Location:/dashboard');
    }
    else if($exists[0]['role_as'] == 0){
         $_SESSION['login'] = [
        'email' => $email
    ];
    header('Location:/');
}
    else{
        $_SESSION['Incorrect Details'] = "Incorrect Details";
        header('Location:/login');
    }



    $statement = $conn['db']->query("select name from users where email ='$email'");
    $exists = $statement->fetchAll();

    // var_dump($exists['name']);
    foreach($exists as $exist){
        $_SESSION['name'] = $exist['name'];
        
    }

    $statement = $conn['db']->query("select id from users where email ='$email'");
    $exists = $statement->fetchAll();
    $_SESSION['id'] = $exists[0]['id'];
    // var_dump($exists['name']);
    // foreach($exists as $exist){
    //     $ = $exist['id'];
    // }
}