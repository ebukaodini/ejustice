<?php
/**
 * Summary:
 * 
 */

include ('../includes.php');

final class Home
{

   private $greetingList;

   private $auth;
   private $router;

   public function __construct(){
      $this->auth = new Auth();
      $this->router = new Router();
   }

   /**
    * Guard access to this page - Guard()
    * 
    * NB: use the Auth class
    */
   private function Guard(){
   }

   /**
    * Handle Url Request - UrlRequests()
    * 
    * NB: always check if a url parameter is set( isset() ) before using it.
    */
   private function UrlRequests(){
   }

   /**
    * Controller Methods
    * 
    * These methods get values from the models and return them to the view Methods
    */
   
   
   /**
    * View Methods
    * 
    * All methods required by the page view should come below here
    * Most of these methods are dependent on the Controller Methods
    */
   

}

// initiate the page object
$home = new Home();
$router = new Router();

// include View
include('home.view.php');
