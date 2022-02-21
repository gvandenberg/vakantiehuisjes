<?php
session_start();

error_reporting(E_ALL&~E_NOTICE);

require_once ('config/config.php');
require_once ('config/database.php');
require_once ('route.php');


$route = new Route($_SERVER['REQUEST_URI']);
$route->start();

?>
