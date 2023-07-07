<?php
$conn['db'] = (new Database())->db;

try{

    $statement = $conn['db']->query('SELECT images.image_path,albums.albums_name,artist.artist_name,songs.name,songs.file_name
    FROM songs
    INNER JOIN artist ON songs.artist_id = artist.id JOIN albums ON songs.album_id = albums.id JOIN images ON songs.id = images.model_id');
    $allSong = $statement->fetchAll();
    // var_dump($allData);
    require 'views/home.view.php';


}
catch(Expection $e)
{
    die($e->getMessage());
}

try{
    $search_product = $_POST['song_name'];
    if($search_product !=""){
    $statement = $conn['db']->query("SELECT name FROM songs
    WHERE name LIKE '%$search_product%'");  
    }
    // require 'views/home.view.php';
}
catch(Expection $e)
{
    die($e->getMessage());
}
