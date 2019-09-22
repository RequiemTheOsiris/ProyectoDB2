<?php

class BuscadorFeriado
{
	private $conexion;

	function __construct()
	{
		$this->conexion =  new Conexion();
	}

	public function listaDeFeriados(){
		$sqlListaFeriado ="SELECT * FROM Feriado; ";
		$cmd = $this->conexion->prepare($sqlListaFeriado);
		$cmd->execute();
		$listaDeFeriadoDeLaConsulta = $cmd->fetchAll();
		$listaDeFeriado = array();
		$i = 0;
		foreach ($listaDeFeriadoDeLaConsulta as $Feriado) {
			$objFeriado = new Feriado();
			$objFeriado->setIdFeriado($Feriado['IdFeriado']);
			$objFeriado->setFechaFeriado($Feriado['FechaFeriado']);
			$listaDeFeriado[$i]=$objFeriado;
			$i++;
		}
		return $listaDeFeriado;
	}
	
	public function listaDeVacaciones(){
		$sqlListaFeriado ="SELECT * FROM vacacion; ";
		$cmd = $this->conexion->prepare($sqlListaFeriado);
		$cmd->execute();
		$listaDeFeriadoDeLaConsulta = $cmd->fetchAll();
		$listaDeFeriado = array();
		$i = 0;
		foreach ($listaDeFeriadoDeLaConsulta as $Feriado) {
			$objFeriado = new Feriado();
			$objFeriado->setIdFeriado($Feriado['IdVacacion']);
			$objFeriado->setFechaFeriado($Feriado['FechaVacacion']);
			$listaDeFeriado[$i]=$objFeriado;
			$i++;
		}
		return $listaDeFeriado;
	}
} 
?>