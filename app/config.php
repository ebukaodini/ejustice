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
define('db1_host', 'localhost');
define('db1_user', 'root');
define('db1_password', '');
define('db1_database', 'ejustice_db');

// Controllers - Pages
// url shortener for web-pages
define('home', '../home/home.php');
define('search', '../search/search.php');
define('keyword', '../keyword/keyword.php');
define('result', '../result/result.php');

// Landing Page
define('IndexPage', home);

?>