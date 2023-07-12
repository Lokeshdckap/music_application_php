<?php


// Block the normal users to the admin panel
if ($_SESSION['roles_as']==0) {

    $_SESSION['error'] = "Access Denied Your not a Admin";
    header('Location: /');
}
$conn['db'] = (new Database())->db;

// Insert the all artists

try{
    if(isset($_POST['action'])) {

    $id = $_POST['action'];
    $album_name = $_POST['album'];
    $artist_name = $_POST['artist_name'];
    $type = $_POST['artist'];


    if($artist_name){
        $statement = $conn['db']->query("select * from artist where artist_name ='$artist_name'");
        $exists = $statement->fetchAll();

        if($exists){
            $_SESSION['artist']  = ' Artist Already Exists';
            header('location:/artist');
        }
        else{

            $ins = $conn['db']->query("INSERT INTO artist(artist_name)VALUES('$artist_name')");
            // $ins = $conn['db']->query("INSERT INTO albums(name)VALUES('$album_name')");
             
             $selected_id = ($conn['db'])->prepare("SELECT id from artist ORDER BY id desc limit 1");
             $selected_id->execute();
             $data = $selected_id->fetchAll();
             $id = $data[0]['id'];
             $uploadFolder = 'images/';
             foreach ($_FILES['files']['tmp_name'] as $key => $image) {
             $imageTmpName = $_FILES['files']['tmp_name'][$key];
             $imageName = $_FILES['files']['name'][$key];
             $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
        
             $query = $conn['db']->query("INSERT INTO images(image_path,model_id,model_name)VALUES('$uploadFolder$imageName','$id','$type')");
             $ins = $conn['db']->query("INSERT INTO albums(artist_id,albums_name)VALUES('$id','$album_name')");
             }
        
             header('Location:/dashboard');

        }
    }
  
    }
}catch(PDOException $e){
    die($e->getMessage());
}
