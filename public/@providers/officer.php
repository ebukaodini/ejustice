<?php
/**
 * Summary:
 * 
 */

// a class to search the database
class Officer extends OfficerModel
{
   private $badgeNo;
   
   public function __construct(string $badgeNo){
      $this->badgeNo = $badgeNo;
      parent::__construct();
   }
   
   /**
    * Summary: This function tells if an officer exist on the database
    */
   public function isOfficer(){
      $result = parent::conditions("WHERE badge_no = '{$this->badgeNo}' LIMIT 1")
      ->read("*");

      if (!$result){
         return false;
      } else {
         return true;
      }

   }

   /**
    * Summary: This function returns an officer's detail
    */
   public function getOfficerDetails(){
      $result = parent::conditions("WHERE badge_no = '{$this->badgeNo}' LIMIT 1")
      ->read("name, badge_no");

      $details = array(
         "flag" => "success",
         "officerName" => $result[0]["name"],
         "badge_no" => $result[0]["badge_no"]
      );

      return $details = json_encode($details);
   }

   public function __destruct(){
   }
}

?>