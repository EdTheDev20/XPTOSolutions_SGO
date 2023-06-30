<?php 

require_once ('../Services/formServices.php');
if(isset($_GET['provincia'])||isset($_POST['provincia'])){
$provincia = filter_input(INPUT_GET,$_GET['provincia']);  
$formService = new formServices();
$municipios = $formService->getMunicipiosFromProvinciaServ($provincia);
// Encode the $municipios array as JSON
$jsonResponse = json_encode($municipios);

// Return the JSON data
echo $jsonResponse;
} else {

}