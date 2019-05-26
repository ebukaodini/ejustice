<?php

// test for success
$q = "officer_badge_no=PO001";

// test for failure

// $q = "officer_badge_no=PO003";

// $q = "officer_badge_no=";

// $q = "officer_badge_no='' OR 1 = 1 #";


// execution of test variables
$url = "localhost/ejustice/public/@api/signin.php";
// $url = "www.ebukaodini.com.ng/ejustice/public/@api/signin.php";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl, CURLOPT_POST, 1); 
curl_setopt ($curl, CURLOPT_POSTFIELDS, $q);

echo $resp = curl_exec($curl);

?>