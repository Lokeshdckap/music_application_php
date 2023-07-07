<?php
$conn['db'] = (new Database())->db;

try{

    $statement = $conn['db']->query('SELECT images.image_path,albums.albums_name,artist.artist_name,songs.name,songs.file_name
    FROM songs
    INNER JOIN artist ON songs.artist_id = artist.id JOIN albums ON songs.album_id = albums.id JOIN images ON songs.id = images.model_id');
    $allSongs = $statement->fetchAll();
    
    require "views/admin.view.php";
    // $_SESSION['allSongs'] = $allSongs

}
catch(Expection $e)
{
    die($e->getMessage());
}
