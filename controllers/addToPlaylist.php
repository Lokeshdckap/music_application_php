<?php


$conn['db'] = (new Database())->db;
// Add to playlist Logic for premium users
try{
        $song_id =  $_POST['song_id'];
        $playlist_id = $_POST['playlist_id'];

        $_SESSION['play'] = $playlist_id;

        $statement = $conn['db']->query("select * from playlist_songs where playlist_id ='$playlist_id' and song_id = $song_id");
        $exists = $statement->fetchAll();
    
        if($exists){
            $_SESSION['Song Already Exists'] = 'Song Already Exists in Playlist';
            header('location:/playlist');
    
        }
        else{
            $query = $conn['db']->query("INSERT INTO playlist_songs(playlist_id,song_id)VALUES('$playlist_id','$song_id')");
            unset($_SESSION['Song Already Exists']);
            header('location:/playlist');

        }



     
}
catch(Expection $e)
{
    die($e->getMessage());
}



