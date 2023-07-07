<?php
require 'connection.php';
require 'router.php';
$conn = [];
$conn['db'] = (new Database())->db;

session_start();


$router = new Router();


$router->get('/dashboard','controllers/home.php');
$router->get('/','controllers/userhome.php');
$router->get('/registration','controllers/registration/register.php');
$router->get('/login','controllers/login/login.php');
$router->get('/login-logic','controllers/login/login-logic.php');
$router->get('/registration-logic','controllers/registration/register-logic.php');

$router->get('/logout','controllers/logout/logout.php');

$router->get('/artist','controllers/artist.php');
$router->get('/artistStore','controllers/artist-logic.php');
$router->get('/allArtists','controllers/allartist.php');

$router->get('/addSong','controllers/addSong.php');
$router->get('/songStore','controllers/song-logic.php');

$router->get('/allSongs','controllers/allSongList.php');

$router->get('/permium','controllers/permium.php');

$router->get('/premiumRequest','controllers/premiumRequest-logic.php');

$router->get('/allUsers','controllers/allUser.php');

$router->post('/update','controllers/update.php');



// $router->get('','controllers/userhome.php');


require $router->routes();