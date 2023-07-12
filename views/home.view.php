<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="600" url="/">  -->

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
        <form action="/search-music" method="POST">
                <div class="input-group mb-2">
                    <input type="search" class="form-control" placeholder="Search song or artist" name="song_name" aria-label="Username"
                        aria-describedby="basic-addon1" id="tags">
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
                            <a class="nav-link active text-warning fw-bold" href="#">Premium</a>
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
                    <!-- <div class="dropdown">
                        <li class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </li>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile">Profile <i class="fa-solid fa-user"></i></a></li>
                            <li><a class="dropdown-item" href="my-orders">My Orders  <i class="fa-solid fa-list"></i></a></li>
                            <li><a class="dropdown-item" href="logout">Logout   <i class="fa-solid fa-right-from-bracket"></i></a></li>
                        </ul>
                    </div>
                </div> -->
        </div>
    </div>
</nav>
<body>
<section >

<div class="d-flex" >
<div class="col-sm-6">
<!-- <?php var_dump($_SESSION['login']) ?> -->

         <?php if(isset($_SESSION['error'])):?>
            <p class="bg-danger text-white font-weight-bold"><?php echo $_SESSION['error']?></p>
            <?php endif;?>
         <?php unset($_SESSION['error'])?>
                <div class="card" style="width: 40rem";>
                <div class="card-body">
                    <h4>All Songs</h4>
                     <form action="/shared" method="post">
                      <?php foreach($allSong as $datas):?>
                      <ul>
                      <li><b>Album Name</b> : <?php echo $datas['albums_name'];?></li>
                      <li><b>Song Name</b> : <?php echo $datas['name'];?></li>
                      <li><b>Artist Name</b> : <?php echo $datas['artist_name'];?></li>
                      <img src="<?php echo $datas['image_path']?>" width="100px" hieght="100px">
                      <audio controls src="<?php echo $datas['file_name']?>"></audio>
                      <?php if($_SESSION['is_premium']):?>
                      <button type="submit" class="edit btn btn-primary" name="share" value="<?php echo $datas['id'];?>" >Share</button>
                      <?php elseif(!isset($_SESSION['login'])):?>
                       <li style="color:black;" class="fw-bold text-dark">Login To Get A 100 Songs</li>
                      <?php else: ?>
                       <p class="text-info font-weight-bold">Shared Option only for Premium Users</p>
                      <?php endif;?>
                    </ul>
                    <?php endforeach;?>
                    </form>
                    </div>
                 </div>
        </div>
        <div class="card" style="width: 40rem";>
                <div class="card-body">
                <h4>Followers = <button class="btn  text-white bg-success mt-3" type="submit">0</button></h4>
                <form action="/followersArtists" method="post">
                <?php if($followCount):?>
                <h4>Following = <button class="btn  text-white bg-success mt-3" type="submit"><?php echo($followCount)?></button></h4>
                <?php else:?>
                <h4>Following = <button class="btn  text-white bg-success mt-3" type="submit">0</button></h4>
                <?php endif;?>
                </form>
                       <h4>All Artists</h4>
                       
                    <ul>
                       <form action="/follow" method="post">
                      <?php foreach($allArtists as $datas):?>
                      <?php 
                       $unfollow = [];
                       $value;
                       foreach($unFollow as $unFollows){
                          array_push($unfollow,$unFollows['ids']);
                          if(in_array($datas['id'],$unfollow)){
                              $value = true;
                          }
                          else{
                              $value = false;
                          }
                       }
                      ?>
                    <li class="text-dark"><b>Artist Name</b> :<?php echo $datas['artist_name'];?></li>
                    <img src="<?php echo $datas['image_path']?>" width="100px" hieght="100px">
                    <?php if($value) : ?>
                    <button type="submit" class="btn btn-success" name="follow_id" value="<?php echo $datas['id'];?>">Following</button>
                    <?php else : ?>
                    <button type="submit" class="btn btn-info" name="follow_id" value="<?php echo $datas['id'];?>">Follow</button>
                    <?php endif; ?>
                    <?php endforeach;?>
                    </ul>
                  </form>
            </div>
        </div> 
    </div>
</div> 
</section>
</body>
</html>
<!-- <script>
   window.location.reload();
</script> -->