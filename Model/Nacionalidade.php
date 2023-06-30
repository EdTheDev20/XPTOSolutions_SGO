<?php

class Nacionalidade{
    private $nacionalidade;
    private $id;
    function __construct($n,$i){
        $this->nacionalidade= $n;
        $this->id= $i;

    }

    /**
     * Get the value of nacionalidade
     */ 
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
    
     public function getId(){
        return $this->id;
    }

    /**
     * Set the value of nacionalidade
     *
     * @return  self
     */ 
        public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }
}