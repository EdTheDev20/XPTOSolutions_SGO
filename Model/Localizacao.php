<?php

class Localizacao{
private $id;
private $provincia;
private $municipio;
private $comuna;

function __construct($id,$provincia,$municipio,$comuna)
{
$this->id = $id;
$this->provincia = $provincia;
$this->municipio = $municipio;
$this->comuna = $comuna;
}
/**
 * Get the value of municipio
 */ 
public function getMunicipio()
{
return $this->municipio;
}

public function getId(){
return $this->id;
}
public function setId($id){
    $this->id = $id;
}

/**
 * Set the value of municipio
 *
 * @return  self
 */ 
public function setMunicipio($municipio)
{
$this->municipio = $municipio;

return $this;
}

/**
 * Get the value of comuna
 */ 
public function getComuna()
{
return $this->comuna;
}

/**
 * Set the value of comuna
 *
 * @return  self
 */ 
public function setComuna($comuna)
{
$this->comuna = $comuna;

return $this;
}

/**
 * Get the value of provincia
 */ 
public function getProvincia()
{
return $this->provincia;
}

/**
 * Set the value of provincia
 *
 * @return  self
 */ 
public function setProvincia($provincia)
{ 
$this->provincia = $provincia;

return $this;
}
}


?>