<?php
// guest users search
// search functionallity
try{
    $search_product = $_POST['song_name'];
    if($search_product !=""){
    $statement = $conn['db']->query("SELECT name,artist.artist_name FROM songs join artist on artist.id = songs.artist_id WHERE name like '%$search_product%' or artist.artist_name LIKE '%$search_product%'");
    $search = $statement->fetchAll();

    // var_dump($search);
    require 'views/search.view.php';
  
    }
}
catch(Expection $e)
{
    die($e->getMessage());
}











?>