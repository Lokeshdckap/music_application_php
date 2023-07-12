<?php

if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;


// approved for premium request
try{
    if(isset($_POST['action'])) {

    $id = $_POST['action'];
    $value = $_POST['premium'];

    var_dump($value);
    var_dump($id);


    $ins = $conn['db']->query("UPDATE users
SET is_premium ='$value'
WHERE id='$id'");
    }

    header('location:/dashboard');
}
catch(Expection $e)
{
    die($e->getMessage());
}
