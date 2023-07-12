<?php
// To check Guest Users using Middlewares
class Guestmiddleware{
  
    public function handler(){
        if (isset($_SESSION['login'])) {
            header('Location: /');
        }
    }


}