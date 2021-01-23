<?php

define('DBCONNECTION', 'mysql:host=z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=wk9lgexv72hbq72a');
define('DBUSER', 't5lhnalqcz77zteh');
define('DBPASS', 'lwt070245kuhx9h2');


spl_autoload_register(function ($class) {
  $file = 'lib/' . $class . '.class.php';
  if (file_exists($file))
    include $file;
});

/* localhost connection */
$pdo = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
