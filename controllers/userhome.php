<?php
// Database Connection
$conn['db'] = (new Database())->db;

try{

   // Fetch the all songs display to Home page

    $statement = $conn['db']->query('SELECT songs.id,artist.artist_name,albums.albums_name,songs.name,images.image_path,songs.file_name from songs join artist on songs.artist_id = artist.id join albums on songs.album_id = albums.id join images on songs.id = images.model_id and images.model_name = "song"');
    $allSong = $statement->fetchAll();
    
   // Fetch the all users display to Home page


    $id =  $_SESSION['id'];
    $statement = $conn['db']->query("SELECT is_premium from users where id ='$id'");
    $allUsers = $statement->fetchAll();
    $_SESSION['is_premium'] = $allUsers[0]['is_premium'];

   // Fetch the all users display to Home page

    $statement = $conn['db']->query('SELECT artist.id as id,artist.artist_name, images.image_path
    FROM artist
    INNER JOIN images ON artist.id=images.model_id and images.model_name = "artist"');
    $allArtists = $statement->fetchAll();

 // check the user to login and 
    if(isset($_SESSION['login'])){

        $statement = $conn['db']->query("SELECT * from followers join users on users.id = followers.user_id where users.id = ".$_SESSION['id']."");
        $followers = $statement->fetchAll();
    
        $followCount = count($followers);
        
        $statement = $conn['db']->query("SELECT artist.id as ids,artist.artist_name from followers join artist on artist.id = followers.follower_id join users on users.id = followers.user_id where users.id ='".$_SESSION['id']."'");
        $unFollow = $statement->fetchAll();


    }
    require 'views/home.view.php';
    

}
catch(Expection $e)
{
    die($e->getMessage());
}




