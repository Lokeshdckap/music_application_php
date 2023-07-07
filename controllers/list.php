<?php
$conn['db'] = (new Database())->db;

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