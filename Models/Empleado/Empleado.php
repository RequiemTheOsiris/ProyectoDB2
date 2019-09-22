<?php
  class Empleado
  {

    public $CiEmpleado;
    public $PrimerNombre;
    public $SegundoNombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $FechaNacimiento;
    public $Genero;
    public $EstdoCivil;
    public $Activo;
    public $NumeroCelular;
    public $Fotografia;
    public $Usuario;
    public $Contrasenia;
    
    public $NombreCompleto;
    public $Cargo;
    public $HoraIngreso;
    public $HoraSalida;
    public $TotalHoras;
    public $Dia;

    function __construct()
    { }


    //funciones de set USER
    public function setCiEmpleado($CiEmpleado){$this->CiEmpleado = $CiEmpleado;}
    public function setPrimerNombre($PrimerNombre){$this->PrimerNombre  = $PrimerNombre;}
    public function setSegundoNombre($SegundoNombre){$this->SegundoNombre = $SegundoNombre;}
    public function setApellidoPaterno($ApellidoPaterno){$this->ApellidoPaterno = $ApellidoPaterno;}
    public function setApellidoMaterno($ApellidoMaterno){$this->ApellidoMaterno = $ApellidoMaterno;}
    public function setFechaNacimiento($FechaNacimiento){$this->FechaNacimiento = $FechaNacimiento;}
    public function setGenero($Genero){$this->Genero  = $Genero;}
    public function setEstdoCivil($EstdoCivil){$this->EstdoCivil = $EstdoCivil;}
    public function setActivo($Activo){$this->Activo = $Activo;}
    public function setNumeroCelular($NumeroCelular){$this->NumeroCelular = $NumeroCelular;}
    public function setFotografia($Fotografia){$this->Fotografia = $Fotografia;}
    public function setUsuario($Usuario){$this->Usuario = $Usuario;}
    public function setContrasenia($Contrasenia){$this->Contrasenia = $Contrasenia;}

    public function setNombreCompleto($NombreCompleto){$this->NombreCompleto = $NombreCompleto;}
    public function setCargo($Cargo){$this->Cargo = $Cargo;}
    public function setHoraIngreso($HoraIngreso){$this->HoraIngreso = $HoraIngreso;}
    public function setHoraSalida($HoraSalida){$this->HoraSalida = $HoraSalida;}
    public function setTotalHoras($TotalHoras){$this->TotalHoras = $TotalHoras;}
    public function setDia($Dia){$this->Dia = $Dia;}



    //funciones de get USER
    public function getCiEmpleado(){return $this->CiEmpleado;}
    public function getPrimerNombre(){return $this->PrimerNombre;}
    public function getSegundoNombre(){return $this->SegundoNombre;}
    public function getApellidoPaterno(){return $this->ApellidoPaterno;}
    public function getApellidoMaterno(){return $this->ApellidoMaterno;}
    public function getFechaNacimiento(){return $this->FechaNacimiento;}
    public function getGenero(){return $this->Genero;}
    public function getEstdoCivil(){return $this->EstdoCivil;}
    public function getActivo(){return $this->Activo;}
    public function getNumeroCelular(){return $this->NumeroCelular;}
    public function getFotografia(){return $this->Fotografia;}
    public function getUsuario(){return $this->Usuario;}
    public function getContrasenia(){return $this->Contrasenia;}
    
    public function getNombreCompleto(){return $this->NombreCompleto;}
    public function getCargo(){return $this->Cargo;}
    public function getHoraIngreso(){return $this->HoraIngreso;}
    public function getHoraSalida(){return $this->HoraSalida;}
    public function getTotalHoras(){return $this->TotalHoras;}
    public function getDia(){return $this->Dia;}

  }//end class Usuario
?>