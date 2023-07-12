<?php
// Users the follow the all artists display in follow page 
$conn['db'] = (new Database())->db;

try{
    $statement = $conn['db']->query("SELECT artist.artist_name from followers join artist on artist.id = followers.follower_id join users on users.id = followers.user_id where users.id = ".$_SESSION['id']."");
    $allFollwing = $statement->fetchAll();

    require "views/following.view.php";
    
    
 }
 catch(Expection $e)
 {
     die($e->getMessage());
 }
