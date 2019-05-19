<?php
/**
 * Summary: push recordings: After collecting all recordings, the recordings would be sent to the server with the officer_badge_no, the transalated text, the start_time and the end_time
 * 
 */

include ('../includes.php');


// if the upload flag is set, then call a function to accept the audio file,
// let it return a flag and the url if success, then let the other function insert the url, the translated text and other information into the database...

$upload = isset($_FILES['recording']) ? true : false;

if ($upload) {

   // get the other values
   $officer_badge_no = isset($_REQUEST['officer_badge_no']) && (trim($_REQUEST['officer_badge_no']) != null) ? $_REQUEST['officer_badge_no'] : null ;
   $translated_text = isset($_REQUEST['translated_text']) && (trim($_REQUEST['translated_text']) != null) ? $_REQUEST['translated_text'] : null ;
   $start_time = isset($_REQUEST['start_time']) && (trim($_REQUEST['start_time']) != null) ? $_REQUEST['start_time'] : null ;
   $end_time = isset($_REQUEST['end_time']) && (trim($_REQUEST['end_time']) != null) ? $_REQUEST['end_time'] : null ;
   $flag = 'unverified';
   $url = null; // the url would be assigned later in the class implicitly

   $record = new Records($url, $officer_badge_no, $translated_text, $start_time, $end_time, $flag);
   $record = json_decode($record, true);
   
   if ($record['flag'] == "error") {
      exit(json_encode($record));
   }

   // call the upload recording function
   $upload = $record->uploadRecording();
   $upload = json_decode($upload, true);

   if ($upload['flag'] == "success")
   {
      if ($record->addRecordings())
      {
         $response = array("flag" => "success", "message" => "Success adding record");
         exit(json_encode($response));
      }else{
         $response = array("flag" => "error", "message" => "Error adding record");
         exit(json_encode($response));
      }

   } else 
   {
      exit(json_encode($upload));
   }
}


?>