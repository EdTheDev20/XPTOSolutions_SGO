<?php
require_once('./Model/Localizacao.php');
require_once('./Model/Database.php');
class LocalizacaoRepository {

private $database;
function __construct(){
$this->database= Database::getInstance();
}


public function selectAllProvincias(){
$provincias = Array();
$statement = $this->database->prepare("SELECT * from tprovincia");
$statement->execute();
$result = $statement->fetchAll();

foreach ($result as $provincia){
$provincias[] = new Localizacao($provincia['idtprovincia'],$provincia['nome'],'null','null');
} 
return $provincias;

}



public function selectComunasFromMunicipios($iddomun){
$comunas = Array();
$statement = $this->database->prepare("select idtcomuna,nome from tcomuna where fk_idtmunicipio=:iddomun;");
$statement->bindparam(":iddomun",$iddomun);
$statement->execute();
$result = $statement -> fetchAll();
foreach($result as $comuna){
 $comunas[] = new Localizacao($comuna['idtcomuna'],'null','null',$comuna['nome']);   
}
return $comunas;
}
public function selectMunicipiosFromProvincia($iddaprov){
$municipios = Array();
$statement =$this->database->prepare("Select idtmunicipio,tmunicipio.nome from tmunicipio where tmunicipio.fk_idprovincia=:iddaprov");
$statement->bindparam(":iddaprov",$iddaprov);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $municipio){
    $municipios[] = new Localizacao($municipio['idtmunicipio'],'null',$municipio['nome'],'NULL');

}
return $municipios;
}


}














?>