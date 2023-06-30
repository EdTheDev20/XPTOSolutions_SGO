<?php 
require_once ('./Repositories/LocalizacaoRepository.php');
require_once ('./Repositories/NacionalidadeRepository.php');
require_once('./Repositories/ClienteRepository.php');
class formServices {
private $localizacaoRepository = NULL;
private $nacionalidades = NULL;
private $clientes=NULL;
public function __construct()
{
$this->localizacaoRepository = new LocalizacaoRepository();
$this->nacionalidades =new NacionalidadeRepository();
$this->clientes=new ClienteRepository();
}

public function getAdmMail(){
    return $this->clientes->getAdminEmail();
}

public function insertInDB($nome,$email,$morada,$numTel,$username,$password,$empresaActividade,$fk_prov,$fk_mun,$fk_com,$fk_tTipoCliente,$fk_tNacionalidade,$fk_tTipoDeUsuario,$fk_tEstadoConta){
    try{
          $result = $this->clientes->createNewCliente($nome,$email,$morada,$numTel,$username,$password,$empresaActividade,$fk_prov,$fk_mun,$fk_com,$fk_tTipoCliente,$fk_tNacionalidade,$fk_tTipoDeUsuario,$fk_tEstadoConta);
        
    } catch(Exception $e){
        throw $e;
    }

}

public function getProvincias(){
try {
$res = $this->localizacaoRepository->selectAllProvincias();
return $res;
} catch(Exception $e){
    echo "Erro no processo de obter provincias";
}

}
public function getNacionalidades(){
    try{
        $res = $this->nacionalidades->getAllNacionalidades();
        return $res;
    }  catch(Exception $e){
        echo "Erro no processo de obter nacionalidades";
    }
}

public function getComunasFromMunicipiosServ($x){
    try{
        $res = $this->localizacaoRepository->selectComunasFromMunicipios($x);
        return $res;
    }catch(Exception $e){
        echo "Erro ao obter comunas";
    }
}

public function getMunicipiosFromProvinciaServ($x){
    try{
        $res = $this->localizacaoRepository->selectMunicipiosFromProvincia($x);
        return $res;
    } catch(Exception $e){
        echo "Erro ao obter municipios";
    }
}


}
?>