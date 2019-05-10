<?php
/**
 * Summary:
 * 
 */

include ('../includes.php');

final class Result
{
   // engine variables
   private $auth;
   private $router;
   private $errorHandler;

   // model variables
   private $records, $templates;

   // controller variables
   public $resultView;

   public function __construct(){
      // instantiate models and engines
      $this->auth = new Auth();
      $this->router = new Router();
      $this->errorHandler = new ErrorHandler();
      $this->templates = new Template();
      $this->records = new RecordingModel();

      // instantiate models and engines
      $this->Guard();
      $this->UrlRequests();
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
      // input flags
      $_keyword_ = (isset($_REQUEST['_keyword'])) ? true : false ;
      $_start_ = (isset($_REQUEST['_startDate'])) ? true : false ;
      $_end_ = (isset($_REQUEST['_endDate'])) ? true : false ;
      $_badge_ = (isset($_REQUEST['_badgeNo'])) ? true : false ;
      $_search_ = (isset($_REQUEST['_search'])) ? true : false ;
      $_strict_ = (isset($_REQUEST['_strict'])) ? true : false ;

      // input values
      $keyword = $_REQUEST['_keyword'];
      $start = $_REQUEST['_startDate'];
      $end = $_REQUEST['_endDate'];
      $badge = $_REQUEST['_badgeNo'];
      $strict = $_REQUEST['_strict'];

      if (!$_search_) {
         $this->errorHandler->add("No Search made");
         echo $this->errorHandler;
         exit;
      }

      if ($_strict_) {
         # this does strict search

         if ($_keyword_ && $_badge_ && $_start_ && $_end_) {
            // search officer wrt time
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND translated_text LIKE '%{$keyword}%' AND start_time = '{$start}' AND end_time = '{$end}'"
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               $this->errorHandler->add("Error");
               echo $this->errorHandler;
               exit;
            }

         }

         if ($_keyword_ && $_start_ && $_end_) {
            // search officer wrt time
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND translated_text LIKE '%{$keyword}%' AND start_time = '{$start}' AND end_time = '{$end}'"
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               $this->errorHandler->add("Error");
               echo $this->errorHandler;
               exit;
            }

         }

      } else {
         
      }
      

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
$result = new Result();
$router = new Router();

// include View
include('result.view.php');
