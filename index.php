<?php 
define('APP_PATH',dirname(__FILE__));


require_once (APP_PATH . '/Controller/pageController.php');

session_start();


$controller = new pageController();
$controller->requestHandler(); 

?>

