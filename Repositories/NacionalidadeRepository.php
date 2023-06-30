<?php 
require_once('./Model/Database.php');
require_once ('./Model/Nacionalidade.php');
class NacionalidadeRepository {
private $database;
function __construct(){
    $this->database=Database::getInstance();
}

public function getAllNacionalidades(){
    $nacionalidades = Array();
$statement = $this->database->prepare("SELECT * from tnacionalidade");
$statement->execute();
$result = $statement->fetchAll();   
foreach($result as $nacionalidade){
    $nacionalidades[] = new Nacionalidade($nacionalidade['nome'],$nacionalidade['idtnacionalidade']);
}
return $nacionalidades;
}


}