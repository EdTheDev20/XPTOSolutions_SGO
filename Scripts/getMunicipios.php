<?php /*
define('APP_PATH',dirname(__FILE__));
require_once (APP_PATH . '\Services\formServices.php');
if(isset($_GET['provincia'])||isset($_POST['provincia'])){
$provincia = filter_input(INPUT_GET,$_GET['provincia']);  
$formService = new formServices();
$municipios = $formService->getMunicipiosFromProvinciaServ($provincia);

echo $municipios;
} */

$filePath = 'C:\xampp\htdocs\AW_PROJECTO_SEDI_XPTO_SOLUTIONS_NETBEANS\Services\formServices.php';
if (file_exists($filePath)) {
    require_once $filePath;
} else {
    echo "The file does not exist.";
}