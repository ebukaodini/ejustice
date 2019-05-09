<?php
/**
 * Summary:
 * 
 */

require_once ('app/config.php');
require_once ('library/engine/router.php');

$router = new Router();
$router->gotoRoot(IndexPage);

?>