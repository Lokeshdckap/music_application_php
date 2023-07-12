<?php

// Block the normal user for admin panel
if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;
  // fetch the all users show to the admin panel
try{
    
    $statement = $conn['db']->query('SELECT * from users');
    $allUsers = $statement->fetchAll();
    // $_SESSION['requests'] = $request;

    $statements = $conn['db']->query('SELECT users.id as id,users.is_premium,users.name,user_premium_request.request
    FROM user_premium_request
    INNER JOIN users ON user_premium_request.user_id=users.id');
    $request = $statements->fetchAll();
    // var_dump($request);
    // $_SESSION['requests'] = $request;
    require "views/admin.view.php";


}
catch(Expection $e)
{
    die($e->getMessage());
}