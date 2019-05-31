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
   public $errorLog = "";

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
      $_search_ = (isset($_REQUEST['_search'])) ? true : false ;
      $_updateFlag_ = (isset($_REQUEST['_updateFlag'])) ? true : false ;

      if ($_search_) {

         // set flags for filtering
         $_keyword_ = (isset($_REQUEST['_keyword']) && (trim($_REQUEST['_keyword']) != '' )) ? true : false ;
         $_start_ = (isset($_REQUEST['_startDate']) && (trim($_REQUEST['_startDate']) != '' )) ? true : false ;
         $_end_ = (isset($_REQUEST['_endDate']) && (trim($_REQUEST['_endDate']) != '' )) ? true : false ;
         $_badge_ = (isset($_REQUEST['_badgeNo']) && (trim($_REQUEST['_badgeNo']) != '' )) ? true : false ;
         $_strict_ = (isset($_REQUEST['_strict'])) ? true : false ;
         
         // collect values
         $_keyword = (isset($_REQUEST['_keyword']) && (trim($_REQUEST['_keyword']) != '' )) ? trim($_REQUEST['_keyword']) : '' ;
         $_start = (isset($_REQUEST['_startDate']) && (trim($_REQUEST['_startDate']) != '' )) ? trim($_REQUEST['_startDate']) : '' ;
         $_end = (isset($_REQUEST['_endDate']) && (trim($_REQUEST['_endDate']) != '' )) ? trim($_REQUEST['_endDate']) : '' ;
         $_badge = (isset($_REQUEST['_badgeNo']) && (trim($_REQUEST['_badgeNo']) != '' )) ? trim($_REQUEST['_badgeNo']) : '' ;

         // call filter function
         $this->filterSearch($_keyword_, $_badge_, $_start_, $_end_, $_strict_, $_keyword, $_start, $_end, $_badge);
      }

      if ($_updateFlag_) {

         // get values
         $_flags = (isset($_REQUEST['_flags']) && (trim($_REQUEST['_flags']) != '' )) ? trim($_REQUEST['_flags']) : '' ;
         $_recordId = (isset($_REQUEST['_recordId']) && (trim($_REQUEST['_recordId']) != '' )) ? trim($_REQUEST['_recordId']) : '' ;
         
         // call the update recording function
         $this->updateRecordFlag($_flags, $_recordId);
      }

      if (!$_search_ && !$_updateFlag_) {
         $this->errorLog = $this->templates->renderError("No search made");
      }

   }

   /**
    * Controller Methods
    * 
    * These methods get values from the models and return them to the view Methods
    */

   private function filterSearch($_keyword_, $_badge_, $_start_, $_end_, $_strict_, $keyword, $start, $end, $badge){
      
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
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_ && $_start_ && $_end_) {
            // search all wrt time
            $results = $this->records->conditions(
               "WHERE translated_text LIKE '%{$keyword}%' AND start_time = '{$start}' AND end_time = '{$end}'"
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_ && $_badge_) {
            // search a particular officer
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND translated_text LIKE '%{$keyword}%' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_) {
            // search all
            $results = $this->records->conditions(
               "WHERE translated_text LIKE '%{$keyword}%' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_badge_) {
            // search all from a particular officer
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

      } else {
         # this does bot do strict search

         if ($_keyword_ && $_badge_ && $_start_ && $_end_) {
            // search officer wrt time
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND translated_text LIKE '%{$keyword}%' AND start_time = '{$start}' AND end_time = '{$end}' AND flag <> 'okay' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_ && $_start_ && $_end_) {
            // search all wrt time
            $results = $this->records->conditions(
               "WHERE translated_text LIKE '%{$keyword}%' AND start_time = '{$start}' AND end_time = '{$end}' AND flag <> 'okay' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_ && $_badge_) {
            // search a particular officer
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND translated_text LIKE '%{$keyword}%' AND flag <> 'okay' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_keyword_) {
            // search all
            $results = $this->records->conditions(
               "WHERE translated_text LIKE '%{$keyword}%' AND flag <> 'okay' "
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }

         if ($_badge_) {
            // search all from a particular officer
            $results = $this->records->conditions(
               "WHERE officer_badge_no = '{$badge}' AND flag <> 'okay'"
            )->read('*');

            if ($results != false) {       

               $this->resultView = $this->templates->renderResult($results);
            }else {
               
               $this->errorLog = $this->templates->renderError("No Result Found");
            }

         }
      }
      
      if (!$_badge_ && !$_start_ && !$end && !$_keyword_) {
         $this->errorLog = $this->templates->renderError("No Search made");
      }
   }

   private function updateRecordFlag($_flags, $_recordId){
      $update = $this->records->conditions(
         "WHERE id = '{$_recordId}'"
      )->update(array("flag"=>$_flags));

      if (!$update) {
         $this->errorLog = $this->templates->renderError("Error updating Record");
      } else {
         $this->errorLog = $this->templates->renderSuccess("Number of rows affected: {$update}");
      }
   }
   
   
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
