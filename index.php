<?php
require 'connection.php';
require 'router.php';
$conn = [];
$conn['db'] = (new Database())->db;

session_start();


$router = new Router();

// Guest users Routers 

$router->get('/','controllers/userhome.php');

$router->post('/search-music','controllers/search.php');

$router->get('/registration','controllers/registration/register.php')->middlewares('guest');

$router->get('/login','controllers/login/login.php')->middlewares('guest');

$router->get('/login-logic','controllers/login/login-logic.php')->middlewares('guest');

$router->get('/registration-logic','controllers/registration/register-logic.php')->middlewares('guest');


// Admin Routers

$router->get('/dashboard','controllers/home.php');


$router->get('/artist','controllers/artist.php');

$router->get('/artistStore','controllers/artist-logic.php');

$router->get('/allArtists','controllers/allartist.php');

$router->get('/addSong','controllers/addSong.php');

$router->get('/songStore','controllers/song-logic.php');

$router->get('/allSongs','controllers/allSongList.php');

$router->get('/allUsers','controllers/allUser.php');

$router->post('/update','controllers/update.php');


// Users Works Routers

$router->get('/logout','controllers/logout/logout.php')->middlewares('authication');

$router->get('/permium','controllers/permium.php')->middlewares('authication');

$router->get('/premiumRequest','controllers/premiumRequest-logic.php')->middlewares('authication');

$router->get('/shared','controllers/share.php')->middlewares('authication');

$router->post('/shareStored','controllers/shareStored.php')->middlewares('authication');

$router->get('/listOfshared','controllers/listOfShared.php')->middlewares('authication');

$router->get('/playlist','controllers/playlist.php')->middlewares('authication');

$router->get('/playlist/createPlaylist','controllers/createPlayList.php')->middlewares('authication');

$router->get('/playlist/yourlist','controllers/yourPlayList.php')->middlewares('authication');

$router->post('/addToPlay','controllers/addToPlaylist.php')->middlewares('authication');

$router->post('/follow','controllers/follow.php')->middlewares('authication');

$router->post('/followersArtists','controllers/following.php')->middlewares('authication');












// $router->get('','controllers/userhome.php');


require $router->routes();