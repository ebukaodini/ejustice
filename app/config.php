<?php
/**
 * Summary:
 * This script is here to hold the configuration details 
 * Configuration details of the php server, the database, and the web-pages
 */

// Autoload php ini settings
// Timezone
ini_set('date.timezone', 'Africa/Lagos');

// File Upload
ini_set('max_file_uploads', '20');
ini_set('upload_max_filesize', '2M');
ini_set('upload_tmp_dir', 'C:\xampp\tmp');
// ini_set('display_errors', '0');


// Database Config
// Database 1
define('db1_host', 'ec2-54-197-239-115.compute-1.amazonaws.com');
define('db1_user', 'laofknfftcvgmk');
define('db1_password', '8aef2828eff5930c4c1cfa043461adfae4329b6f4e1e49da8eb3c8e6497f4aa1');
define('db1_database', 'da5uusl0dingnp');
define('db1_port', '5432');

// Controllers - Pages
// url shortener for web-pages
define('home', '../home/home.php');
define('search', '../search/search.php');
define('keyword', '../keyword/keyword.php');
define('result', '../result/result.php');

// Landing Page
define('IndexPage', home);

?>
