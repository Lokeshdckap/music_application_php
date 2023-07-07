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
        <form action="/artistStore" method="POST"  enctype="multipart/form-data">
    <div>
        <label>Artists Name:</label>
        <input type="text" name="artist_name" placeholder="Enter the Artist name">
    </div>
    <div>
        <label>Album Name:</label>
        <input type="text" name="album" placeholder="Enter the Album name">
    </div>
    <div>
        <label>Artists Image</label>
        <input type="file" name="files[]" multiple>
        <input type="text" name="artist" hidden value="artist">
    </div>
    <div><button type="submit" name="action">Add Artists</button></div>
</form>
        </div>
</body>
</html>