<?php
/**
 * Summary:
 * 
 */

class Auth
{

   public function __construct(){
      session_start(); // check if session isset? don't start another session
   }

   public function isLoggedIn(){
      if (isset($_SESSION['login'])){
         if ($_SESSION['login'] == 1){
            return true;
         } else {
            return false;
         }
      }
   }

   public function login(){
      $_SESSION['login'] = 1;
   }

   public function logoff(){
      $_SESSION['login'] = 0;
   }

   public function __destruct(){
      // session_destroy();
   }
}

?>