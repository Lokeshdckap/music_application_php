<?php
// block the free user 

if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User login and Get A Access to Switch a Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;
// Fetch the playlists
try{
    $statement = $conn['db']->query("SELECT * from playlist where  user_id ='".$_SESSION['id']."'");
    $allPlaylists = $statement->fetchAll();

    // require "views/addSong.view.php";
    
    
 }
 catch(Expection $e)
 {
     die($e->getMessage());
 }


require 'views/playlist.view.php';
