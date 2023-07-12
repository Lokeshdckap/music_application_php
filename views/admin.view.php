<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="paper-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="homePage.css">
    <style>
      li{
        list-style: none;
      }
    </style>
    <script src="https://kit.fontawesome.com/f117ba3f27.js" crossorigin="anonymous"></script>
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo " style="background-color: #A82700;">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                </a>
                <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                    <div class="logo-image-big">
                            <p>My Music App</p>
                            <a href="#" class="nav-link text-white">Hello Admin</a>
                   </div>
                </a>
            </div>
            <div class="sidebar-wrapper" style="background-color:#A82700;">
                <ul class="nav">
                    <li class="activeBtn">
                    <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/dashboard') echo "bg-info";?>" href="/dashboard">
                    <i class="fa-solid fa-gauge"></i>
                        <p>Dashboard</p>
                    </a>
                    </li>
                    <li>
                      <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/allArtists') echo "bg-info";?>" href="/allArtists">
                        <i class="fa-solid fa-list"></i>
                            <p>All Artist</p>
                        </a>
                    </li>
                    <li>
                    <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/artist') echo "bg-info";?>" href="/artist">
                    <i class="fa-solid fa-plus"></i>
                            <p>Add Artist</p>
                        </a>
                    </li>
                    <li>
                    <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/allSongs') echo "bg-info";?>" href="/allSongs">
                    <i class="fa-solid fa-music"></i>
                            <p>All songs</p>
                        </a>
                    </li>
                    <li>
                    <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/addSong') echo "bg-info";?>" href="/addSong">
                    <i class="fa-solid fa-plus"></i>
                            <p>Add Songs</p>
                        </a>
                    </li>
                    <li>
                    <li>
                    <a class="nav-link text-white  <?php if ($_SERVER["REQUEST_URI"] == '/allUsers') echo "bg-info";?>" href="/allUsers">
                    <i class="fa-solid fa-user"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <!-- <div class="input-group my-19">
                                <input type="search" id="search" value="" class="form-control search" placeholder="Search Your Journals" style="width:600px ;">
                            </div> -->
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="javascript:;">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <!-- <li class="nav-item btn-rotate dropdown nav"> -->
                                <!-- <img src="./images/dark_mode.svg" class="darkMode" id="darkMode" />
                                <img src="./images/Alert.svg" class="alertIcon" id="alertIcon" /> -->
                                <!-- <i class="fa-solid fa-moon"></i>
                                <i class="fa-solid fa-bell"></i> -->
                                <!-- <img src="" class="profile" /> -->

                                <!-- <i class="fa-solid fa-user profile"></i>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="javascript:;">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
         
            <div class="content ">
                <div class="py-3 mb-4 shadow-5m bg-light bg-gradient border-top">
                    <div class="container">
                        <h6 class="mb-0">
                            <a href="" style="color: black; text-decoration: none;">
                              Admin Dashboard<i class="fa-solid fa-house"></i>
                            </a>
                        </h6>
                    </div>
               </div>
               <div class="row">
                    <h4>All Users</h4>
                    <div class="userContents" style="display: flex;">
                      <div class="card">
                      <div class="card-body">
                        <li>All Users Count</li>
                      </div>
                    </div>
                    </div> 
                </div>
                <div class="row">
                    <h4>All Artists</h4>
                    <div class="userContents" style="display: flex;">
                      <div class="card">
                      <div class="card-body">
                      <?php foreach($_SESSION['artist'] as $datas):?>
                      <ul>
                      <li><b>Artist Name</b> : <?php echo $datas['artist_name'];?></li>
                      <img src="<?php echo $datas['image_path']?>" width="100px" hieght="100px">
                      <button type="submit" class="btn btn-primary" name="edit" value="<?php echo $datas['id'];?>">Delete</button>
                    </ul>
                    <?php endforeach;?>
                      </div>
                    </div>
                    </div> 
                </div>
                <div class="row">
                    <h4>All users</h4>
                    <div class="userContents" style="display: flex;">
                      <div class="card">
                      <div class="card-body">

                      <?php foreach($allUsers as $datas):?>
                      <ul>
                      <li><b>UserName</b> : <?php echo $datas['name'];?></li>
                      <!-- <li><b></b> : <?php echo $datas['name'];?></li> -->
                      <!-- <button type="submit" class="edit" name="edit" value="<?php echo $datas['id'];?>">Delete</button> -->
                    </ul>
                    <?php endforeach;?>
                    </div>
                    </div>
                    </div>

                    <h5>Request For Permium Users</h5>
                    <?php foreach($request as $requests):?>
                      <li><b>UserName</b> : <?php echo $requests['name'];?></li>
                      <li><b>Request</b> : <?php echo $requests['request'];?></li>
                      <?php if($requests['is_premium']) : ?>
                      <li><b>Status</b> : <button class="btn btn-success">Approved For Premium Account</button></li>
                       <?php else : ?>
                      <li><b>Status</b> : <button class="btn btn-warning">Waiting For Approved</button></li>
                      <?php endif; ?>
                      <form action="/update" method="post">
                      <select class="form-select" name="premium">
                            <option value="">Select a Premium yes or no</option>
                             <option value="1">Yes</option>
                             <option value="0">No</option>
                         </select>
                      <button type="submit" class="btn btn-primary" name="action" value="<?php echo $requests['id'];?>">Update</button>
                         </form>
                      <?php endforeach;?>
                    
                </div>
                <div class="row">
                    <h4>All Songs</h4>
                    <div class="userContents" style="display: flex;">
                      <div class="card">
                      <div class="card-body">
                      <?php foreach($allSongs as $datas):?>
                      <ul>
                      <li><b>Album Name</b> : <?php echo $datas['albums_name'];?></li>
                      <li><b>Song Name</b> : <?php echo $datas['name'];?></li>
                      <li><b>Artist Name</b> : <?php echo $datas['artist_name'];?></li>
                      <img src="<?php echo $datas['image_path']?>" width="100px" hieght="100px">
                      <audio controls src="<?php echo $datas['file_name']?>"></audio>
                      <button type="submit" class="btn btn-primary" name="edit" value="<?php echo $datas['id'];?>">Delete</button>
                    </ul>
                    <?php endforeach;?>
                      </div>
                    </div>
                    </div> 
                </div>
            </div>
            <!--   Core JS Files   -->
            <script src="../assets/js/core/jquery.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script src="../assets/js/core/bootstrap.min.js"></script>
            <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
            <!--  Google Maps Plugin    -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
            <!-- Chart JS -->
            <script src="../assets/js/plugins/chartjs.min.js"></script>
            <!--  Notifications Plugin    -->
            <script src="../assets/js/plugins/bootstrap-notify.js"></script>
            <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
            <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
            <script src="../assets/demo/demo.js"></script>
            <script>
                $(document).ready(function () {
                    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
                    demo.initChartsPages();
                });
            </script>
            <script src="homePage.js"></script>
</body>

</html>