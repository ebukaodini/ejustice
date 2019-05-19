<?php
/**
 * Summary: the device is signed to an officer with the officer_badge_no after confirming that the officer_badge_no exist on the server
 * 
 */

include ('../includes.php');

$officer_badge_no = isset($_REQUEST['officer_badge_no']) && (trim($_REQUEST['officer_badge_no']) != null) ? $_REQUEST['officer_badge_no'] : '' ;

if ($officer_badge_no != '') {
   $officer = new Officer($officer_badge_no);

   if ($officer->isOfficer()) {
      echo $officer->getOfficerDetails();
   } else {
      echo json_encode(array("flag" => "error","message" => "Not an Officer"));
   }
} else {
   echo json_encode(array("flag" => "error","message" => "Not an Officer"));
}

?>