<?php
// Block the normal users to admin panel

if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

// fetch the artist and albums
try{
    $statement = $conn['db']->query('SELECT * from artist');
    $allArtist = $statement->fetchAll();

    $statement = $conn['db']->query('SELECT * from albums');
    $allAlbums = $statement->fetchAll();
    // require "views/addSong.view.php";
    
    
 }
 catch(Expection $e)
 {
     die($e->getMessage());
 }