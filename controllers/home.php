<?php
require 'views/admin.view.php';


$conn['db'] = (new Database())->db;

try{
    // $id= $_POST['projects'];

    $statement = $conn['db']->query('SELECT * from users');
    $allData = $statement->fetchAll();

    $_SESSION['users'] = $allData;

}
catch(Expection $e)
{
    die($e->getMessage());
}
