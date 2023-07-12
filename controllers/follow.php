<?php
$conn['db'] = (new Database())->db;

try{
    // fetch the  users  follow the artists and following artists 
    $follower_id = $_POST['follow_id'];
    $user_id = $_SESSION['id'];
    
    $statement = $conn['db']->query("select * from followers where user_id ='".$_SESSION['id']."' and follower_id = $follower_id");
    $exists = $statement->fetchAll();

    if($exists){
        header('location:/');
    }
    else{
        $ins = $conn['db']->query("INSERT INTO followers(user_id,follower_id)VALUES('$user_id','$follower_id')");
        header('location:/');
    }

  
}
catch(Expection $e)
{
    die($e->getMessage());
}