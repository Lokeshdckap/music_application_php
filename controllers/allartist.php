<?php
$conn['db'] = (new Database())->db;

try{

    $statement = $conn['db']->query('SELECT artist.artist_name, images.image_path
    FROM artist
    INNER JOIN images ON artist.id=images.model_id limit 1');
    $allData = $statement->fetchAll();
    // var_dump($allData);
    require "views/admin.view.php";

}
catch(Expection $e)
{
    die($e->getMessage());
}
