<?php

$conn['db'] = (new Database())->db;



try{
    if(isset($_POST['action'])) {

    $id = $_POST['action'];
    $value = $_POST['premium'];

    $ins = $conn['db']->query("UPDATE users
SET is_premium ='$value'
WHERE id='$id'");
    }

    // header('location:/dashboard');
}
catch(Expection $e)
{
    die($e->getMessage());
}
