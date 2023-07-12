<?php
// block the free user 

if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User Get Access Switch to Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;
// insert the shared songs for premium users

try{
        $song_id =  $_POST['song_id'];
        $user_id = $_SESSION['id'];
        $shared_id =   $_POST['user_id'];


    $query = $conn['db']->query("INSERT INTO shared(song_id,user_id,shared_id)VALUES('$song_id','$user_id','$shared_id')");
    
    header('location:/listOfshared');

}
catch(Expection $e)
{
    die($e->getMessage());
}