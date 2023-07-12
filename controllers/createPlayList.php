<?php
if ($_SESSION['is_premium']==0) {

    $_SESSION['error'] = "You are not a Premium User Get Access Switch to Premium";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

try{
    
    // create a playlist and fetch the exists platlist
    $user_id = $_POST['user_id'];
    $playlist_name = $_POST['playlist'];

    $statement = $conn['db']->query("select * from playlist where playlist_name ='$playlist_name' and user_id ='".$_SESSION['id']."'");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['playlistExists'] = 'Playlist Already Exists';
        header('location:/playlist');

    }
    else{
        $ins = $conn['db']->query("INSERT INTO playlist(playlist_name,user_id)VALUES('$playlist_name','$user_id')");
        unset($_SESSION['playlistExists']);
        header('location:/playlist');
    }

}
catch(Expection $e)
{
    die($e->getMessage());
}

