<?php

define('DBCONNECTION', 'mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_cd7e5d31d8cb362');
define('DBUSER', 'b78beb21e4ae3e');
define('DBPASS', 'e8f8b975');


spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file)) 
      include $file;
});

/* localhost connection */
$pdo = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
