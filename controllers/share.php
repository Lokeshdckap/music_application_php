<?php
// block the free user 
if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User Get Access Switch to Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

// fetch the all premium users 
try{
    // $id= $_POST['projects'];

    $statement = $conn['db']->query("SELECT * from users where NOT id ='".$_SESSION['id']."'");
    $allData = $statement->fetchAll();

    $_SESSION['users'] = $allData;

    require "views/share.view.php";

}
catch(Expection $e)
{
    die($e->getMessage());
}
