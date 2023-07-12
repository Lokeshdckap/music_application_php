<?php
// Block the normal users to admin panel
if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
require 'views/admin.view.php';


$conn['db'] = (new Database())->db;

try{
    
// Fecth the all users to Admin Dashboard
    $statement = $conn['db']->query('SELECT * from users');
    $allData = $statement->fetchAll();

    $_SESSION['users'] = $allData;

}
catch(Expection $e)
{
    die($e->getMessage());
}
