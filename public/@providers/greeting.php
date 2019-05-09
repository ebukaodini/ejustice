<?php
/**
 * Summary:
 * 
 */

// a class to greet someone
class Greeting
{
   
   private $format;
   private $name;

   public function __construct(){
      $this->format = new Format();
   }

   public function GreetMorning($name){
      $greet = $this->format->greet('Good Morning, ' . $name);

      $greetModel = new GreetModel();
      $add = $greetModel->create(
         array(
            'greeting'=>$greet
         )
      );

      if($add){
         return 'Added "'. $greet .'" Successfully, Id = ' .  $greetModel->lastId();
      } else {
         return 'Failed to Add "'. $greet . '"';
      }
   }

   public function getAllGreetings(){
      $greetModel = new GreetModel();
      $get = $greetModel->conditions("WHERE id <> 0")->read('*');

      return $get;
   }

   public function getThisGreetings($id){
      $greetModel = new GreetModel();
      $get = $greetModel->conditions("WHERE id = {$id}")->read('greeting');

      echo json_encode($get);
   }

   public function removeThisGreetings($id){
      $greetModel = new GreetModel();
      $del = $greetModel->conditions("WHERE id = {$id}")->delete();

      echo $del;
   }

   public function updateThisGreetings($id){
      $greetModel = new GreetModel();
      $update = $greetModel->conditions("WHERE id = {$id}")->update(
         array(
            'greeting'=>'Oliver Twist.'
         )
      );

      echo $update;
   }

   public function __destruct(){
   }
}

?>