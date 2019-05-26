<?php
/**
 * Summary: a controller for recording
 * 
 */

class Records extends RecordingModel
{
   private $badgeNo;
   private $url;
   private $translatedText;
   private $startTime;
   private $endTime;
   private $flag;
   
   public function __construct(){
      # Create an instance of the Google Cloud Speech-To-Text
      $this->sTT = new SpeechToText();
   }

   public function init(string $url = null, string $badgeNo = null, string $translatedText = null, string $startTime = null, string $endTime = null, string $flag = null){
      // validate inputs
      $validator = new Validate();

      if (!(preg_match("/^PO[0-9\.]+$/", $badgeNo) && strlen($badgeNo) == 5) && $badgeNo != null) {
         $response = array("flag" => "error", "message" => "Invalid badge no");
         return json_encode($response);
      }
      
      if (!$validator->validateText($translatedText) && $translatedText != null) {
         $response = array("flag" => "error", "message" => "Invalid translated text");
         return json_encode($response);
      }

      if (!$validator->validateDate($startTime) && $startTime != null) {
         $response = array("flag" => "error", "message" => "Invalid start date");
         return json_encode($response);
      }

      if (!$validator->validateDate($endTime) && $endTime != null) {
         $response = array("flag" => "error", "message" => "Invalid end date");
         return json_encode($response);
      }

      if (!$validator->validateName($flag,4,10) && $flag != null) {
         $response = array("flag" => "error", "message" => "Invalid flag");
         return json_encode($response);
      }

      $this->badgeNo = $badgeNo;
      $this->translatedText = $translatedText;
      $this->startTime = $startTime;
      $this->endTime = $endTime;
      $this->flag = $flag;

      parent::__construct();

      $response = array("flag" => "success");
      return json_encode($response);
   }

   public function addRecordings()
   {
      # Transcipt the audio files to text
      $text = (new SpeechToText())
         ->transcript($this->url);
      
      # Use translated text or Default
      $this->translatedText = (isset($text) && trim($text) != "") ? $text : "No Translated text" ;
      
      if ($this->badgeNo != null && $this->translatedText != null && $this->startTime != null && $this->endTime != null && $this->flag != null && $this->url != null) {
         $add = parent::create(array(
            "officer_badge_no" => $this->badgeNo,
            "record_url" => $this->url,
            "translated_text" => $this->translatedText,
            "start_time" => $this->startTime,
            "end_time" => $this->endTime,
            "flag" => $this->flag
         ));

         return $add;
      }else {
         return false;
      }
   }

   public function uploadRecording()
   {
      if(isset($_FILES['recording']) && isset($_FILES['recording']['name']) && (trim($_FILES['recording']['name']) != null) ){
   
         $newfilename = "eJ_".date("YmdHis"); // the new generated name for the file
         $target_dir = "../../uploads/"; // the application's directory for images
         $target_file = $target_dir.$newfilename; // the target file in the target directory
         $filesize = $_FILES["recording"]["size"]; // file size of the uploaded file
         $filecontenttype = $_FILES["recording"]["type"];
         $filetype = strtolower(pathinfo($_FILES['recording']['name'],PATHINFO_EXTENSION)); // file extension of the uploaded file
         $tmpname = $_FILES['recording']['tmp_name'];
         $target_file = $target_file.".".$filetype;
   
         // Valid file extensions
         $extensions_arr = array("wav","mp3","ogg","wma","flac","aac","amr");
   
         $contenttypes_arr = array("audio/wav","audio/mp3","audio/ogg","audio/wma","audio/flac","audio/aac","audio/amr");
   
         // Check extension and content type
         if ( !in_array($filetype,$extensions_arr) || !in_array($filecontenttype,$contenttypes_arr) ) {
            $response = array("flag" => "error", "message" => "Sorry, {$filetype} files are not allowed");
            return json_encode($response);
         }
   
         // check filesize 8388608
         if ($filesize > 15000000) {
            $response = array("flag" => "error", "message" => "Sorry, your file is too large, maximum filesize is 15mb");
            return json_encode($response);
         }
         
         // Upload file
         if (move_uploaded_file($tmpname,$target_file)) {
            $this->url = "uploads/{$newfilename}.{$filetype}";
            $response = array("flag" => "success");
            return json_encode($response);
         } else {
            $response = array("flag" => "error", "message" => "File not sent");
            return json_encode($response);
         }
      }else{
         $response = array("flag" => "error", "message" => "No file chosen");
         return json_encode($response);
      }
   
   }
   
   public function __destruct()
   {
   }
}

?>