<?php
$conn['db'] = (new Database())->db;

try{
    // $id= $_POST['projects'];

    $statement = $conn['db']->query('SELECT * from users');
    $allUsers = $statement->fetchAll();

    $statements = $conn['db']->query('SELECT users.name,user_premium_request.request
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