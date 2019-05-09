<?php
/**
 * Summary:
 * 
 */

// a class to greet someone
class ErrorHandler
{
   private $errorLog;

   public function __construct(){
      $this->errorLog = array();
   }

   public function add($errorMsg){
      $this->errorLog[] = $errorMsg;
   }

   public function toString(){
      return implode(', ', $this->errorLog);
   }

   public function __destruct(){
      $this->errorLog = null;
   }
}

?>