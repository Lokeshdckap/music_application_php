<?php


if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;
// Fetch the all songs
try{

    $statement = $conn['db']->query('SELECT songs.id,artist.artist_name,albums.albums_name,songs.name,images.image_path,songs.file_name from songs join artist on songs.artist_id = artist.id join albums on songs.album_id = albums.id join images on songs.id = images.model_id and images.model_name = "song"');
    $allSongs = $statement->fetchAll();
    
    require "views/admin.view.php";

}
catch(Expection $e)
{
    die($e->getMessage());
}
