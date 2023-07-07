
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Management</title>
    <link rel="stylesheet" href="views/style.css">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div class="main">
        <form action="/songStore" method="POST"  enctype="multipart/form-data">

        <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="artist_id">
                            <?php require "controllers/list.php"?>
                            <option value="">Select a Artists</option>
                            <?php foreach($allArtist as $datas):?>
                             <option value="<?php echo $datas['id'];?>"><?php echo $datas['name'];?></option>
                            <?php endforeach;?>
                         </select>
                      </div>
                      <div class="col-md-12 mb-3">
                        <select class="form-select" name="album_id">
                            <?php require "controllers/list.php"?>
                            <option value="">Select a Album</option>
                            <?php foreach($allAlbums as $datass):?>
                             <option value="<?php echo $datass['id'];?>"><?php echo $datass['name'];?></option>
                            <?php endforeach;?>
                         </select>
                      </div>
    <div>
        <label>SongName:</label>
        <input type="text" name="song_name" placeholder="Enter the Song name">
    </div>
    <div>
        <label>Songs File</label>
        <input type="file" name="song[]" multiple>
        <label>SongsImage</label>
        <input type="file" name="files[]" multiple>
        <input type="text" name="song" hidden value="song">
    </div>
    <div><button type="submit" name="action">Add Song</button></div>
</form>
</div>
</body>
</html>
