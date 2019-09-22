<?php
  class Feriado
  {

    public $IdFeriado;
    public $FechaFeriado;

    function __construct()
    { }


    //funciones de set USER
    public function setIdFeriado($IdFeriado){$this->IdFeriado = $IdFeriado;}
    public function setFechaFeriado($FechaFeriado){$this->FechaFeriado  = $FechaFeriado;}



    //funciones de get USER
    public function getIdFeriado(){return $this->IdFeriado;}
    public function getFechaFeriado(){return $this->FechaFeriado;}

  }//end class Usuario
?>