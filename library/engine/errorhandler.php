<?php
/**
 * Summary:
 * This Class Logs and Show Error Messages
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

   public function __toString(){
      return implode(', ', $this->errorLog);
   }

   public function __destruct(){
      $this->errorLog = null;
   }
}

?>