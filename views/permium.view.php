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
        <form action="/premiumRequest" method="POST">
        <div>
        <!-- <label>user_id</label> -->
        <input type="text" name="user_id"  hidden placeholder="Enter the Song name" value="<?php echo $_SESSION['id'];?>">
    </div>
    <div>
        <label>Request</label>
        <input type="text" name="request" placeholder="Request for Premium" >
    </div>
    <div><button type="submit" name="action">Request</button></div>
</form>
</div>
</body>
</html>
