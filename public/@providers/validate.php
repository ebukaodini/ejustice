<?php

class Validate{
   // properties

   // methods

   /** Summary: this method validates names */
   public function validateName($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[A-Za-z-]+$/", $value) && strlen($value) >= $min && strlen($value) <= $max ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates texts and strings */
   public function validateText($value){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[A-Za-z0-9,._-]+$/", $value) ){
         return true;
      }else{
         return false;
      }
   }
   
   
   /** Summary: this method validates tokens */
   public function validateToken($value){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[A-Za-z0-9]+$/", $value) && strlen($value) >= 6 && strlen($value) <= 32 ){
         return true;
      }else{
         return false;
      }
   }

   /** Summary: this method validates numbers of an exact length */
   public function validateNumberExact($value, $len){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[0-9\.]+$/", $value) && strlen($value) == $len ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates file names and their path */
   public function validateFilename($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[A-Z0-9a-z.-_\/]+$/", $value) && strlen($value) >= $min && strlen($value) <= $max ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates numbers */
   public function validateNumber($value, $min){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[0-9\.]+$/", $value) && strlen($value) >= $min ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates telephone numbers */
   public function validateTelephone($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match("/^[0-9-]+$/", $value) && strlen($value) >= $min && strlen($value) <= $max ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates emails */
   public function validateEmail($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match_all("/^[-.\w]+@([\w-]+\.)+[\w-]{2,20}$/", $value) && strlen($value) >= $min && strlen($value) <= $max ){
         return true;
      }else{
         return false;
      }
   }

   /** Summary: this method validates password */
   public function validatePassword($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match_all("/(?=^.{".$min.",".$max."}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{\":;\'?\/>.<,])(?!.*\s).*$/", $value) )
      {
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates amount */
   public function validateAmount($value){
      $value = preg_replace("/\s/", "", $value);
      if( preg_match_all("/^\d+\.?\d*$/", $value) ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates dates */
   public function validateDate($value){
      if( preg_match("/^[0-9-:\/\s]+$/", $value) ){
         return true;
      }else{
         return false;
      }
   }
   
   /** Summary: this method validates urls */
   public function validateUrl($value, $min, $max){
      $value = preg_replace("/\s/", "", $value);
         if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value) && strlen($value) >= $min && strlen($value) <= $max ){
         return true;
      }else{
         return false;
      }
   }
    
}

?>