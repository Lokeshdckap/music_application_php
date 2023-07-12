<?php

// To check the auth users 
class Authmiddleware{
  
    public function handler(){
        if (!isset($_SESSION['login'])) {
            header('Location: /registration');
        }
    }


}