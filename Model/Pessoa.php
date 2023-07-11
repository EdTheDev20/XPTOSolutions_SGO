 <?php
include_once APP_PATH . '/Model/Localizacao.php';
 /* Este tipo de utilizadores para poderem solicitar o aluguer de um outoodr têm de preencher
um formulário de adesão com os seguintes dados:
o Tipo de Cliente (Empresa ou Particular)
o Actividade da Empresa
o Nacionalidade



o Nome completo / Nome da Empresa
o Província, Município, Comuna
o Morada
o Endereço de email
o Telemóvel
o Username
o Password
o Confirmação da Password
 */

 /*
 2) Efectuar o registo dos Gestores, preenchendo para isso um formulário de registo
com a seguinte informação:
o Nome Completo
o Endereço de Email
o Morada,
o Telemovel
o Username
o Password
o Confirmação da Password (Faz parte do formulário e não da classe)
o Provincia, Municipio, Comuna
*/
class Pessoa {
protected $userId;
protected $clientType;
protected $name;
protected $email;
protected $address;
protected $cellphoneNumber;
protected $username;
protected $password;
protected $localizacao;


function __construct($userId='null',$clientType,$name,$email,$address,$cellphoneNumber,$username,$password,$provincia,$municipio,$comuna,$id='null')
{
    $this->userId=$userId;
    $this->clientType = $clientType;
    $this->name = $name;
    $this->email = $email;
    $this->address = $address;
    $this->cellphoneNumber = $cellphoneNumber;
    $this->username = $username;
    $this->password = $password;
    $this->localizacao = new Localizacao($id,$provincia,$municipio,$comuna);
}
public function setMunicipioG($x){
    $this->localizacao->setMunicipio($x);
}

public function setComunaG($x){
    $this->localizacao->setComuna($x);
}

public function setProvinciaG($x){
    $this->localizacao->setProvincia($x);
}

public function getMunicipio(){
    return $this->localizacao->getMunicipio();
}

public function getComuna(){
    return $this->localizacao->getComuna();
}

public function getProvincia(){
    return $this->localizacao->getProvincia();
}
/**
 * Get the value of clientType
 */ 
public function getClientType()
{
return $this->clientType;
}

/**
 * Set the value of clientType
 *
 * @return  self
 */ 
public function setClientType($clientType)
{
$this->clientType = $clientType;

return $this;
}

/**
 * Get the value of name
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of name
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of address
 */ 
public function getAddress()
{
return $this->address;
}

/**
 * Set the value of address
 *
 * @return  self
 */ 
public function setAddress($address)
{
$this->address = $address;

return $this;
}

    /**
     * Get the value of cellphoneNumber
     */ 
    public function getCellphoneNumber()
    {
        return $this->cellphoneNumber;
    }

    /**
     * Set the value of cellphoneNumber
     *
     * @return  self
     */ 
    public function setCellphoneNumber($cellphoneNumber)
    {
        $this->cellphoneNumber = $cellphoneNumber;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}
}
?>