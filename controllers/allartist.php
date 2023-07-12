<?php


// Block the normal users

if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

 // Fetch the all artists in database 

try{

    $statement = $conn['db']->query('SELECT artist.artist_name, images.image_path
    FROM artist
    INNER JOIN images ON artist.id=images.model_id and images.model_name = "artist"');
    $allData = $statement->fetchAll();

    $_SESSION['artist'] = $allData;
    require "views/admin.view.php";

}
catch(Expection $e)
{
    die($e->getMessage());
}
