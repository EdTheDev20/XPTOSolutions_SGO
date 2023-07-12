<?php 
define('APP_PATH',dirname(__FILE__));


require_once (APP_PATH . '/Controller/pageController.php');

session_start();

include_once 'View/UserManagement.php';



$controller = new pageController();
$controller->requestHandler(); 

?>

