<?php
require_once APP_PATH . '/Model/Pessoa.php';
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

class Cliente extends Pessoa {
private $tipoDeCliente;
private $actividadeDaEmpresa;
private $nacionalidade;
private $estadoConta;
// Construtor do cliente: ID do usuário, tipo do cliente, nome, email, endereço, numero telefone, username, password, provincia, municipio, comuna, id, tipo de cliente, actividade da empresa, naacionalidade, estadoconta
public function __construct($userId='null',$clientType,$name,$email,$address,$cellphoneNumber,$username,$password,$provincia,$municipio,$comuna,$id='null',$tipoDeCliente,$actividadeDaEmpresa,$nacionalidade,$estadoConta){
parent::__construct($userId, $clientType, $name, $email, $address, $cellphoneNumber, $username, $password, $provincia, $municipio, $comuna, $id);    
$this->tipoDeCliente= $tipoDeCliente;
$this->actividadeDaEmpresa= $actividadeDaEmpresa;
$this->nacionalidade= $nacionalidade;
$this->estadoConta=$estadoConta;
}


/**
 * Get the value of tipoDeCliente
 */ 
public function getTipoDeCliente()
{
return $this->tipoDeCliente;
}

/**
 * Set the value of tipoDeCliente
 *
 * @return  self
 */ 
public function setTipoDeCliente($tipoDeCliente)
{
$this->tipoDeCliente = $tipoDeCliente;

return $this;
}

/**
 * Get the value of actividadeDaEmpresa
 */ 
public function getActividadeDaEmpresa()
{
return $this->actividadeDaEmpresa;
}

/**
 * Set the value of actividadeDaEmpresa
 *
 * @return  self
 */ 
public function setActividadeDaEmpresa($actividadeDaEmpresa)
{
$this->actividadeDaEmpresa = $actividadeDaEmpresa;

return $this;
}

/**
 * Get the value of nacionalidade
 */ 
public function getNacionalidade()
{
return $this->nacionalidade;
}

/**
 * Set the value of nacionalidade
 *
 * @return  self
 */ 
public function setNacionalidade($nacionalidade)
{
$this->nacionalidade = $nacionalidade;

return $this;
}

/**
 * Get the value of estadoConta
 */ 
public function getEstadoConta()
{
return $this->estadoConta;
}

/**
 * Set the value of estadoConta
 *
 * @return  self
 */ 
public function setEstadoConta($estadoConta)
{
$this->estadoConta = $estadoConta;

return $this;
}
}