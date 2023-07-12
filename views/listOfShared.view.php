<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/nucleo-icons.css" rel="stylesheet" />
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="css/material-dashboard.css?v=3.1.0" rel="stylesheet">
    <style>
        #tags{
            background-color:white;
        }
        li{
            list-style: none;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color:white;">My Music App</a>
        <div class="search-bar" style="width: 50%">
            <form action="/" method="POST">
                <div class="input-group mb-2">
                    <input type="search"  class="form-control" placeholder="Search" name="song_name" aria-label="Username"
                        aria-describedby="basic-addon1" id="tags" style="margin-right">
                    <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/') echo "bg-info";?>" aria-current="page" href="/">Home</a>
                </li>
                <?php if(!isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/login') echo "bg-info";?>" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/registration') echo "bg-info";?>" href="/registration">Register</a>
                        </li>
                 <?php elseif($_SESSION['is_premium']):?>
                    <li class="nav-item">
                            <a class="nav-link active text-warning" href="#">Premium</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/listOfshared') echo "bg-info";?>" href="/listOfshared">Shared Songs</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/playlist') echo "bg-info";?>" href="/playlist">Playlists</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active" href="">Welcome, <?php echo $_SESSION['name'] ?></a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/logout') echo "bg-info";?>" href="/logout">Logout</a>
                    </li>
                <?php else:?>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/permium') echo "bg-info";?>" href="/permium">Switch To Permium</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active" href="">Welcome, <?php echo $_SESSION['name'] ?></a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active <?php if ($_SERVER["REQUEST_URI"] == '/logout') echo "bg-info";?>" href="/logout">Logout</a>
                    </li>
                <?php endif;?>
        </div>
    </div>
</nav>
<section>
<div class="row">
                    <div class="userContents" style="display: flex;">
                      <div class="card">
                      <div class="card-body">
                    <h4>Song Shared for premium Users</h4>
                      <?php foreach($sharedSongs as $datas):?>
                      <ul>
                      <li><b>AlbumName</b> : <?php echo $datas['albums_name'];?></li>
                      <li><b>SongName</b> : <?php echo $datas['name'];?></li>
                      <li><b>ArtistName</b> : <?php echo $datas['artist_name'];?></li>
                      <img src="<?php echo $datas['image_path']?>" width="100px" hieght="100px">
                      <audio controls src="<?php echo $datas['file_name']?>"></audio>
                      <h4>Song shared to : </h4>
                      <li><b>Username</b> : <?php echo $datas['user_name'];?></li>
                      <li><b>Shared On</b> : <?php echo date('d-m-Y',strtotime($datas['created_at']));?></li>
                      <input type="text"  hidden name="song_id" value="<?php echo $_POST['share']?>">
                    </ul>
                    <?php endforeach;?>
                      </div>
                    </div>
                    </div> 
                </div>
</section>