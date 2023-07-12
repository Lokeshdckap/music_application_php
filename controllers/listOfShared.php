<?php
// block the free user 

if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User Get Access Swith to Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;
//  fetch the all shared songs list for premium
try{
    $statement = $conn['db']->query("select images.image_path,albums.albums_name,artist.artist_name,users.name as user_name,songs.name,songs.file_name,shared.created_at from shared join songs on songs.id = shared.song_id join users on shared.shared_id = users.id join artist on songs.artist_id = artist.id join albums on songs.album_id = albums.id join images on songs.id = images.model_id and images.model_name = 'song' where user_id ='".$_SESSION['id']."'");
    $sharedSongs = $statement->fetchAll();

    // var_dump($sharedSongs);

}

catch(Expection $e)
{
    die($e->getMessage());
}
require 'views/listOfShared.view.php';