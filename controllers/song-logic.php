<?php


if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;



try{
    if(isset($_POST['action'])) {
    
    $id = $_POST['action'];
    $artist_id = $_POST['artist_id'];
    $album_id = $_POST['album_id'];
    $song_name = $_POST['song_name'];
    $type = $_POST['song'];
// fetch the all songs to admin panel 
    if($song_name){
        $statement = $conn['db']->query("select * from songs where name ='$song_name'");
        $exists = $statement->fetchAll();

        if($exists){
            $_SESSION['song']  = ' Song Already Exists';
            header('location:/addSong');
        }
 else{
// add the song in the database 
    $uploadFolder = 'songs/';
    foreach ($_FILES['song']['tmp_name'] as $key => $image) {
    $imageTmpName = $_FILES['song']['tmp_name'][$key];
    $imageName = $_FILES['song']['name'][$key];
    $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
    $ins = $conn['db']->query("INSERT INTO songs(artist_id,album_id,name,file_name)VALUES('$artist_id','$album_id','$song_name','$uploadFolder$imageName')");
    }

    $selected_id = ($conn['db'])->prepare("SELECT id from songs ORDER BY id desc limit 1");
    $selected_id->execute();
    $data = $selected_id->fetchAll();
    $id = $data[0]['id'];
    $uploadFolder = 'images/';
    foreach ($_FILES['files']['tmp_name'] as $key => $image) {
    $imageTmpName = $_FILES['files']['tmp_name'][$key];
    $imageName = $_FILES['files']['name'][$key];
    $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

    $query = $conn['db']->query("INSERT INTO images(image_path,model_id,model_name)VALUES('$uploadFolder$imageName','$id','$type')");
    }
    header('Location:/dashboard');
    }
}
}
}
catch(Expection $e)
{
    die($e->getMessage());
}