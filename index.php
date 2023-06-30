<?php 
include_once ('header.php');
?>

<?php
 require_once ('Controller/formController.php');
$controller = new formController();
$controller->requestHandler(); 
?>


<?php 
include_once ('footer.php');

