<?php

// if ($_SESSION['roles_as']==0) {

//     $_SESSION['error'] = "Access Denied Your not a Admin";
//     header('Location: /');
// }
$conn['db'] = (new Database())->db;

// Premium users store the request 

try{
    if(isset($_POST['action'])) {

    $id = $_POST['action'];
    $user_id = $_POST['user_id'];
    $request = $_POST['request'];
    $ins = $conn['db']->query("INSERT INTO user_premium_request(user_id,request)VALUES('$user_id','$request')");
    header('location:/');
    }
}
catch(Expection $e)
{
    die($e->getMessage());
}
