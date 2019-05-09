<?php
/**
 * Summary:
 * This script is responsible for routing from ge t
 */

class Router
{
   public function __construct(){
   }

   public function goto($route, $params = null ){
      $params = isset($params) ? "?" . $params : "";
      header("Location: {$route}" . $params);
   }

   public function gotoRoot($route){
      header("Location: " . str_replace('../','public/',$route) );
   }

   public function __destruct(){
   }

}

?>