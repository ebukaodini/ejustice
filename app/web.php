<?php
/**
 * Summary:
 * 
 */

/**
 * This script is here for the public pages and all the providers and vendors that they will be calling
 * When a page includes the includes.php, it includes all these script from their differnet paths
 */

const ROOT = '../..';


// Engine Scripts
require_once ( ROOT . '/library/engine/errorhandler.php');
require_once ( ROOT . '/library/engine/router.php');
require_once ( ROOT . '/library/engine/auth.php');


// Model Scripts
require_once ( ROOT . '/models/keyword_tbl.php');
require_once ( ROOT . '/models/officer_tbl.php');
require_once ( ROOT . '/models/recording_tbl.php');


// Vendor Scripts
require_once ( ROOT . '/library/vendor/speech_to_text/index.php');
// !!!Notice
// for vendor scripts that are html/css/js related, they would be included in the views/template files


// Providers
// require_once ( ROOT . '/public/@providers/greeting.php');

// Templates
require_once ( ROOT . '/public/@templates/templates.php');


?>