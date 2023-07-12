<?php
// Block the the normal users to admin panel 
if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User Get Access Switch to Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

try{
  // fetch the all song playlist in premium users 
    $statement = $conn['db']->query('SELECT songs.id,artist.artist_name,albums.albums_name,songs.name,images.image_path,songs.file_name from songs join artist on songs.artist_id = artist.id join albums on songs.album_id = albums.id join images on songs.id = images.model_id and images.model_name = "song"');
    $allSongs = $statement->fetchAll();
    $playlist_id = $_POST['playlist'];
    
    $statements = $conn['db']->query("SELECT users.name,songs.file_name,images.image_path,artist.artist_name,albums.albums_name,songs.name,playlist.playlist_name,playlist_songs.created_at from playlist join playlist_songs on playlist.id = playlist_songs.playlist_id join songs on songs.id = playlist_songs.song_id join artist on artist.id = songs.artist_id join albums on albums.id = songs.album_id join images on songs.id = images.model_id and images.model_name = 'song' join users on users.id ='".$_SESSION['id']."' and playlist_songs.playlist_id ='$playlist_id'");
    $allPlaySongs = $statements->fetchAll();

    // var_dump($allPlaySongs);

}
catch(Expection $e)
{
    die($e->getMessage());
}

require 'views/yourPlayList.view.php';